<?php

$conn = mysqli_connect("localhost","root", "", "cash");
if($conn){
    // echo "connected";
}else{
    die(mysqli_error($conn));
}


?>