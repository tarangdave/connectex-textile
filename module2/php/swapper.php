<?php
   // function swap()
    {
        require_once("db_const.php");
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($mysqli->connect_errno){
            echo "<p> My SQL error</p>";
            exit();
        }
        $total_pages = $mysqli->query("SELECT count(*) as tot FROM material WHERE trending = '1'");
        $result = $total_pages->fetch_array();
        $total = $result['tot'];
        $pages = ceil($total/11);
        //echo "$pages";
        
    }

?>
