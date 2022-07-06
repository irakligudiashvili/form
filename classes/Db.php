<?php

class Db{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "da_form";

    private function connect(){
        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);return $conn;
            echo "Connected successfully";
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function addUser($fname, $lname, $email){
        $conn = $this->connect();
        try{
            $sql = "INSERT INTO users (first_name, last_name, email) VALUES ('$fname', '$lname', '$email')";
            $conn->exec($sql);
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function get(){
        $conn = $this->connect();
        $sql = $conn->prepare("SELECT * FROM users");
        $sql->execute();

        $res = $sql->setFetchMode(PDO::FETCH_ASSOC);
        $res = $sql->fetchAll();

        return $res;
    }

    public function delete($id){
        $conn = $this->connect();

        try{
            $sql = "DELETE FROM users WHERE id=$id";
            $conn->exec($sql);
        } catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

}