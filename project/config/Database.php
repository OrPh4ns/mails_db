<?php 

namespace config;

use app\Modules\Logger;
use PDOException;
use PDO;
class Database {
	private $config;
	private $db;
	public function __construct()
    {
		$this->config = array();
		$this->config['dbname'] = trim(getenv('DBNAME'));
		$this->config['host']   = trim(getenv('HOST'));
		$this->config['dbuser'] = trim(getenv('DBUSER'));
		$this->config['dbpass'] = trim(getenv('DBPASS'));
		try {
			$this->db = new PDO("mysql:dbname=".$this->config['dbname'].";host=".$this->config['host'], $this->config['dbuser'], $this->config['dbpass']);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->exec('SET NAMES utf8');
		} catch(PDOException $e)
        {
            $message = $e->getMessage();
            //error_log("$message ][ $e->errorInfo \n", 3, 'error.log');
            Logger::logging("$message ][ $e->errorInfo");
		}
	}

	public function getConnection(): PDO
    {
		return $this->db;
	}
}
