<?php

use controller\PostController;

$id = $_GET['id'];

$controller = new PostController();

$post = $controller->findPostById($id);

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
<form action="" method="post">
    <table>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $post->getTitle() ?>"></td>
        </tr>
        <tr>
            <td>Teaser:</td>
            <td><input type="text" name="teaser" value="<?php echo $post->getTeaser() ?>"></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><input type="text" name="content" value="<?php echo $post->getContent() ?>"></td>
        </tr>
        <tr>
            <td>Created</td>
            <td><input type="text" name="created"value="<?php echo $post->getCreated() ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="update"></td>
        </tr>
    </table>
</form>
</body>
</html>
