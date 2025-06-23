<?php
include('./cruds/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="./img/cash-withdrawals.jpg" type = "image">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./myCSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cash System</title>
</head>


<body>
<time>





<div class="nav">
    <div id="header">

    
        <img src="./img/fave.png" alt="fave" id= "logo">

        <h1>Daily Cash Report</h1>
        <div class="welcome">
            <?php
            
            $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1  ";
            $result= mysqli_query($conn, $sql);
            if($result){
                while($row =mysqli_fetch_assoc($result)){
                $cashier= $row['cashier'];  
                $shift = $row['shift'];  
                $date= $row['date'];
                if($shift == "AM"){
                echo
                '
                <h5>Good Morning '.$cashier.' </h5>
                ';
                }else{
                    echo
                    '
                    <h5> Good Evening '.$cashier.' </h5>
                    ';
                }         
                echo '

                <h5>'.$date.'</h5>
                <h5>'.$shift.'</h5>                                    
                ';  
                

            }

            }
            
            
            ?>
            
        </div>
    </div>
</div >
<div class = "form">
    <form action="./cruds/create.php" method="post" >    
        <input list = "cashier" name = "cashier" placeholder = "cashier" required value = <?php
        
        ?>>
        <datalist id = "cashier" >
            <option value   ="Ahmed Helmy">
            <option value="Mohamed Reda">
        </datalist>
        <input list = "shift"  name = "shift" placeholder = "Am/PM" required value = <?php
            
        ?>>
        <datalist id = "shift">
            <option value="AM">
            <option value="PM">
        </datalist>
        <input type="date" name="date" id="" required value = <?php
        
        
        ?>>
        
        <button type="submit" name = "submitData" class = "btn-sub"><i class="fa-solid fa-play"></i></button>  
        
    </form>
        
</div>        
                    
                
<div class="cash-flow">
    <div class="report">

        <table>
            
            <body>
                <tr>
                    
                    <td >الإيراد</td>
                    <td>مصروفات</td>
                    <td>Visa</td>
                    <td>رصيد النقديه</td>
                    <td>رصيد الدرج</td>
                    <td>فرق</td>
                </tr>
                <tr>
                    
                    <td><input type="number" name="" id="revenue" placeholder = "الإيراد"
                    onkeyup ="cashValue()"></td>
                    <td id = "expenses">
                        <?php
                        if(isset($_POST['submitData'])){
                            $cashier= $_POST['cashier'];
                            $shift= $_POST['shift'];
                            $date= $_POST['date'];
                            $sql = "SELECT SUM(`value`) AS `sum_value` FROM  `expenses`
                            WHERE `date`= '$date' AND `shift` = '$shift' AND `cashier` = '$cashier'";
                            if($result){
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $sum_value = $row['sum_value'];

                                echo $sum_value;
                            }

                        }
                        
                        
                        
                        
                        
                        ?>
                    </td>

                    <td id="visa">                                                              
                        <?php
                        if(isset($_POST['submitData'])){
                            $cashier= $_POST['cashier'];
                            $shift= $_POST['shift'];
                            $date= $_POST['date'];
                        
                            $sql = "SELECT SUM(`visa`) AS `sum_visa` FROM `cash` WHERE `shift` = '$shift'
                            AND `cashier` = '$cashier' AND `date` = '$date'";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                $row = mysqli_fetch_assoc($result);
                                $sum_visa = $row['sum_visa'];
                                
                                echo $sum_visa;

                            }
                        }
                        
                        ?>
                    </td>
                    <td id="netCash"></td>
                    <td id = "cashBalance"></td>
                    
                    <td id = "variance"></td>
                </tr>
                
            </body>
        </table>
    </div>    
    

    <div class="cash-note">
        
        <table>

                
            <body>
                <tr >
                    <td id = "cat200" >200</td>
                    <td id = "cat100" >100</td>
                    <td id = "cat50" >50</td>
                    <td id = "cat20" >20</td>
                    <td id = "cat10" >10</td>
                    <td id = "cat5" >5</td>
                    <td id = "cat1" >1</td>
                </tr>    
            
                <form action="" method="post">
                    <tr>
                        <td><input class = "input-number" type="number" name="" id="input200" placeholder= "أدخل العدد" onkeyup ="cashValue()"></td>
                        <td><input class = "input-number" type="number" name="" id="input100" placeholder= "أدخل العدد">
                        
                        </td>
                        <td><input class = "input-number" type="number" name="" id="input50" placeholder= "أدخل العدد"  onkeyup ="cashValue()" ></td>
                        <td><input  class = "input-number"type="number" name="" id="input20" placeholder= "أدخل العدد"  onkeyup ="cashValue()" ></td>
                        <td><input class = "input-number" type="number" name="" id="input10" placeholder= "أدخل العدد"  onkeyup ="cashValue()" ></td>
                        <td><input class = "input-number" type="number" name="" id="input5" placeholder= "أدخل العدد"  onkeyup ="cashValue()" ></td>
                        <td><input class = "input-number" type="number" name="" id="input1" placeholder= "أدخل العدد"  onkeyup ="cashValue()" ></td>
                        <!-- <td><button type="submit" value="submit"><i class="fa-solid fa-sack-dollar"></i>submit</button></td> -->
                        

                        
                    
                    </tr>
                </form>
                <tr>
                    <td id="value200"></td>                   
                    <td id= "value100"></td>
                    <td id= "value50"></td>
                    <td id= "value20"></td>
                    <td id= "value10"></td>
                    <td id= "value5"></td>
                    <td id= "value1"></td>
                </tr>
            </body>   
            
        </table>    
        
    </div>

</div>        
    
    <div class="expenses">
        <!-- <h5>المصروفات</h5> -->

        <form action="./cruds/create.php" method="post">
            <button type="submit" name = "expenses" id = "add"><i class="fa-solid fa-plus"></i></button>
            
            <input type="text" name="value" id="value" placeholder = "قيمة " required >
            <input type="text" name="description" id="description" placeholder = "بيان " required >
            <input list= "category" name="category" id="category" placeholder = "نوع المصروف" required >
            <input type="hidden" name="" id = "hidden">
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
        <table>
            <thead>
                <tr>
                    
                    <th >طباعه</th>
                    <th >تعديل</th>
                    <th >حذف</th>
                    <th id="value">قيمه</th>
                    <th id="description">بيان</th>
                    <th id="category" >نوع المصروف</th>
                    <th id = "hidden">رقم الايصال</th>                
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1  ";
                $result= mysqli_query($conn, $sql);
                if($result){
                    while($row =mysqli_fetch_assoc($result)){
                    $cashier= $row['cashier'];  
                    $shift = $row['shift'];  
                    $date= $row['date'];
                    
                    $sql = "SELECT * FROM `expenses` WHERE `cashier` = '$cashier'
                    AND `shift` = '$shift' AND `date` = '$date'";
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $category = $row['category'];
                        $description = $row['description'];
                        $value = $row['value'];
                        echo '
                        <tr>
                        <th class = "btn-edit"><button id ="print" ><a href="./cruds/print.php?printExpenses='.$id.'" ><i class="fa-solid fa-print"></i></a></button></th>
                        <th class = "btn-edit"><button id = "up"  ><a href="./cruds/update.php?updateExpenses='.$id.'"><i class="fa-regular fa-pen-to-square"></i></a></button></th>
                        <th class = "btn-edit"><button id ="del" ><a href="./cruds/delete.php?deleteExpenses='.$id.'"><i class="fa-solid fa-trash-can"></i></a></button></th>
                        <td>'.$value.'</td>
                        <td>'.$description.'</td>
                        <td >'.$category.'</td>                                                                
                        <td>'.$id.'</td>
                    </tr>                                        
                        ';
                    }


                }

                }
                
                ?>
                
            </tbody>
        </table>



        
        
    </div>
    
        <div class="show">
            <div class="delivery">
                <div class="deliveryData">
                    <?php
                        $firstDelivery = "عبدالله";
                        $secondDelivery = "مغاوري";
                        $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1  ";
                        $result= mysqli_query($conn, $sql);
                        if($result){
                            while($row =mysqli_fetch_assoc($result)){
                            $cashier= $row['cashier'];  
                            $shift = $row['shift'];  
                            $date= $row['date'];
                            $sql= "SELECT COUNT(`delivery_value`) AS `count_first` FROM `cash` 
                            WHERE  `name_delivery` = '$firstDelivery' AND `shift` = '$shift'
                            AND `cashier` = '$cashier' AND `date` = '$date' "; 
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $count_first = $row['count_first'];
                            $sql= "SELECT COUNT(`delivery_value`) AS `count_second` FROM `cash` 
                            WHERE  `name_delivery` = '$secondDelivery' AND `shift` = '$shift'
                            AND `cashier` = '$cashier' AND `date` = '$date' "; 
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $count_second = $row['count_second'];
                            $sql = " SELECT SUM(delivery_value) AS  `sum_delivery` FROM `cash`
                            WHERE `cashier` = '$cashier' AND `date` = '$date' AND `shift` = '$shift'";
                            $result = mysqli_query($conn, $sql);
                            $row=mysqli_fetch_assoc($result);
                            $sum_delivery = $row['sum_delivery'];



                            echo '
                                <h5>شيكات الدليفري
                            
                            <sup>
                        
                            '.$count_first + $count_second.'
                            
                            </sup>
                            
                            <sup>
                            
                            '.$sum_delivery.'
                            
                            </sup>
                            
                        </h5>
                        <h5>عدد أوردرات عبدالله<sup>
                            
                            '.$count_first.'
                            
                            </sup></h5>
                        <h5>عدد أوردرات مغاوري<sup>
                            
                            '.$count_second.'
                            
                        </sup></h5>
                    
                    
                    
                            
                            
                            
                            
                            ';
                        }

                        }
                        
                        ?>


                    
                </div>

            <form action="./cruds/create.php" method="post">
                <input list = "delivery_name" name = delivery_name placeholder = "إسم الطيار" required>
                <datalist id="delivery_name" required>
                    <option value="مغاوري" >
                    <option value="عبدالله">
                </datalist>
                <input type="number" name="delivery_value" id="" placeholder = "المبلغ" required>
                <input type="number" name="delivery_service" id="" placeholder = "خدمة التوصيل"required>
                <button type="submit" name = "submit_delivery" id = "add"><i class="fa-solid fa-plus"></i></button>
                
            </form>
            
            
            
            <table>
                <thead>
                    <tr>
                        
                        
                        <th>اسم الطيار</th>
                        <th>قيمه</th>
                        <th>خدمة التوصيل</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1  ";
                $result= mysqli_query($conn, $sql);
                
                while($row =mysqli_fetch_assoc($result)){
                    $cashier= $row['cashier'];  
                    $shift = $row['shift'];  
                    $date= $row['date'];
                    $sql = " SELECT * FROM `cash` WHERE `name_delivery` IS NOT NULL 
                    AND `cashier` = '$cashier' AND `shift` = '$shift' AND `date` = '$date' ";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $delivery_name = $row['name_delivery'];
                        $delivery_service = $row['delivery_service'];
                        $delivery_value = $row['delivery_value'];
                        echo '
                        <tr>
                            
                            <td>'.$delivery_name.'</td>
                            <td>'.$delivery_value.'</td>
                            <td>'.$delivery_service.'</td>
                            <td class = "btn-edit"><button id  = "up"><a href="./cruds/update.php?updateDelivery_id='.$id.'"><i class="fa-regular fa-pen-to-square"></i></a></button></td>
                            <td class = "btn-edit"><button id ="del"><a href="./cruds/delete.php?deleteDelivery_id='.$id.'"><i class="fa-solid fa-trash-can"></i></a></button></td>

                        </tr>

                        ';
                    }
                        
                }
            

                ?>
                    
                    
                </tbody>
            </table>
            </div>

            <div class="visa">

                
                <h5>شيكات الفيزا</h5>
                
                <?php
                
                while($row =mysqli_fetch_assoc($result)){
                    $cashier= $row['cashier'];  
                    $shift = $row['shift'];  
                    $date= $row['date'];
                    $sql = " SELECT COUNT(`visa`) AS `count_visa` FROM `cash` WHERE `shift` = '$shift'
                    AND `cashier` = '$cashier' AND `date` = '$date' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $count_visa = $row['count_visa'];
                    echo '
                    <h5>عدد شيكات الفيزا<small><sup>'.$count_visa.'</sup></small></h5>
                    ';
                

                    $sql = "SELECT SUM('visa') AS `sum_visa` FROM `cash` WHERE `shift` = '$shift'
                    AND `cashier` = '$cashier' AND `date` = '$date' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $sum_visa = $row['sum_visa'];
                    echo '
                    <h5>إجمالي شيكات الفيزا<small>'.$sum_visa.'</small></h5>
                    ';



                }
                    ?>    
                
                
                

                <form action="./cruds/create.php" method="post">
                    <input type="number" name="visa" id="" placeholder = "visa" required>
                    <button type="submit" name = "submit_visa" id = "add"><i class="fa-solid fa-plus"></i></button>
                    
                </form>
                <table>
                    <thead>
                        <tr>
                            
                            
                            
                            
                            <th>القيمه</th>
                            <th>Edit</th>
                            <th>Delete</th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1  ";
                        $result= mysqli_query($conn, $sql);
                        
                        while($row =mysqli_fetch_assoc($result)){
                            $cashier= $row['cashier'];  
                            $shift = $row['shift'];  
                            $date= $row['date'];

                            $sql = " SELECT * FROM `cash` WHERE `visa`!=0 
                            AND `cashier` = '$cashier' AND `shift` = '$shift' AND `date` = '$date'";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $visa = $row['visa'];
                                echo '
                                <tr>
                                    
                                    <td>'.$visa.'</td>
                                    <td class = "btn-edit"><button id  = "up"><a href="./cruds/update.php?updateVisa='.$id.'"><i class="fa-regular fa-pen-to-square"></i></a></button></td>
                                    <td class = "btn-edit"><button id ="del"><a href="./cruds/delete.php?deleteVisa='.$id.'"><i class="fa-solid fa-trash-can"></i></a></button></td>
                                </tr>
                                ';
                            }
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- </div>    -->
    
<div class="footer">
    
        <h6>By <small>Abdallah Mohamed Ali</small> | all copy reserved <small>&copy;2025</small></h6>  
    
    
</div>
    <script src="./main.js"></script>
</body>
</html>