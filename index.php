<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>CRUD Customer Information</title>
    </head>
    <body>
         <!--Food-->
        <div class="container">
            <div class="row1">
                <div class="food"> <br>
                    <h3>รายการอาหาร <a href="addFood.php" class="btn btn-info float-end">+เพิ่มรายการอาหาร</a> </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead align="center">                        
                            <tr>
                                <th width="10%">รหัสอาหาร</th>
                                <th width="20%">ชื่ออาหาร</th>
                                <th width="10%">ราคา</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>                       
                        </thead>

                        <tbody>
                          <?php
                            require 'connect.php';
                            $sql =  "SELECT * FROM food";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['F_ID'] ?></td>
                                <td><?= $r['F_Name'] ?></td>
                                <td><?= $r['F_Price'] ?></td>
                                <td><a href="updateFoodFrom.php?F_ID=<?= $r['F_ID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deleteFood.php?F_ID=<?= $r['F_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php }
                            $conn = null;
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
                                <!--Drink-->
        <div class="container">
            <div class="row2">
                <div class="drink"> <br>
                    <h3>รายการเครื่องดื่ม <a href="addDrink.php" class="btn btn-info float-end">+เพิ่มรายการเครื่องดื่ม</a> </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead align="center">                        
                            <tr>
                                <th width="10%">รหัสเครื่องดื่ม</th>
                                <th width="20%">ชื่อเครื่องดื่ม</th>
                                <th width="10%">ราคา</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>                       
                        </thead>

                        <tbody>
                          <?php
                            require 'connect.php';
                            $sql =  "SELECT * FROM drink";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['D_ID'] ?></td>
                                <td><?= $r['D_Name'] ?></td>
                                <td><?= $r['D_Price'] ?></td>
                                <td><a href="updateDrinkFrom.php?D_ID=<?= $r['D_ID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deleteDrink.php?D_ID=<?= $r['D_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php }
                            $conn = null;
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 

    </body>
</html>