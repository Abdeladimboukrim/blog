<?php

class Bloger
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * from bloger WHERE email=:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount()) return true;
        else return false;
    }

    
    public function register($name, $email, $password)
    {
        $this->db->query("INSERT INTO bloger (firstName, email, password) VALUES(:name, :email, :password)");
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);

        if ($this->db->execute()) return true;
        else return false;
    }
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM bloger WHERE email=:email");
        $this->db->bind(":email", $email);
        $row = $this->db->fetch();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}
