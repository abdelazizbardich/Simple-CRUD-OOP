<?php

require "./database.class.php";

class user extends Database{

    private $id;
    private $name;
    private $email;
    private $age;
    
    // get All users
    public function getUsers(){
        $sql = $this->con->prepare("SELECT * FROM users");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }

    // delete user
    public function deleteUser($id){
        $sql = $this->con->prepare("DELETE FROM users WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    // add user

    public function addUser($name,$email,$age)
    {
        $sql = $this->con->prepare("INSERT INTO users (name,email,age) VALUES (:name,:email,:age)");
        $sql->bindParam(":name",$name,PDO::PARAM_STR);
        $sql->bindParam(":email",$email,PDO::PARAM_STR);
        $sql->bindParam(":age",$age,PDO::PARAM_STR);
        if($sql->execute()){
            return $this->con->lastInsertId();
        }else{
            return false;
        }
    }

    // get Single user

    public function getSingleUser($id){
        $sql = $this->con->prepare("SELECT * FROM users WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }

    // update user 
    public function updateUser($id,$name,$email,$age)
    {
        $sql = $this->con->prepare("UPDATE users SET name=:name, email=:email, age=:age WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        $sql->bindParam(":name",$name,PDO::PARAM_STR);
        $sql->bindParam(":email",$email,PDO::PARAM_STR);
        $sql->bindParam(":age",$age,PDO::PARAM_STR);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

}