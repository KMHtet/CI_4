<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Articles extends BaseController
{
    public function index()
    {
        // $db = \Config\Database::connect();
        // try {
        //     if ($db->connect()) {
        //         echo "Database connection successful.";
        //     }
        // } catch (DatabaseException $e) {
        //     echo "Database connection failed: " . $e->getMessage();
        // }
        // $db->listTables();

        // $data =[
        //         ["title" => "One", "content" => "The First"],
        //         ["title" => "Two", "content" => "the Second"],
        //         ["title" => "Three", "content" => "the Third"],
        //     ];

        $model = new ArticleModel();
        $data = $model->findAll();

        return view("Articles/index", ["articles" => $data]);
    }

    public function show($id)
    {
        // dd($id);
        $model = new ArticleModel();
        $article = $model->find($id);
        // dd($article);
        return view("Articles/show",[
            "article" => $article
        ]);
    }

    public function new()
    {
        return view("Articles/new");
    }

    public function create()
    {
        $modle = new ArticleModel();
        $id =  $modle->insert($this->request->getPost());
        if($id === false) {
            dd($modle->errors());
        }
        dd($id);
    }
}