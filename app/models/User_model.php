<?php

class User_model
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($username, $password, $sebagai)
    {
        $this->db->query("SELECT * FROM mst_user WHERE nama_user = :username AND password = :password AND sebagai = :sebagai");
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('sebagai', $sebagai);
        return $this->db->resultSet();
    }
}