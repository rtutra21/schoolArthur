<?php

class Database {
    public $host;
    public $username;
    public $password;
    public $db_name;
    public static $db;

    public function __construct($host, $username, $password, $db_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }

    public function index()
    {
        self::$db = mysqli_connect
        (
            $this->host,
            $this->username,
            $this->password,
            $this->db_name
        );
        return self::$db;
    }

}







