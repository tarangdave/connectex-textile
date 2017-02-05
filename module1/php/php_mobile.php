<?php  
   $mobNo= isset($_POST['mobile']) ? $_POST['mobile'] : '';
    if(!empty($mobNo)){
        
        echo "<script>alert('Set')</script>";
        $genotp= generate_otp($mobNo);
        session_start();
        $_SESSION['mobile']= $_POST['mobile'];
        $_SESSION['otp']= $genotp;
        header('location:../otpconfirm.html');
        
    }
       

    
    function generate_otp($mobile){
        $val="1234567890";
        $otp=  substr(str_shuffle($val), 0,4);
        $request =""; //initialise the request variable
        $param['method']= "sendMessage";
        $param['send_to'] = $mobile;
        $param['msg'] ="Hello. Welcome to Connectex. Your One Time Password(OTP) is $otp. \nThank You.";
        
        $param['userid'] = "2000151377";
        $param['password'] = "yITo5HSFq";
        $param['v'] = "1.1";
        $param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
        $param['auth_scheme'] = "PLAIN";
        //Have to URL encode the values
        foreach($param as $key=>$val) {
        $request.= $key."=".urlencode($val);
        //we have to urlencode the values
        $request.= "&";
        //append the ampersand (&) sign after each parameter/value pair
        }
        $request = substr($request, 0, strlen($request)-1);
        //remove final (&) sign from the request
        $url =
        "http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        //echo $curl_scraped_page;
        if (strpos($curl_scraped_page,'success') !== false) {
            
            return $otp;
        }
    }
    
    
    
    ?>