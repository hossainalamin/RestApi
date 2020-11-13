<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: get,put,post,delete');
header('Access-Control-Allow-Methods: put');
header('Access-Control-Allow-Header: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With ');
include("config.php");
$data = json_decode(file_get_contents("php://input"),true);
$Student_id = $data['sId'];
$sql = "delete from user where id = '$Student_id'";

if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Record deleted','status'=>true));
}else{
    echo json_encode(array('message'=>'Record not deleted','status'=>false));
}
?>