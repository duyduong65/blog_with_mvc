<?php

use controller\PostController;
use model\classOfMagazine\constInterface;

include_once "model/classOfMagazine/constInterface.php";
include_once "model/database/DBConnect.php";
include_once "model/classOfMagazine/PostDB.php";
include_once "model/classOfMagazine/Post.php";
include_once "controller/PostController.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$controller = new PostController();

$page = (isset($_REQUEST['page']) ? $_REQUEST['page'] : NUll);
switch ($page) {
    case "":
        $controller->getAll();
        break;
    case constInterface::ADD:
        $controller->addPost();
        break;
    case constInterface::DELETE:
        $controller->deletePost();
        break;
    case constInterface::EDIT:
        $controller->editPost();
    default:
}
?>
</body>
</html>
