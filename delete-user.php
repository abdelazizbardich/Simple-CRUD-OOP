<?php
require "./user.class.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $user = new User();
    if($user->deleteUser($id)){
        $responce = array(
            "state" => 200,
            "msg" => "success"
        );
    }else{
        $responce = array(
            "state" => 500,
            "msg" => "Server Error"
        );
    }
}else{
    $responce = array(
        "state" => 404,
        "msg" => "Id not found"
    );
}
echo json_encode($responce);