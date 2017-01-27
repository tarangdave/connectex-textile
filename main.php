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
?>
<html>
<head>
    <title>Connectex | Home</title>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="icon" href="../images/favicon.ico">
    <style>
       td{
           padding:5px;
           width:116px;
       }
        body{
            background: #e9e9e9;
            color: #666666;
            font-family: 'RobotoDraft', 'Roboto', sans-serif;
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        #div_1{
            margin-top:5px;
            position: absolute;
            background: #ffffff;
            width:350px;
            height: 520px;
            border-radius: 3px;
            padding: 60px 0px 40px 0;
            box-sizing: border-box;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin-left:20px;
             
        }
        #div_1_1{
            height: 418.9px;
            overflow-y:scroll; 
        }
        #title_h1{
            margin: 0 0 20px;
            font-size: 18px;
            font-weight: 300;
            border-left: 5px solid #ed2553;
            margin-top:-40px;
        }
        #div_2{
            margin-top:5px;
            position: absolute;
            background: #ffffff;
            width:350px;
            height:520px;
            border-radius: 3px;
            padding: 60px 0px 40px 0;
            box-sizing: border-box;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin-left:400px;
        }
        #div_2_1{
            height: 439px;
            overflow-y: scroll; 
        }
        #title_h12{
            margin: 0 0 20px;
            font-size: 18px;
            font-weight: 300;
            border-left: 5px solid #ed2553;
            margin-top:-40px;
        }
        #div_3{
            margin-top:5px;
            position: absolute;
            background: #ffffff;
            width:350px;
            height:520px;
            border-radius: 3px;
            padding: 60px 0px 40px 0;
            box-sizing: border-box;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin-left:780px;
        }
        #title_h13{
            margin: 0 0 20px;
            font-size: 18px;
            font-weight: 300;
            border-left: 5px solid #ed2553;
            margin-top:-40px;
        }
    </style>
</head>

    <body>
    <!-- Code for Navbar begins here -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand tk-adelle" href="http://connectex.in" style="font-size: 28px;font-weight: 300;"><span><img src="../images/apple-touch-icon.png" style="margin-top:-7px;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
            
          <ul class="nav navbar-nav navbar-right">
              <li class="feature-li"></li>
              <li class="">
                  <a href="" class="glyphicon glyphicon-envelope" >
                      <span class="iconbar-unread-navbar" id="message_count">0</span>
                  </a>
              </li>
            <!-- Message Notification Center Ends here -->

            <!-- Personal Notification Center Begins here -->
              <li class="dropdown">
                  <a href="#" data-toggle="modal" data-target="#notificationModal" class="glyphicon glyphicon-bullhorn" data-toggle="dropdown" >
                      <span class="iconbar-unread-navbar" id="notification_count">0</span>
                  </a>
              </li>
              
            <!-- Personal Notification Center Ends here -->
              <?php
                $sql10 = "SELECT name FROM user WHERE mobile = '$b'";
                $result10 = $mysqli->query($sql10); 
                $a10 = $result10->fetch_array();
              ?>
              
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "$a10[name]";?><b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                      <li><a href="../module3/profile.php">Profile</a></li>
                      <li><a href="">Preference</a></li>
                      <li class="divider"></li>
                      <li><a href="">Help</a></li>
                      <li class="divider"></li>
                      <li><a href="php/logout.php">Logout</a></li>
                  </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group" id="fs-search-container">
                    <input type="text" class="form-control typeahead" id="fs-search" placeholder="Search">
                </div>
            </form>
          </div>
        </div>
        </div>
        
        
        <div class="container">
            <div class="row">    
                <div id="div_1" class="container">
                    <h1 id="title_h1">&nbsp;&nbsp;&nbsp;Featured</h1><hr><hr>
                    <div id="div_1_1">
                    
                        <?php
                            require_once("db_const.php");
                            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if($mysqli->connect_errno){
                                echo "<p> My SQL error</p>";
                                exit();
                            }
                            //$sql1 = "SELECT id,company_name FROM user WHERE featured //= '1'";
                        $sql1 = "SELECT id,company_name FROM user";    
                        $result1 = $mysqli->query($sql1);
                            while($a1 = $result1->fetch_array())
                            {
                                $sql2 = "SELECT material_id,material_width,material_weight,price,peak,fani,created_date FROM request where user_id = '$a1[id]'";
                                $result2 = $mysqli->query($sql2);
                                while($a2 = $result2->fetch_array())
                                {
                                    $sql3 = "SELECT material_name FROM material WHERE id = $a2[material_id]";
                                    $result3 = $mysqli->query($sql3);
                                    $a3 = $result3->fetch_array();
                                    
                        ?>
                        
                   <table>
                        <tr>
                            <td colspan="2"><span><?php echo "$a3[material_name]"; ?></span></td>
                            <td><span><?php echo "Rs.$a2[price]"; ?></span></td>
                         <tr>
                       <td colspan="3"><span><a href="../module3/profile.php?user_r_id=<?php echo $a1['id']; ?>"><?php echo "$a1[company_name]"; ?></a></span></td>
                             </tr>
                        <tr>
                            <td><span><?php echo "Peak:$a2[peak]"; ?></span></td>
                            <td colspan="2"><span><?php echo "Reed:$a2[fani]"; ?></span></td>
                        </tr>
                        <tr style="border-bottom-style:solid;border-bottom-width: 1px">
                            <td><span><?php echo "Width:$a2[material_width]"; ?></span></td>
                            <td><span><?php echo "Weight:$a2[material_weight]"; ?></span></td>
                            <?php $date = substr($a2['created_date'],0,-8); ?>
                            <td><span><?php echo "$date"; ?></span></td>
                       </tr>
                        <?php   
                                }
        
                            }
                        echo "</table>";
                        ?>
                        </div>
                        </div>
            
                    <div class="container" id="div_2">
                        <h1 id="title_h12">&nbsp;&nbsp;&nbsp;Trending</h1><hr>
                        <div id="div_2_1">
                        <table class="table table-hover">
                        <?php
                            require_once("db_const.php");
                            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if($mysqli->connect_errno){
                                echo "<p> My SQL error</p>";
                                exit();
                            }
                            
                            $page_total = "SELECT count(*) as tot FROM material WHERE trending = '1'";
                            $res_page_total = $mysqli->query($page_total);
                            $x = $res_page_total->fetch_array();
                            $sql = "SELECT id,material_name,material_price from material WHERE trending = '1'";
                            $result = $mysqli->query($sql);
                            while($a = $result->fetch_array())
                            {
                                echo "<td>$a[material_name]</td>";
                                echo "<td>Rs.$a[material_price]</td></tr>";
    
                            }
                        ?>
                        </table>
                        </div>
                    </div>
                    <div class="container" id="div_3">
                        <h1 id="title_h13">&nbsp;&nbsp;&nbsp;New</h1><hr>
                        <table class="table table-hover">
                        <?php
                            require_once("db_const.php");
                            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if($mysqli->connect_errno){
                                echo "<p> My SQL error</p>";
                                exit();
                            }
                            $sql4 = "SELECT material_name,material_price FROM material WHERE new = '1'";
                            $result4 = $mysqli->query($sql4);
                            while($a4 = $result4->fetch_array())
                            {
                                echo "<td>$a4[material_name]</td>";
                                echo "<td>Rs.$a4[material_price]</td></tr>";
                            }
                        ?>
                        </table>
                    </div>
                </div>
          </body>
</html>