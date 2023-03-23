<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbname = "noodle";

try
{
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname;charset=UTF8",
        $userName,$userPassword);  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       

} catch (PDOException $e) {
    echo "Sorry! You cannot connect to database";
}
?>