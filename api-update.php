<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: post');
header('Access-Control-Allow-Header: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
include("config.php");
$data = json_decode(file_get_contents("php://input"),true);
$Student_id = $data['sId'];
$Student_name = $data['sName'];
$Student_email = $data['sEmail'];
$Student_skill = $data['sSkill'];
$sql = "update  user
set
Name  = '$Student_name',
Email = '$Student_email',
Skill = '$Student_skill'
where ID = '$Student_id'";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record Updated','status'=>true));
}else{
    echo json_encode(array('message'=>'Not updated','status'=>false));
}

?>