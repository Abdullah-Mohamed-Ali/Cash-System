<?php
include('./connect.php');




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../myCSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body class = "print-preview">
    <div class="receipt">
        <!-- <img class = "logo" src="../img/fave.png" alt="fave"> -->
        
        <table>
            <tbody>
                <!-- <h5>إيصال صرف نقديه</h5> -->
                
                <?php  
                $sql = "SELECT * FROM `cash` ORDER BY `id` DESC limit 1  ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $cashier= $row['cashier'];  
                $shift = $row['shift'];  
                $date= $row['date'];
                ?>
                <?php
                if(isset($_GET['printExpenses'])){
                    $id = $_GET['printExpenses'];
                    $sql = " SELECT * FROM `expenses` WHERE `id` = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $description = $row['description'];
                    $category = $row['category'];
                    $value = $row['value'];
                }
                ?>
                <tr>
                    <td >رقم الايصال</td>
                    <td>الكاشير</td>
                    <td>الشفت</td>
                    <td>الوقت</td>
                    <td>التاريخ</td>
                </tr>
                <tr>
                    <td ><?php echo $id; ?></td>
                    <td class = "col2"><?php echo $cashier; ?></td>
                    <td class = "col2"><?php echo $shift; ?></td>
                    <td class = "col2"><?php echo date ("h:i;sa"); ?></td>
                    <td class = "col2"><?php echo $date; ?></td>
                </tr>
                
                <tr>
                    <td>القيمه</td>
                    <td colspan = "3">البيان</td>                    
                    <td>نوع المصروف</td>
                </tr>
                <tr>
                    <td ><?php echo $value; ?></td>
                    <td colspan = "3"><?php echo $description; ?></td>
                    <td ><?php echo $category; ?></td>                                        
                </tr>
                <tr>
                    <td colspan = "3">عبدالله محمد علي</td>
                    <td colspan = "2">الإداره الماليه</td>                                        
                </tr>               
                
                
            </tbody>
        </table>
        <!-- <h6>By <small>Abdallah Mohamed Ali</small> | all copy reserved <small>&copy;2025</small></h6>                -->
        
        <div class="print-area">
            <button class="print"  type="button"><a href="../index.php"><i class="fa-solid fa-arrow-left"></i></a></button>
            <button class="print" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    </div>

    

    

    
    <script src="../main.js"></script>
</body>
</html>