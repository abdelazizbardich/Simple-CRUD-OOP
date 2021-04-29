<?php
require './user.class.php';
if(isset($_POST)){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $user = new User();
    $result = $user->updateUser($id,$name,$email,$age);
    if($result){
        $responce = array(
            "state" => 200,
            "msg" => "success",
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