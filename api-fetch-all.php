<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include("config.php");
$sql = "select * from user";
$result = mysqli_query($conn,$sql) or die("No data found.".mysqli_error($result));
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output,JSON_PRETTY_PRINT);
}else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}

?>