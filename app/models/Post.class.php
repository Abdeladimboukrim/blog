
<?php


class Post
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPost($id)
    {
        $this->db->query("SELECT * FROM posts WHERE postId=:id");
        $this->db->bind(":id",$id);
        $post = $this->db->fetch();
        if ($post) return $post;
        else return false;
    }
    public function getPosts()
    {

        $this->db->query("SELECT * FROM posts");
        $posts = $this->db->fetchAll();
        if ($posts) return $posts;
        else return false;
    }


    public function updatePost($data)
    {

        $this->db->query("UPDATE `posts` SET `title`=:title,`description`=:description ,`content`=:content WHERE `postId`=:id");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":content",$data['body']);
        $this->db->bind(":id", $data['postId']);

        if ($this->db->execute()) return true;
        else return false;
    }


    public function addPost($post)
    {
        $this->db->query("INSERT INTO posts (title, description, content, userId) VALUES(:title,:description, :body, :id)");
        $this->db->bind(":title", $post['title']);
        $this->db->bind(":description", $post['description']);
        $this->db->bind(":body", $post['body']);
        $this->db->bind(":id", $_SESSION['id']);

        if ($this->db->execute()) return true;
        else return false;
    }

    public function deletePost($id)
    {

        $this->db->query("DELETE from posts WHERE postId=:id");
        $this->db->bind(":id", $id);

        if ($this->db->execute()) return true;
        else return false;
    }
}
