<?php

include('./connect.php');
// include ('../index.php');

// if(isset($_GET['i'])){
//     $date = $_GET['i'];
//     echo $date;
// }

// =============== create info =================

if(isset($_POST['submitData'])){
    $cashier =$_POST['cashier'];
    $shift =$_POST['shift'];
    $date =$_POST['date'];
    $sql = " INSERT INTO `cash` (`cashier`, `shift`, `date`) VALUES ('$cashier',
    '$shift', '$date')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:../index.php');
    }else{
        die(mysqli_error($conn));
    }
}


// ================================ Delivery ======================
// include('../index.php');
// if(isset($_POST['submit_data'])){
//     $cashier = $_POST['cashier'];
//     echo $cashier;

    
if(isset($_POST['submit_delivery'])){
    $delivery_name = $_POST['delivery_name'];
    $delivery_value = $_POST['delivery_value'];
    $delivery_service = $_POST['delivery_service'];
    $sql = "SELECT * FROM `cash` ORDER BY `id` DESC LIMIT 1 ";
    $result= mysqli_query($conn, $sql);
    $row =mysqli_fetch_assoc($result);
    $cashier= $row['cashier'];  
    $shift = $row['shift'];  
    $date= $row['date'];


    $sql = "INSERT INTO `cash` (`name_delivery`, `delivery_service`, `delivery_value`, `cashier`, 
            `shift`, `date`)
            VALUES ('$delivery_name',$delivery_service, $delivery_value, '$cashier',
            '$shift', '$date')";

    $execute = mysqli_query($conn, $sql);
    if($execute){
        echo "data inserted successfully";
        header('location:../index.php');
        echo "data inserted successfully";
    }else{
        die(mysqli_error($conn));
    }

}
// }

//  ======================= Visa ==========================
if(isset($_POST['submit_visa'])){
    $visa = $_POST['visa'];
    $sql = "SELECT * FROM `cash` ORDER BY `id`  DESC LIMIT 1 ";
    $result= mysqli_query($conn, $sql);
    $row =mysqli_fetch_assoc($result);
    $cashier = $row['cashier'];
    $shift= $row['shift'];
    $date = $row['date'];

    $sql = " INSERT INTO `cash` (`visa`, `cashier`, `shift`, `date`) VALUES ($visa,
    '$cashier', '$shift','$date')";
    $result = mysqli_query($conn, $sql);
    header('location:../index.php');
}



//  ================== EXPENSES =================
if(isset($_POST['expenses'])){
    $category = $_POST['category'];
    $description = $_POST['description'];
    $value = $_POST['value'];
    $sql = "SELECT * FROM `cash` ORDER BY `id`  DESC LIMIT 1 ";
    $result= mysqli_query($conn, $sql);
    $row =mysqli_fetch_assoc($result);
    $cashier = $row['cashier'];
    $shift= $row['shift'];
    $date = $row['date'];

    $sql =" INSERT INTO `expenses` (`category`, `description`, `value` , `cashier`, `shift`, `date`)
    VALUES ('$category', '$description', $value, '$cashier', '$shift', '$date')";

    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:../index.php');

    }else{
        
    }
}



?>


