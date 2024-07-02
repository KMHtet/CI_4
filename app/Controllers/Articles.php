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
        return view("Articles/show", [
            "article" => $article
        ]);
    }

    public function new()
    {
        return view("Articles/new", [
            "article" => [
                "title" => "",
                "content" => ""
            ]
        ]);
    }

    public function create()
    {
        $model = new ArticleModel();
        $id =  $model->insert($this->request->getPost());
        if ($id === false) {
            return redirect()->back()->with("errors", $model->errors())->withInput();
        }

        return redirect()->to("articles/$id")->with("message", "Article saved");
    }

    public function edit($id) //show
    {
         $model = new ArticleModel();
         $article = $model->find($id);
         return view("Articles/edit", [
             "article" => $article
         ]);
    }

    public function update($id)
    {
        $model = new ArticleModel();
        if($model->update($id, $this->request->getPost())) {
            return redirect()->to("articles/$id")
            ->with("message","Article updated.");
        }
        return redirect()->back()->with("errors", $model->errors())->withInput();
    }
}

