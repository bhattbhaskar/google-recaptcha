<?php

$response="";
if(isset($_REQUEST["g-recaptcha-response"])){

	$response=$_REQUEST["g-recaptcha-response"];

}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "secret=6LcgOyUTAAAAAEnhfhvkw8jhs8EfVx9E5Uymr5UX&response=".$response);

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