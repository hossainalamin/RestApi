<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: get,put,post,delete');
include("config.php");
// $data = json_decode(file_get_contents("php://input"),true);
// $Student_name = $data['search'];
$Student_name = isset($_GET['search_val'])?$_GET['search_val']:die("no such data");
$sql = "select * from user where Name like '%$Student_name%'";
$result = mysqli_query($conn,$sql) or die("No data found".mysqli_error($conn));
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}

?>