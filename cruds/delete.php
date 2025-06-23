<?php
include('./connect.php');

// ================ Delete delivery ==================

if(isset($_GET['deleteDelivery_id'])){
    $id = $_GET['deleteDelivery_id'];

    $sql = " DELETE FROM `cash` WHERE `id` = $id ";
    $execute = mysqli_query($conn,$sql);
    if($execute){
        header('location:../index.php');
    }else{
        die(mysqli_error($conn));
    }
    
}


//   =========== delete Visa =================

if(isset($_GET['deleteVisa'])){
    $id = $_GET['deleteVisa'];
    $sql = " DELETE FROM `cash` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:../index.php');
    }else{
        die(mysqli_error($conn));
    }

}
//  ================ delete expenses =================

if(isset($_GET['deleteExpenses'])){
    $id = $_GET['deleteExpenses'];
    $sql = " DELETE FROM `expenses` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:../index.php');

    }else{
        die(mysqli_error($conn));
    }
}

?>