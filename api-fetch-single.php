<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: get,put,post,delete');
include("config.php");
$data = json_decode(file_get_contents("php://input"),true);
$Student_id = $data['sId'];
$sql = "select * from user where id = '$Student_id'";
$result = mysqli_query($conn,$sql) or die("No data found".mysqli_error($conn));
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}

?>