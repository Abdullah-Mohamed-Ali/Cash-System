<?php
ob_start();
include('./connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="./img/cash-withdrawals.jpg" type = "image">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../myCSS/style.css">
    <title>Cash System</title>
</head>


<body>
<time>
<div class="nav"></div>
<form action="" method="post">    
    <input list = "cashier" name = "cashier" placeholder = "cashier" required value = <?php  
    if(isset($_POST['submit_data'])){
        $cashier = $_POST['cashier'];
        echo $cashier;
    }
    ?>>
    <datalist id = "cashier" >
        <option value   ="Ahmed Helmy">
        <option value="Mohamed Reda">
    </datalist>
    <input list = "shift"  name = "shift" placeholder = "Am/PM" required value = <?php
    if(isset($_POST['submit_data'])){
        $shift = $_POST['shift'];
        echo $shift;
    }
    
    ?>>
    <datalist id = "shift">
        <option value="AM">
        <option value="PM">
    </datalist>
    <input type="date" name="date" id="" required value = <?php
    if(isset($_POST['submit_data'])){
        $date = $_POST['date'];
        echo $date;
    }
    ?>>
    <label for="" name = "time"></label>
    <a href="./create.php?i='.$date.'"><input type="submit" name = "submit_data" value="بدايه الشفت" ></a>
        
</form>
    
    <br><hr>
    
    <div class="cash_show">
        <div class="cash">

        
            <table>
                <thead>
                    
                    <tr>
                        <th>البيان</th>
                        <th>القيمه</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>الايراد</td>
                        <td><input type="number" name="revenue" id=""></td>
                    </tr>
                    <tr>
                        <td>Visa</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>المصروفات</td>
                        <td>1600</td>
                    </tr>
                    <tr>
                        <td>رصيد النقديه</td>
                        <td>12000</td>
                    </tr>
                    <tr>
                        <td>الرصيد الفعلي</td>
                        <td>12000</td>
                    </tr>
                    <tr>
                        <td>فرق الدرج</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td>100</td>
                    </tr>
                </tbody>
            
            </table>
            
            <table>
                <thead>
                    <tr>
                        <th>القيمه</th>
                        <th>العدد</th>
                        <th>الفئه النقديه</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>200</td>
                        <td><input type="number" name="tow_hundred" id=""></td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td><input type="number" name="one_hundred" id=""></td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td><input type="number" name="fifty" id=""></td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td><input type="number" name="twenty" id=""></td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><input type="number" name="ten" id=""></td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input type="number" name="five" id=""></td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><input type="number" name="coins" id=""></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>total</td>
                        <td></td>
                        <td>15000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="expenses">
            <h5>المصروفات</h5>

            <?php
            if(isset($_GET['updateExpenses'])){
                $id = $_GET['updateExpenses'];
                $sql =" SELECT * FROM `expenses` WHERE `id` = $id";
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($result);
                $category = $row['category'];
                $description = $row['description'];
                $value = $row['value'];
                echo '
                    <form action="" method="post">
                        <input type="submit" name = "expenses" value="تعديل">
                        <input type="text" name="value" id=""  value=  '.$value.'  required>
                        <input type="text" name="description"  value=  '.$description.' required>
                        <input list= "category" name="category" value= '.$category.'  required >
                        <datalist id = "category">
                            <option value="شحن كهرباء">
                            <option value="سلفيات">
                            <option value="CL">
                            <option value="خدمي-بار">
                            <option value="خدمي-مطبخ">
                            <option value="ضيافه">
                            <option value="صيانه">
                            <option value="م.أخرى">
                        </datalist>            
                    </form>
                    ';
            }



            ?>

            
            <table>
                <thead>
                    <tr>
                        
                        <th>طباعه</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                        <th>قيمه</th>
                        <th>بيان</th>
                        <th>نوع المصروف</th>
                        <th>رقم الايصال</th>                
                    </tr>
                </thead>
                <tbody>

                <?php
                if(isset($_POST['expenses'])){
                    $category = $_POST['category'];
                    $description = $_POST['description'];
                    $value = $_POST['value'];

                    $sql = " UPDATE `expenses` SET `category` = '$category', `description` = '$description',
                        `value` = $value WHERE `id` = $id" ;
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        header('location:../index.php');
                    }else{
                        die(mysqli_error($conn));
                    }

                }

                ?>
                    <tr>
                        <th><button><a href="">print</a></button></th>
                        <th><button><a href="">Edit</a></button></th>
                        <th><button><a href="">Delete</a></button></th>
                        <td>500</td>
                        <td>شحن كهرباء</td>
                        <td>
                            <input list = "expenses_type" name = "expenses_type"
                                    placeholder = "نوع المصروف">
                            <datalist id = "expenses_type">
                                <option value="شحن كهرباء">
                                <option value="سلفيات">
                                <option value="CL">
                                <option value="خدمي-بار">
                                <option value="خدمي-مطبخ">
                                <option value="ضيافه">
                                <option value="صيانه">
                                <option value="م.أخرى">

                            </datalist>
                        </td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
        <div class="show">
            <div class="delivery">
                <h5>شيكات الدليفري</h5>
                <?php
                if(isset($_GET['updateDelivery_id'])){
                    $id = $_GET['updateDelivery_id'];

                    $sql = " SELECT * FROM `cash` WHERE `id` = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $delivery_name = $row['name_delivery'];
                    $delivery_service =$row['delivery_service'];
                    $delivery_value = $row['delivery_value'];                    
                    echo '
                    <form action="" method="post">
                        <input list = "delivery_name" name = delivery_name value = '.$delivery_name.'>
                        <datalist id="delivery_name" required>
                            <option value="مغاوري" >
                            <option value="عبدالله">
                        </datalist>
                        <input type="number" name="delivery_value" id=""  value= '.$delivery_value.'>
                        <input type="number" name="delivery_service" id="" value=  '.$delivery_service.'>
                        <input type="submit" name= "submit_delivery" value="تعديل">
                    </form>                                                        
                    ';
                }
                ?>
                

            
                <table>
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>اسم الطيار</th>
                            <th>قيمه</th>
                            <th>خدمة التوصيل</th>
                            
                            <th><button>Edit</button></th>
                            <th><button>Delete</button></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    if(isset($_POST['submit_delivery'])){
                        $delivery_name = $_POST['delivery_name'];
                        $delivery_service = $_POST['delivery_service'];
                        $delivery_value= $_POST['delivery_value'];                    
                        $sql = " UPDATE `cash` SET `name_delivery`= '$delivery_name', `delivery_service` = $delivery_service, `delivery_value`= $delivery_value
                                    WHERE `id`=$id ";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            
                            header('location:../index.php'); exit;
                            ob_end_flush();
                        }else{
                            die(mysqli_error($conn));
                        }                                          
                    }                
                    ?>

                    <?php
                    $sql = " SELECT * FROM `cash` WHERE `name_delivery` IS NOT NULL ";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $delivery_name = $row['name_delivery'];
                        $delivery_service = $row['delivery_service'];
                        $delivery_value = $row['delivery_value'];
                        echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$delivery_name.'</td>
                            <td>'.$delivery_value.'</td>
                            <td>'.$delivery_service.'</td>
                            <td><button><a href="./cruds/update.php?updateDelivery_id='.$id.'">Edit</a></button></td>
                            <td><button><a href="./cruds/delete.php?deleteDelivery_id='.$id.'">Delete</a></button></td>
                        </tr>
                        ';                    
                    }
                    ?>
                    
                    </tbody>
                </table>
            </div>

            <div class="visa">
                <h5>شيكات الفيزا</h5>
                <?php
                if(isset($_GET['updateVisa'])){
                    $id= $_GET['updateVisa'];
                    $sql = " SELECT * FROM `cash` WHERE `id` = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $visa = $row['visa'];
                    echo '                    
                    <form action="" method="post">
                        <input type="number" name="visa" value =  '.$visa.'  >
                        <input type="submit" name= "submit_visa" value="تعديل">
                    </form>
                    ';                    
                }                                                
                if(isset($_POST['submit_visa'])){

                    $visa = $_POST['visa'];
                    $sql = "UPDATE `cash` SET `visa` = $visa WHERE `id` = $id";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        header('location:../index.php') ;exit;
                        ob_end_flush();
                    }else{
                        die(mysqli_error($conn));
                    }
                }
                ?>
                <table>
                    <thead>
                        <tr>                                                                                    
                            <th>ID</th>
                            <th>القيمه</th>
                            <th><button>Edit</button></th>
                            <th><button>Delete</button></th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = " SELECT * FROM `cash` WHERE `visa`!=0";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $visa = $row['visa'];
                            echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$visa.'</td>
                                <td><button><a href="./cruds/update.php?updateVisa='.$id.'">Edit</a></button></td>
                                <td><button><a href="./cruds/delete.php?deleteVisa='.$id.'">Delete</a></button></td>
                            </tr>
                            ';
                        }



                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    
</div>

    
    
<div class="footer">
    
        <p>By <small>Abdallah Mohamed Ali</small> | all copy reserved <small>&copy;2025</small></p>  
    
    
</div>
    
</body>
</html>