<?php

class Database{


    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "crud";
    protected $con;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=".$this->database, $this->user, $this->password);
            // set the PDO error mode to exception
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->con = null;
    }
}