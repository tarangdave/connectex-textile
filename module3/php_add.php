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
    $sql1 = "SELECT id FROM user WHERE mobile = '$b'";    
    $result1 = $mysqli->query($sql1);

    $a1 = $result1->fetch_array();
    echo "$a1[id]";
    $material = $_POST['material'];
    $p = $_POST['peak'];
    $r = $_POST['reed'];
    $w = $_POST['weight'];
    $wid = $_POST['width'];
    $pri = $_POST['price'];

    $sql2 = "INSERT INTO `request` (`id`, `user_id`, `material_id`, `material_width`, `material_weight`, `price`, `peak`, `fani`, `limits`, `created_date`) VALUES (NULL, '$a1[id]', '$material', '$wid', '$w', '$pri', '$p', '$r', '1', CURRENT_TIMESTAMP)"; 

    $result = $mysqli-> query($sql2);
    if($result == true){
    	header('location:ocurrentSale.php');
    }
    else{
    	?><script type="text/javascript">alert("Retry Again");</script><?php
    	//header('location:../profile.php');
    }
    ?>

