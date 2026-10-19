<?php

namespace App\Controllers;

class TestDbConnection extends BaseController
{
    public function index()
    {
        $mysqli = new \mysqli('localhost', 'your_database_username', 'your_database_password', 'your_database_name');

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        echo 'Connected successfully';

        $mysqli->close();
    }
}
