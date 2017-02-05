<?php
    if(!isset($_POST['submit'])){
      header('location:../signup.html');
    }

    else{
      session_start();
      $_SESSION['company']= $_POST['company'];
      $_SESSION['address1']= $_POST['address1'];
      $_SESSION['address2']= $_POST['address2'];
      header('location:../mobile.html');
    }
?>
