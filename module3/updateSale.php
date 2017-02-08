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
if(isset($_POST['update']))
{
    
    $sql1 = "SELECT id FROM user WHERE mobile = '$b'";    
    $result1 = $mysqli->query($sql1);

    $a1 = $result1->fetch_array();
    echo "$a1[id]";
    $price = $_POST['price'];
    $p = $_POST['peak'];
    $r = $_POST['reed'];
    $w = $_POST['weight'];
    $wid = $_POST['width'];
    $mat_id = $_GET['mid1'];
    $sql2 = "UPDATE request SET price = '$price', peak = '$p', fani = '$r', material_width = '$wid', material_weight = '$w' WHERE user_id = '$a1[id]' AND material_id = '$mat_id'";
    $result = $mysqli->query($sql2);
    if($result == true){
     ?> <script type="text/javascript"> alert("Sale Updated Successfuly"); </script> 
    <?php
    	header('location:ocurrentSale.php');
    }
    else{
    	?><script type="text/javascript">alert("Retry Again");</script><?php
    	//header('location:../profile.php');
    }
}

if(isset($_POST['delete']))
{
    $mat_id = $_GET['mid1'];
     $sql1 = "SELECT id FROM user WHERE mobile = '$b'";    
    $result1 = $mysqli->query($sql1);
     $a1 = $result1->fetch_array();
    
    $sql2 = "DELETE FROM request WHERE user_id = '$a1[id]' AND material_id = '$mat_id'";
    $result = $mysqli->query($sql2);
    if($result == true){
        echo "<script> alert('Sale Deleted Successfuly'); </script>";
    	header('location:ocurrentSale.php');
    }
    else{
    	?><script type="text/javascript">alert("Retry Again");</script><?php
    	//header('location:../profile.php');
    }
    
}



    ?>

