<?php
	session_start();
    if(!isset($_SESSION['mobile']))
        header('location:../index.html');
    require_once("db_const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno){
        echo "<p> My SQL error</p>";
        exit();
    }
    $b = $_SESSION['mobile'];
    $name = $_POST['editName'];
    $email = $_POST['editEmail'];
    $sql = "UPDATE user SET name = '$name', email = '$email' WHERE mobile = '$b'";
    $result = $mysqli->query($sql);
    if($result == true){
    	header('location:../oprofile.php');
    }
    else{
    	?><script type="text/javascript">alert("Retry Again");</script><?php
    	//header('location:../profile.php');
    }
    ?>

