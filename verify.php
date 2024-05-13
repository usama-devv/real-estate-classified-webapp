<?php include_once "php/config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
    <h1><?php
      $v_code =  $_GET['vcode'];
      $v_email =  $_GET['vemail'];

      if(isset($v_code) && isset($v_email)){

       $query = mysqli_query($con, "SELECT * FROM user WHERE uemail ='{$v_email}' AND verification_code ='{$v_code}'");
        
       if(mysqli_num_rows($query) == 1){

      $data =  mysqli_fetch_assoc($query);

     
      if($data['verification_status'] == 0){
        //
          $update_query =  mysqli_query($con, "UPDATE user SET verification_status='1' WHERE uemail='{$v_email}'");
          if($update_query){
              echo "Thank you! now your email is verified.";
          }else{
              echo "Email is not verified!";
          }

      }else{
        echo "Your email is already verified!";
      }

       }else{
           echo "Something went wrong!";
       }
      }
    ?> </h2>
</body>
</html>