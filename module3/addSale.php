

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
    <title>ConnecTex | Add Sale</title>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="icon" href="../images/favicon.ico">
    <style>
       form{
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
            height: 380px;
            border-radius: 3px;
            padding: 60px 0px 40px 0;
            box-sizing: border-box;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin-left:400px;
             
        }
        #div_1_1{
            height: 218.9px;
            
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
                    
                    <div id="div_1_1">
                    <h1 id="title_h1">&nbsp;&nbsp;&nbsp;Add Sale</h1><hr>
                        <form action="php_add.php" method="post">
    
    <?php
    
        $sql = "SELECT material_name,id FROM material";
        $result = $mysqli->query($sql);
        ?>
        
    
                    <select name="material">
        <?php
        while($a = $result->fetch_array()){
            ?>
             <option value="<?php echo "$a[id]" ?>">
             <?php echo "$a[material_name]" ?></option><?php
        }?>
       
    </select>
    <br>
                        Peak:<input type="text" name="peak"><br>
                        Reed:<input type="text" name="reed"><br>
                        Weight:<input type="text" name="weight"><br>
                        Width:<input type="text" name="width"><br>
                        Price:<input type="text" name="price"><br>
                        <input type="submit" value="Add Sale">
                    </div>
                </div>
            </div>
        </div>
</form>
            
                    
          </body>
</html>

