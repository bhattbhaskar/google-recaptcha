Google Recaptcha Code Tutorial or Demo

Demo Url : http://phpdedicateddevelopers.com/demo/google-captcha/

For Integration google reCaptcha follow these steps:
Html Code:
<script src="https://www.google.com/recaptcha/api.js" async defer></script >
    <form action="response.php" method="POST" >
    <div class="g-recaptcha" data-sitekey="site-key"> </div >
    < noscript >
< div >
< div style="width: 302px; height: 422px; position: relative;" >
< div style="width: 302px; height: 422px; position: absolute;" >
< iframe src="https://www.google.com/recaptcha/api/fallback?k=site-key 
frameborder="0" scrolling="no"
style="width: 302px; height:422px; border-style: none;" >
< /iframe >
< /div >
< /div >
< div style="width: 300px; height: 60px; border-style: none;
 bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;" >
< textarea id="g-recaptcha-response" name="g-recaptcha-response"
class="g-recaptcha-response"
style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
margin: 10px 25px; padding: 0px; resize: none;" >
< /textarea >
< /div >
< /div >
< /noscript >
< br/ >
< input type="submit" value="Submit" >
< /form >
               
			   
Php Code:
<?php

$response="";
if(isset($_REQUEST["g-recaptcha-response"])){

	$response=$_REQUEST["g-recaptcha-response"];

}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "secret=YOUR-SECRET-KEY&response=".$response);

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

$server_output=json_decode($server_output,1);
if($server_output["success"]){
	echo "captcha is valid";
}else{
	echo "Captcha Is not Valid";
}

?>			   