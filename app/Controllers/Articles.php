<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Articles extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // try {
        //     if ($db->connect()) {
        //         echo "Database connection successful.";
        //     }
        // } catch (DatabaseException $e) {
        //     echo "Database connection failed: " . $e->getMessage();
        // }

        $db->listTables();

        $data =[
                ["title" => "One", "content" => "The First"],
                ["title" => "Two", "content" => "the Second"],
                ["title" => "Three", "content" => "the Third"],
            ];
        return view("Articles/index", ["articles" => $data]);
    }
}