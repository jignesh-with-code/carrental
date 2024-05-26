<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="carrental";

$con=mysqli_connect($db_host,$db_user ,$db_password ,$db_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
      <!-- boostrap link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Create Brand</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}


		</style>

</head>

<body>
  
<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
    <div class="container">
        <!-- <button class="btn btn-primary my-5"><a href="registerform.php" class="text-light"></a></button> -->
        <h2  class="uppercase underline" style="margin-top:100px;font-size:40px;color:#535c68;margin-left:150px">Payment</h2>
        <br><br>
        <table class="table">
        
  <thead>
    <tr>
    <th scope="col">Id</th>

      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Card Name</th>
      <th scope="col">Card Number</th>
      <th scope="col">Expiry Month</th>
      <th scope="col">Expiry Year</th>
      <th scope="col">Card CVV</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody class="table-group-divider">
   
  <?php
   
   $sql="Select * from `payment`";
   $result=mysqli_query($con,$sql);
   
   if($result){  
    while($row=mysqli_fetch_assoc($result))
    {
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $card_name=$row['card_name'];
    $card_number=$row['card_number'];
    $exp_month=$row['exp_month'];
    $exp_year=$row['exp_year'];
    $card_cvv=$row['card_cvv'];
    $amount=$row['amount'];


echo '<tr>
<th scope="row">'.$id.'</th>
  <td>'.$name.'</td>
  <td>'.$email.'</td>
  <td>'.$card_name.'</td>
  <td>'.$card_number.'</td>
  <td>'.$exp_month.'</td>
  <td>'.$exp_year.'</td>
  <td>'.$card_cvv.'</td>
  <td>'.$amount.'</td>


  <td>
  <button class="btn btn-danger"><a href="deletepayment.php? deleteid='.$id.'" class="text-light">Delete</a></button>
  </td>
</tr>';


}
}
 
?>
 
  </tbody>
</table>
    </div>
</body>
<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
</html>