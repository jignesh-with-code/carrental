<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="carrental";

$con=mysqli_connect($db_host,$db_user ,$db_password ,$db_name);

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];


    $sql="delete from `payment` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
       // echo"deleted sucessfully";
       header('location:paymentshow.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>