<?php

namespace controller;

use model\classOfMagazine\PostDB;
use model\database\DBConnect;

class PostController
{
    protected $postDB;

    public function __construct()
    {
        $passWord = "khongbiet1";
        $userName = "root";
        $dsn = "mysql:host=localhost;dbname=magazine";
        $db = new DBConnect($dsn, $userName, $passWord);
        $this->postDB = new PostDB($db->connect());
    }

    public function getAll()
    {
        $posts = $this->postDB->getAll();
        include "view/list.php";
    }

    public function deletePost()
    {
        $this->postDB->deletePost();
        header("Location:index.php");
    }

    public function addPost()
    {
        include "view/add.php";
        $this->postDB->addPost();
    }

    public function editPost()
    {
        include "view/edit.php";
        $this->postDB->editPost();
    }

    public function findPostById($id)
    {
        $this->postDB->findPostById($id);
    }
}