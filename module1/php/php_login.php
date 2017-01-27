<?php

    require_once("db_const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno){
      echo "<p> MySQL Error Number {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
      exit();
    }
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE mobile LIKE '{$mobile}' AND password LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    if(empty($row)){
        header('location:../../index.html');
        ?>
<script>alert("invalid....!!!!")</script>
<?php
    }
    else{
    session_start();
    $_SESSION['mobile'] = $mobile;
    header('location:../../module2/main.php');
    }
    ?>
