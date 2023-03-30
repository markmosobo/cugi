<?php
 
 require 'server/connect.php';
 $firstname=$_POST['first_name'];
 $lastname=$_POST['last_name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $password=md5($_POST['password']);



 $checkUser="SELECT * from users WHERE email='$email'";
 $checkQuery=mysqli_query($con,$checkUser);

 if(mysqli_num_rows($checkQuery)>0){

    $response['error']="002";
   $response['message']="User exist";
 }
 else
 {
    $insertQuery="INSERT INTO users(first_name,last_name,email,phone,password) VALUES('$firstname','$lastname','$email','$phone','$password')";
 $result=mysqli_query($con,$insertQuery);

 if($result){

   $response['error']="000";
   $response['message']="Register successful!";
 }
 else
 {
   $response['error']="001";
   $response['message']="Registeration failed!";
 }

 }

  
 echo json_encode($response);

?>
