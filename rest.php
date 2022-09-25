<?php
if(!isset($_GET["l"])){
	die("l not found");
}
if($_GET["l"] == "6" or $_GET["l"] == 6 or $_GET["l"] == 8 or $_GET["l"] == "8"){
	define("OTP_OAUTH_LENGTH", $_GET["l"]);
}else{
	define("OTP_OAUTH_LENGTH", 6);
}
	require_once('rfc6238.php');
	// print $secretkey;
	// $currentcode = '571427';

	// if (TokenAuth6238::verify($secretkey,$currentcode)) {
	// 	echo "Code is valid\n";
	// } else {
	// 	echo "Invalid code\n";
	// }

  // print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl($username,"nawin.com",$secretkey,'Nawin\'s CDN'));
  // print TokenAuth6238::getTokenCodeDebug($secretkey,0);
	function check($p = array("u"),$type = "post"){
		if($type == "post"){
			$b = $_POST;
		}else if($type == "get"){
			$b = $_GET;
		}else{
			$b = $_REQUEST;
		}
		$a = true;
		foreach ($p as $key => $value) {
			if(!isset($b[$value])){
				if($a == true){
					$a = false;
				}else{
					$a = false;
				}
			}else{
				if($a == false){

				}else{
					$a = true;
				}
			}
		}
		return $a;
	}
if($_GET["d"] == "checkOTP"){
	if(!check(array("s","o"),"post")){
		die("one parameter not found");
	}
		$secretkey = TokenAuth6238::generateRandomClueFromMD5(md5($_POST["s"]));
		$currentcode = $_POST["o"];
		if (TokenAuth6238::verify($secretkey,$currentcode,4)) {
			die("valid");
		} else {
			die("invalid");
		}
}
if($_GET["d"] == "checklist"){
	if(!check(array("s","a"),"post")){
		die("one or more parameter not found");
	}
	$secretkey = TokenAuth6238::generateRandomClueFromMD5(md5($_POST["s"]));
	$checkList = json_decode($_POST["a"],true);
	$a = array();
	$dvv = TokenAuth6238::verifyNext($secretkey);
	unset($dvv[0]);
	$c = array_flip($dvv);
	foreach ($checkList as $key => $value) {
		$a[$value]["type"] = TokenAuth6238::verify($secretkey,$value,4);
		$a[$value]["time"] = TokenAuth6238::verifyTime($secretkey,$value,4);
		if(isset($c[$value])){
			$a[$value]["newThanCurrent"] = true;
		}else{
			$a[$value]["newThanCurrent"] = false;
		}
		// $a[$value]["ccc"] = $c;
	}
	die(json_encode($a));
}
if($_GET["d"] == "getCurrentOTP"){
	if(!check(array("s"),"post")){
		die("one parameter not found");
	}
	$secretkey = TokenAuth6238::generateRandomClueFromMD5(md5($_POST["s"]));
	print TokenAuth6238::getTokenCodeDebug($secretkey,0);
	die();
}
if($_GET["d"] == "genQrcode"){
	if(!check(array("u","s","i"),"post")){
		die("one or more parameter not found");
	}
	$username = $_POST["u"];
	$secretkey = TokenAuth6238::generateRandomClueFromMD5(md5($_POST["s"]));
	die(base64_encode(TokenAuth6238::getBarCodeUrl($username,$secretkey,$_POST["i"])));
}