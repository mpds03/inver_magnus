<?php

class Database{
private $host ="localhost";
private $dtabase = "inver_magnus";
private $username = "root";
private $password = "";
private $conn;

public function getConnection(){
    $this->conn = null;
    try{
        $this->conn = new PDO("mysql:host=".$this->host. ";dbname=".$this->dtabase, $this->username, $this->password);
        $this->conn->exec("set names utf8");
        echo "";
    }catch(PDOException $exception){
        echo "Error de conexión ".$exception->getMessage();
    }
    return $this->conn;
}

}