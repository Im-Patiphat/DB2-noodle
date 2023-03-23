<?php

if (isset($_POST['F_ID'])) {
    require 'connect.php';

    $F_ID = $_POST['F_ID'];
    $F_Name = $_POST['F_Name'];
    $F_Price = $_POST['F_Price'];

    echo 'F_ID = ' . $F_ID;
    echo 'F_Name = ' . $F_Name;
    echo 'F_Price = ' . $F_Price;


    $stmt = $conn->prepare(
        'UPDATE  food SET F_Name = :F_Name, F_Price = :F_Price WHERE F_ID = :F_ID');
    $stmt->bindParam('F_ID', $_POST['F_ID']);
    $stmt->bindParam('F_Name', $_POST['F_Name']);
    $stmt->bindParam('F_Price', $_POST['F_Price']);
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

