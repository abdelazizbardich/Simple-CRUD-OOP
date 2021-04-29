<?php
require './user.class.php';
if(isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $user = new User();
    $result = $user->addUser($name,$email,$age);
    if($result){
        $responce = array(
            "state" => 200,
            "msg" => "success",
            "lastInsert" => array(
                "id" => $result,
                "name" => $name,
                "email" => $email,
                "age" => $age
            )
        );
    }else{
        $responce = array(
            "state" => 500,
            "msg" => "Server error!"
        );
    }
}else{
    $responce = array(
        "state" => 403,
        "msg" => "Method not allowed!"
    );
}
echo json_encode($responce);