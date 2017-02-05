<?php
   
    session_start();
    $otpno= isset($_POST['otp']) ? $_POST['otp'] : '';
    $b= $_SESSION['otp'];
    if(!empty($otpno)){
        
        if($_POST['otp'] == $b)
        {
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $role=$_SESSION['regas'];
            $company=$_SESSION['company'];
            $address1=$_SESSION['address1'];
            $address2=$_SESSION['address2'];
            $mobile=$_SESSION['mobile'];
            $otp=$_SESSION['otp'];
            $news=$_SESSION['news'];
            require_once("db_const.php");
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	       if($mysqli->connect_errno){
		      echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		      exit();
	       }
        
            $ins= "INSERT INTO user (name, email, password, otp, role, status, featured, new, registered, newslatter, company_name, address1, address2, area, mobile, device_id, created_date) VALUES ( '$name' , '$email' , '$password' , '$otp' , '$role' , '1', '0', '1', '1', '$news' , '$company' , '$address1' , '', '$address2', '$mobile' , '', CURRENT_TIMESTAMP)";
 $run= $mysqli->query($ins);
if($run == true)
{
    echo "<h1>data uploaded.</h1>";
}
            else
            {
                echo "unsuccessful";
            }
    //header('location:http://www.connectex.in');
        }
    else{
        echo "<script>alert('invalid OTP')</script>";
        header('location:otpconfirm.html');
    }
    }
?>