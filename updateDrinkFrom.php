<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Update Drink </title>
</head>

<body>

  <?php
  require 'connect.php';

  $sql_select_country = "SELECT * FROM drink";
  $stmt_c = $conn->prepare($sql_select_country);
  $stmt_c->execute();
  echo "D_ID = " . $_GET['D_ID'];

  if (isset($_GET['D_ID'])) {
    $sql_select_customer = 'SELECT * FROM drink WHERE D_ID=?';
    $stmt = $conn->prepare($sql_select_customer);
    $stmt->execute([$_GET['D_ID']]);
    echo "get = " . $_GET['D_ID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-4"> <br>
        <h3>ฟอร์มแก้ไขรายการเครื่องดื่ม</h3>
        <form action="updateDrink.php" method="POST">
          <input type="hidden" name="D_ID" value="<?= $_GET['D_ID'] ?>">

          <label for="name" class="col-sm-2 col-form-label"> ชื่อ : </label>

          <input type="text" name="D_Name" class="form-control" required value="D_Name">
          
          <label for="name" class="col-sm-2 col-form-label"> ราคา : </label>

          <input type="number" name="D_Price" class="form-control" required value="D_Price">

          <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
  </div>

</body>
