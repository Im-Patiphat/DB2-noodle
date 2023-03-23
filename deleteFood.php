<?php

require('connect.php');


$sql = "DELETE from food where F_ID = :F_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':F_ID',$_GET['F_ID']);

if($stml->execute()){
    $message = "Successfully delete Food".$_GET['F_ID'].".";
}else{
    $message = "Fail to delete Food information.";
}
echo $message;
$conn = null;


header("location: http://localhost/noodle/");
    exit(0);
?>