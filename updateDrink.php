<?php

if (isset($_POST['D_ID'])) {
    require 'connect.php';

    $D_ID = $_POST['D_ID'];
    $D_Name = $_POST['D_Name'];
    $D_Price = $_POST['D_Price'];

    echo 'D_ID = ' . $D_ID;
    echo 'D_Name = ' . $D_Name;
    echo 'D_Price = ' . $D_Price;


    $stmt = $conn->prepare(
        'UPDATE  drink SET D_Name = :D_Name, D_Price = :D_Price WHERE D_ID = :D_ID');
    $stmt->bindParam('D_ID', $_POST['D_ID']);
    $stmt->bindParam('D_Name', $_POST['D_Name']);
    $stmt->bindParam('D_Price', $_POST['D_Price']);
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>

