<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Update Food </title>
</head>

<body>

  <?php
  require 'connect.php';

  $sql_select_country = "SELECT * FROM food";
  $stmt_c = $conn->prepare($sql_select_country);
  $stmt_c->execute();
  echo "F_ID = " . $_GET['F_ID'];

  if (isset($_GET['F_ID'])) {
    $sql_select_customer = 'SELECT * FROM food WHERE F_ID=?';
    $stmt = $conn->prepare($sql_select_customer);
    $stmt->execute([$_GET['F_ID']]);
    echo "get = " . $_GET['F_ID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-4"> <br>
        <h3>ฟอร์มแก้ไขรายการอาหาร</h3>
        <form action="updateFood.php" method="POST">
          <input type="hidden" name="F_ID" value="<?= $_GET['F_ID'] ?>">

          <label for="name" class="col-sm-2 col-form-label"> ชื่อ : </label>

          <input type="text" name="F_Name" class="form-control" required value="F_Name">
          
          <label for="name" class="col-sm-2 col-form-label"> ราคา : </label>

          <input type="number" name="F_Price" class="form-control" required value="F_Price">

          <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
  </div>

</body>
