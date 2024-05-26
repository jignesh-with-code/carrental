<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html> 

<html lang="en"> 

  

<head> 

    <meta charset="UTF-8"> 

    <meta name="viewport" 

          content="width=device-width, initial-scale=1.0"> 

    <title>Online Payment-Page</title> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap'); 

  
* { 

    margin: 0; 

    padding: 0; 

    box-sizing: border-box; 

    border: none; 

    outline: none; 

    font-family: 'Poppins', sans-serif; 

    text-transform: capitalize; 

    transition: all 0.2s linear; 
} 

  
.container { 

    display: flex; 

    justify-content: center; 

    align-items: center; 

    min-height: 100vh; 

    padding: 25px; 

    background: #d6eef1; 
} 

  
.container form { 

    width: 700px; 

    padding: 20px; 

    background: #fff; 

    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2); 
} 

  
.container form .row { 

    display: flex; 

    flex-wrap: wrap; 

    gap: 15px; 
} 

  
.container form .row .col { 

    flex: 1 1 250px; 
} 

  
.col .title { 

    font-size: 20px; 

    color: rgb(237, 55, 23); 

    padding-bottom: 5px; 
} 

  
.col .inputBox { 

    margin: 15px 0; 
} 

  
.col .inputBox label { 

    margin-bottom: 10px; 

    display: block; 
} 

  
.col .inputBox input, 
.col .inputBox select { 

    width: 100%; 

    border: 1px solid #ccc; 

    padding: 10px 15px; 

    font-size: 15px; 
} 

  
.col .inputBox input:focus, 
.col .inputBox select:focus { 

    border: 1px solid #000; 
} 

  
.col .flex { 

    display: flex; 

    gap: 15px; 
} 

  
.col .flex .inputBox { 

    flex: 1 1; 

    margin-top: 5px; 
} 

  
.col .inputBox img { 

    height: 34px; 

    margin-top: 5px; 

    filter: drop-shadow(0 0 1px #000); 
} 

  
.container form .submit_btn { 

    width: 100%; 

    padding: 12px; 

    font-size: 17px; 

    background: rgb(1, 143, 34); 

    color: #fff; 

    margin-top: 5px; 

    cursor: pointer; 

    letter-spacing: 1px; 
} 

  
.container form .submit_btn:hover { 

    background: #3d17fb; 
} 

  
input::-webkit-inner-spin-button, 
input::-webkit-outer-spin-button { 

    display: none; 
}

    </style>

</head> 

  <!-- fetch code in table in php -->
  
<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="carrental";
$conn=mysqli_connect($db_host , $db_user , $db_password , $db_name);

//  $FullName=$_POST['fullname'];


$useremail=$_SESSION['login'];


   $qry="select  tblusers.FullName , tblusers.EmailId , tblusers.Country ,  tblusers.Address , tblusers.City ,tblvehicles.PricePerDay , DATEDIFF (tblbooking.ToDate,tblbooking.FromDate) as totaldays
   
   
   
   from tblusers JOIN 

   tblbooking   JOIN tblvehicles ON tblbooking.VehicleId=tblvehicles.id
   
   where EmailId='$useremail'  order by tblbooking.id desc";


//    $tds=$_REQUEST['totaldays'];
   

//    $ppd=$_REQUEST['PricePerDay'];
//    echo $ppd;

//    $amt=$tds*$ppd;
//     echo $amt;
   $data=mysqli_query($conn,$qry);


   // echo '<table class="table table-striped">';
   // echo  "<thead>";
   // echo   "<tr>";
   // echo   "<th>Name</th>";
   // echo   "<th>Email</th>";
   // echo   "<th>Phone</th>";
  
   // echo   "<th>Action</th>";
   // echo   "<th>Action</th>";
   // echo   "</tr>";
   // echo  "</thead>";

   // echo  "<tbody>";
    

   $row=mysqli_fetch_assoc($data)

// {

    
       

//     echo "<tr>";
    // echo "<td>"  .$row["totaldays"].    "</td>";
//     echo "<td>"  .$row["EmailId"].  "</td>";
//     echo "<td>"  .$row["ContactNo"]. "</td>";
//     echo "<td>"  .$row["Address"]. "</td>";
//     echo "<td>"  .$row["City"] ."</td>";
// }

?>



<!-- end the code of fetch data for php -->





<!-- insert the record in database for payment form table -->
<?php
 $db_host="localhost";
 $db_user="root";
 $db_password="";
 $db_name="carrental";
 $conn=mysqli_connect($db_host , $db_user , $db_password , $db_name);

if(isset($_REQUEST['submit']))
{
  //checking for empty fields
   if(($_REQUEST['name']=="") || ($_REQUEST['email']=="") ||  ($_REQUEST['address']=="") || ($_REQUEST['city']=="") || ($_REQUEST['country']=="") || ($_REQUEST['zip_code']=="") || ($_REQUEST['amount']=="") || ($_REQUEST['Card_name']=="") || ($_REQUEST['Card_number']=="") || ($_REQUEST['Exp_month']=="")|| ($_REQUEST['Exp_year']=="")|| ($_REQUEST['Card_cvv']==""))
   {
       echo "<script>alert('Fill all fileds')</script>";
   }
   else{
    $FullName=$_REQUEST['name'];
      
       $EmailId=$_REQUEST['email'];
       
       $Address=$_REQUEST['address'];
       $City=$_REQUEST['city'];
       $Country=$_REQUEST['country'];

       $zip_code=$_REQUEST['zip_code'];
       $amount=$_REQUEST['amount'];
       $card_name=$_REQUEST['Card_name'];
       $card_number=$_REQUEST['Card_number'];
       $exp_month=$_REQUEST['Exp_month'];

      
       $exp_year=$_REQUEST['Exp_year'];
       $card_cvv=$_REQUEST['Card_cvv'];


       $useremail=$_SESSION['login'];
       
      
    
    //   echo "<h1>". $_GET['vhid']."</h1>";

       $sql="insert into payment(name ,email ,address ,city ,country ,zip_code ,amount ,Card_name ,Card_number ,Exp_month, Exp_year ,Card_cvv) values ('$FullName','$EmailId' ,  '$Address' , '$City' , '$Country' , '$zip_code' , '$amount' , '$card_name' , '$card_number' , '$exp_month' , '$exp_year' , '$card_cvv')";

       if(mysqli_query($conn,$sql)){

        //    echo "<script>alert('New record insert')</script>";
        //    header('location:my-booking.php');

           echo "<script>alert('Payment is successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
        
       }else{
           echo "<script>alert('not insert records')</script>";
       }
   }
}

?>
<!-- end the code of paymrnt form table -->

<body> 

    <div class="container"> 

  

        <form action="" method="post"> 

  

            <div class="row"> 

  

                <div class="col"> 

                    <h3 class="title"> 

                        Billing Address 

                    </h3> 

  

                    <div class="inputBox"> 

                        <label for="name"> 

                              Full Name: 

                          </label> 

                        <input type="text" id="FullName"   placeholder="Enter your full name"  name="name"

                           value="<?php if(isset($row['FullName'])) {
                            echo $row['FullName'];
                           } ?>" > 

                    </div> 

  

                    <div class="inputBox"> 

                        <label for="email"> 

                              Email: 

                          </label> 

                        <input type="text" id="EmailId"  name="email"

                               placeholder="Enter email address" 
                               value="<?php if(isset($row['EmailId'])) {
                            echo $row['EmailId'];
                           } ?>"
                                > 

                    </div> 

  

                    <div class="inputBox"> 

                        <label for="address"> 

                              Address: 

                          </label> 

                        <input type="text" id="Address" name="address"

                               placeholder="Enter address" 
                               value="<?php if(isset($row['Address'])) {
                            echo $row['Address'];
                           } ?>"
                               > 

                    </div> 

  

                    <div class="inputBox"> 

                        <label for="city"> 

                              City: 

                          </label> 

                        <input type="text" id="City" name="city"

                               placeholder="Enter city" 
                               value="<?php if(isset($row['City'])) {
                            echo $row['City'];
                           } ?>"
                               > 

                    </div> 

  

                    <div class="flex"> 

  

                        <div class="inputBox"> 

                            <label for="state"> 

                            Country: 

                              </label> 

                            <input type="text" id="Country" name="country"

                                   placeholder="Enter Country" 
                                   value="<?php if(isset($row['Country'])) {
                            echo $row['Country'];
                           } ?>"
                                   > 

                        </div> 

  

                        <div class="inputBox"> 

                            <label for="zip"> 

                                  Zip Code: 

                              </label> 

                            <input type="number" id="zip" name="zip_code"

                                   placeholder="123 456" 

                                   > 

                        </div> 

  

                    </div> 

                    <div class="inputBox"> 

        
                    <label for="amount"> 

                     amount: 

                    </label> 

                   <input type="text" id="amount" name="amount" style="width: 200px;"
                   
   
                   value="<?php if(isset($row['totaldays'])) {
                            echo $row['totaldays']*$row['PricePerDay'];
                           } ?>"
readonly
                   > 

                </div> 


                </div> 

                <div class="col"> 

                    <h3 class="title" >Payment</h3> 

  

                    <div class="inputBox"> 

                        <label for="name"> 

                              Card Accepted: 

                          </label> 
                          
                        <img src="credit_card_icon.jpg"  alt="credit/debit card image"> 

                    </div> 





                    <div class="inputBox"> 

                        <label for="cardName"> 

                              Name On Card: 

                          </label> 

                        <input type="text" id="cardName" name="Card_name"

                               placeholder="Enter card name" 

                               > 

                    </div> 

  

                    <div class="inputBox"> 

                        <label for="cardNum"> 

                              Credit Card Number: 

                          </label> 

                        <input type="text" id="cardNum"  name="Card_number"

                               placeholder="1111-2222-3333-4444" 

                               maxlength="19" > 

                    </div> 

  

                    <div class="inputBox"> 

                        <label for="">Exp Month:</label> 

                        <select name="Exp_month" id=""> 

                            <option value="">Choose month</option> 

                            <option value="January">January</option> 

                            <option value="February">February</option> 

                            <option value="March">March</option> 

                            <option value="April">April</option> 

                            <option value="May">May</option> 

                            <option value="June">June</option> 

                            <option value="July">July</option> 

                            <option value="August">August</option> 

                            <option value="September">September</option> 

                            <option value="October">October</option> 

                            <option value="November">November</option> 

                            <option value="December">December</option> 

                        </select> 

                    </div> 

  

  

                    <div class="flex"> 

                        <div class="inputBox"> 

                            <label for="">Exp Year:</label> 

                            <select name="Exp_year" id=""> 

                                <option value="">Choose Year</option> 

                                <option value="2023">2023</option> 

                                <option value="2024">2024</option> 

                                <option value="2025">2025</option> 

                                <option value="2026">2026</option> 

                                <option value="2027">2027</option> 

                            </select> 

                        </div> 

  

                        <div class="inputBox"> 

                            <label for="cvv">CVV</label> 

                            <input type="number" id="cvv" name="Card_cvv"

                                   placeholder="1234" > 

                        </div> 

                    </div> 

  

                </div> 

  

            </div> 

  

            <input type="submit" value="Proceed to Checkout" name="submit"

                   class="submit_btn"> 

        </form> 

  

    </div> 

    <script type="text/javascript" src="index.js"></script> 
  <?php // After successful payment processing
header("Location: my-booking.php?payment=success");
exit();
?>
</body> 

  

</html>
<script>
    let cardNumInput =  

document.querySelector('#cardNum') 



cardNumInput.addEventListener('keyup', () => { 

let cNumber = cardNumInput.value 

cNumber = cNumber.replace(/\s/g, "") 



if (Number(cNumber)) { 

    cNumber = cNumber.match(/.{1,4}/g) 

    cNumber = cNumber.join(" ") 

    cardNumInput.value = cNumber 

} 
})
</script>
<?php } ?>


<?php

    


