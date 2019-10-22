<?php


namespace model\classOfMagazine;


class PostDB
{
    protected $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();

        $posts = [];
        foreach ($result as $value) {
            $post = new Post($value['title'], $value['teaser'], $value['content'], $value['created']);
            $post->setId($value['id']);
            array_push($posts, $post);
        }
        return $posts;
    }

    public function deletePost()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function addPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST['title'];
            $teaser = $_POST['teaser'];
            $content = $_POST['content'];
            $created = $_POST['created'];
            $sql = "INSERT INTO posts(title,teaser,content,created) VALUES (:title,:teaser,:content,:created)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":teaser", $teaser);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":created", $created);
            $stmt->execute();
            header("Location:index.php");
        }
    }

    public function editPost()
    {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $title = $_POST['title'];
            $teaser = $_POST['teaser'];
            $content = $_POST['content'];
            $created = $_POST['created'];
            $sql = "UPDATE posts SET title=:title,teaser=:teaser,content=:content,created=:created WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":teaser", $teaser);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":created", $created);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location:index.php");
        }
    }

    public function findPostById($id)
    {
        $sql = "SELECT * FROM posts WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch();
        $post = new Post($result['title'], $result['teaser'], $result["content"], $result['created']);
        return $post;
    }
}