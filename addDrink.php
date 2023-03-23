<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>User Registration</title>
</head>
<body>


<?php
require 'connect.php';

$sql_select = 'select * from drink order by D_ID';
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {
    
    if (!empty($_POST['D_ID']) && !empty($_POST['D_Name'])) {
        echo '<br>' . $_POST['D_ID'];
        //require 'connect.php';

        $sql = "INSERT INTO drink VALUES (:D_ID, :D_Name, :D_Price)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':D_ID', $_POST['D_ID']);
        $stmt->bindParam(':D_Name', $_POST['D_Name']);
        $stmt->bindParam(':D_Price', $_POST['D_Price']);
        

        try {
            if ($stmt->execute()):
                $message = 'Successfully add new customer';
            else:
                $message = 'Fail to add new customer';
            endif;
            echo $message;
        } catch (PDOException $e) {
            echo 'Fail! ' . $e;
        }

        $conn = null;
    }

    header("location:http://localhost/noodle/");
    exit(0);
}
?>



    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
            <h3>ฟอร์มเพิ่มข้อมูลลูกค้า</h3>
            <form  action="addDrink.php" method="POST">

            <input type="text" placeholder="Enter Drink ID" name="D_ID"> 
            <br> <br>
            <input type="text" placeholder="Name" name="D_Name">
            <br> <br>    
            <input type="number" placeholder="Price" name="D_Price">
            <br> <br> 
         

            <input type="submit" value="Submit" name="submit" />
            </form>
            </div>
        </div>
    </div>
</body>
</html>



