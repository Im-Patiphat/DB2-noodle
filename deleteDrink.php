<?php

require('connect.php');


$sql = "DELETE from drink where D_ID = :D_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':D_ID',$_GET['D_ID']);

if($stml->execute()){
    $message = "Successfully delete Drink".$_GET['D_ID'].".";
}else{
    $message = "Fail to delete Drink information.";
}
echo $message;
$conn = null;


header("location: http://localhost/noodle/");
    exit(0);
?>