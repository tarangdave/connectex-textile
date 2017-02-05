<?php
    if(!isset($_POST['submit'])){
      header('location:../signup.html');
    }

    else{
      session_start();
      $_SESSION['name']= $_POST['name'];
      $_SESSION['password']= $_POST['password'];
      $_SESSION['email']= $_POST['email'];
      $_SESSION['regas']= $_POST['regas'];
      
        if($_POST['news'] == "on")
        {
            $news = 1;
        }
        else
        { 
            $news = 0;
        }
        $_SESSION['news'] = $news;
        
      header('location:../next.html');
    }
