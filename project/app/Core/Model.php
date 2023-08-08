<?php
namespace app\Core;

use config\Database;
use PDO;

class Model {
	protected $db;
    public string $table;

	public function __construct() {
        try {
            $database = new Database();
            $this->db = $database->getConnection();
        }
        catch (\PDOException $e)
        {
            $this->debugger($e);
        }
	}

    public function get_with_id(int $id, array $attributes=null)
    {
        try {
            $atts= ($attributes)?implode(', ', $attributes):'*';
            $result = $this->db->prepare('select '.$atts.' from '.$this->table. ' where id=:id');
            $result->execute(['id'=>$id]);
            return $result->fetch();
        }catch (\PDOException $e)
        {
            $this->debugger($e);
            return false;
        }
    }

    public function sql(string $sql, array $execute, int $count)
    {
        $result = $this->db->prepare($sql);
        $result->execute($execute);
        /*
         * 1 = all
         * 2 = one
         * 3 count
         */
        return $count==1?$result->fetchAll():($count==2?$result->fetch():($count==3?$result->rowCount():null));
    }

    public function query(string $query)
    {
        return $this->db->prepare($query);
    }


    public function get_where(array $values=null, string $relation="and",array $attributes=null)
    {
        $atts= ($attributes)?implode(', ', $attributes):"*";
        $where = '';
        $params = [];
        $i = 1;
        if ($values) {
            $where.=' WHERE ';
            foreach ($values as $column => $value) {
                $type = gettype($value)=="string"?"like":"=";
                $where .= ($i == 1 ? '' : ' '.$relation.' ') . "$column $type ?";
                $params[] = $value;
                $i++;
            }
        }
        try {
            // Prepare a SQL statement to get the count of the specified value in your_table
            $stmt = $this->db->prepare("SELECT $atts FROM ".$this->table." $where");
            // Bind the parameters to the statement
            $stmt->execute($params);
            return $stmt->fetch();
        }catch (\PDOException $e)
        {
            $this->debugger($e);
        }
    }

    public function all(array $attributes=null)
    {
        $atts= ($attributes)?implode(', ', $attributes):'*';
        $result = $this->db->prepare('select '.$atts.' from '.$this->table);
        $result->execute();
        return $result->fetchAll();
    }

    public function page($currentPage = 1, $recordsPerPage = 10, array $attributes = null)
    {
        $atts = ($attributes) ? implode(', ', $attributes) : '*';

        // Calculate the offset for the LIMIT clause
        $offset = ($currentPage - 1) * $recordsPerPage;
        $query = 'SELECT '.$atts.' FROM '.$this->table.' LIMIT :offset, :recordsPerPage';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        // Get the total number of records in the table
        $totalRecords = $this->db->query('SELECT COUNT(*) FROM '.$this->table)->fetchColumn();
        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $recordsPerPage);
        // Return an array with the rows and pagination information
        return array(
            'rows' => $rows,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'recordsPerPage' => $recordsPerPage,
            'totalRecords' => $totalRecords
        );
    }

    public function insert(array $attributes): bool
    {
        $columns = implode(',', array_keys($attributes));
        $values = implode(',', array_fill(0, count($attributes), '?'));
        $sql = "INSERT INTO ".$this->table." ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($sql);
        $i = 1;
        foreach ($attributes as $value) {
            $stmt->bindValue($i++, $value);
        }
        return $stmt->execute();
    }

    public function count(array $values=null, string $relation="and")
    {
        $where = '';
        $params = [];
        $i = 1;
        if ($values) {
            $where.=' WHERE ';
            foreach ($values as $column => $value) {
                $where .= ($i == 1 ? '' : ' '.$relation.' ') . "$column = ?";
                $params[] = $value;
                $i++;
            }
        }
        try {
            // Prepare a SQL statement to get the count of the specified value in your_table
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM ".$this->table." $where");
            // Bind the parameters to the statement
            $stmt->execute($params);
        }catch (\PDOException $e)
        {
            $this->debugger($e);
        }
        // Return the count
        return $stmt->fetchColumn();
    }

    private function debugger(\PDOException $e): void
    {
        $message = $e->getMessage();
        error_log("$message  \n", 3, 'error.log');
    }

}