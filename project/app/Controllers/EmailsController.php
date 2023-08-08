<?php

namespace app\Controllers;
use app\Models\Emails;

class EmailsController
{
    public function index()
    {
        echo "ffff";
        $emails = new Emails();
        $emails = $emails->page(1);
        var_dump($emails);
        //include "resources/views/home.php";
        //compact('pdfs_count', 'emails_count', 'unknown_pdfs_count', 'unknown_emails_count');
    }
}