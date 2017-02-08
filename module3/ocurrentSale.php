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
    <title>Connectex | Profile</title>
       
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Favicons AND TOUCH ICONS   -->
        <link rel="icon" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/jssocials.css" />
        <link rel="stylesheet" type="text/css" href="css/jssocials-theme-plain.css" />
        <link rel="stylesheet" href="css/style.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
<style type="text/css">
    td{
           padding:5px;
           width:616px;
           margin-left: 100px;
       }
    body{
    margin: -100px 0 0 -970px;
    background-size:cover;
    }
.click{
      background:url('http://cdn2.digitalartsonline.co.uk/cmsdata/slideshow/3513552/polybreno_1500.jpg');
      background-size:contain;
      position: relative;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      border-radius: 50%;
      box-shadow: 0px 0px 0px 2pt transparent;
      border: 0px solid #FFF;
      margin: auto;
      cursor: pointer;
      width:120px;
      height:120px;
}

    .clickProfile{
    margin-left:auto;
    margin-right:auto;
    background:#191919;
    text-align:center;
    padding:20px 0px 20px 0px;
     left:50%;
    top:50%;
    width:300px;
    height:160px;
    margin-top:50px;
    }

.clickPopUp{
    position: relative;
    background: #e74c3c;
    display:block;
    opacity:1;
    width:300px;
    margin-top:20px;
    padding: 13px 0px 10px 0px;
    font-size:18px;
}

.clickPopUp a{
    font-family: 'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;
    font-weight: 700;
    text-decoration:none;
    text-transform:uppercase;
    color:#FFF;
    }

.clickPopUp h4{
    margin-top:10px;
}
.buttons{
    background:transprent;
    padding:20px;
    margin:0;
    border-top: 1px solid #891d1d;
    border-left: 0px solid #891d1d;
}
.buttons:hover{
    background:#FF7364;
    border-left: 3px solid #891d1d;
    box-shadow: inset 0px 0px 8px rgba(0,0,0,0.2);
}

#main_div{
    //border: 1px solid black; 
    position:absolute;
    width:900px;
    height:446.3px;
    left:50%;
    top:50%;
    margin-left:-290px;
    margin-top:-203px;

}

#div_1{
              margin-top:4px;
              position: relative;
              background: #ffffff;
              width:890px;
              height: 413px;
              border-radius: 5px;
              padding: 60px 0px 40px 0;
              box-sizing: border-box;
              box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
          }
#div_2{
              margin-top:5px;
              position: relative;
              background: #ffffff;
              width:890px;
              height: 180px;
              border-radius: 5px;
              padding: 60px 0px 40px 0;
              box-sizing: border-box;
              box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
          }
 #div_1_1{
            margin-top: -50px;
            margin-left: 100px;
            height: 402.9px;
            overflow-y:scroll; 
        }
</style>
</head>

<body>
    <!-- Code for Navbar begins here -->
    <div class="navbar navbar-default" role="navigation" style="margin-top: 100px;">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand tk-adelle" style="margin-left: 970px;margin-right: -300px;margin-top: -5px;"><img src="../images/apple-touch-icon.png"></a>
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
                $sql11 = "SELECT name,email FROM user WHERE mobile = '$b'";
                $result11 = $mysqli->query($sql11);
                $a11 = $result11->fetch_array();
              ?>
              
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "$a11[name]";?><b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                      <li><a href="../module3/oprofile.php">Profile</a></li>
                      <li><a href="">Preference</a></li>
                      <li class="divider"></li>
                      <li><a href="">Help</a></li>
                      <li class="divider"></li>
                      <li><a href="php/logout.php">Logout</a></li>
                  </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group" id="fs-search-container" style="margin-left: 300px;">
                    <input type="text" class="form-control typeahead" id="fs-search" placeholder="Search">
                    <a href="../module2/main.php"><span class="glyphicon glyphicon-home" style="margin-left: 370px;"></span></a>
                </div>
            </form>
          </div>
        </div>
        </div>




<div class="clickProfile">
<div class="click">

</div>
            <?php
                $sql10 = "SELECT name FROM user WHERE mobile = '$b'";
                $result10 = $mysqli->query($sql10); 
                $a10 = $result10->fetch_array();
             ?>
<div class="clickPopUp">
<h4><a class="username" href=""><?php echo "$a10[name]"; ?></a></h4>
<h5 class="buttons"><a class="username" href="oprofile.php">Profile</a></h5>
<h5 class="buttons"><a class="username" href="ocurrentSale.php">Current Sale</a></h5>
<h5 class="buttons"><a class="username" href="broker.php">Broker</a></h5>
<h5 class="buttons b"><a class="username" href="">Favorites</a></h5>

</div>
</div>
    <?php
        //for td 1 company name and area
        $sql1 = "SELECT id,company_name,area FROM user WHERE mobile = '$b'";
        $result1 = $mysqli->query($sql1); 
        $a1 = $result1->fetch_array();
        $c = $a1['id'];
        //for td 2 manufacturing items
    ?>
<div id="main_div">
    <div class="row">
                <div id="div_1" class="container">
                    
                    <div id="div_1_1">
                    <div id="div_display"><table>
                        <?php
                            require_once("db_const.php");
                            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if($mysqli->connect_errno){
                                echo "<p> My SQL error</p>";
                                exit();
                            }
                            $sql1 = "SELECT id,company_name FROM user WHERE id = '$c'";
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
                        <tr><form action="updateSale.php?mid1=<?php echo $a2['material_id'] ?>" method="post">
                            <td colspan="1"><span><?php echo "$a3[material_name]"; ?></span></td>
                            <td><span><?php echo "Rs : " ?> &nbsp; <input type="text" name="price" value="<?php echo "$a2[price]"; ?>"/></span></td>
                        <tr>
                            <td colspan="3"><span><?php echo "$a1[company_name]"; ?></span></td>
                        </tr>
                        <tr>
                            <td><span><?php echo "Peak:"?>&nbsp;<input type="text" name="peak" value="<?php echo "$a2[peak]"; ?>"></span></td>
                            <td colspan="2"><span><?php echo "Reed:"?>&nbsp;&nbsp;<input type="text" name="reed" value="<?php echo "$a2[fani]"; ?>"></span></td>
                        </tr>
                        <tr style="border-bottom-style:solid; border-color: white;border-bottom-width: 20px;">
                            <td><span><?php echo "Width:" ?><input type="text" name="width" value="<?php echo "$a2[material_width]"; ?>"></span></td>
                            <td><span><?php echo "Weight:"?><input type="text" name="weight" value="<?php echo "$a2[material_weight]"; ?>"></span></td>
                            <?php $date = substr($a2['created_date'],0,-8); ?>
                            <td><span><?php echo "$date"; ?></span></td>
                            
                        </tr>
                        <tr>
                          <td><span><input type="submit" name="update" value="Update"></span></td>
                          <td><span><input type="submit" name="delete" value="delete"></span></td>
                          </tr></form>
                        
                        <?php   
                                }
        
                            }
                        echo "</table>";
                        ?>
                        
                        </div>
                        </div>
                        <a href="addsale.php"> <input type="button" value="Add New Sale"></a>
                        </div>
<!--    &nbsp;&nbsp;Current Sale
    <div id="div_2" class="container">
        
    </div>-->
</div>
</div>
    </body>
        </html>