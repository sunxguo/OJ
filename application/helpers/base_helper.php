<?php

@session_start();

/**
 * 检查用户登录状态
 * @return boolean 是否已登录
 */
function checkLogin(){
	if(isset($_SESSION['username'])){
		return true;
	} else {
		if (isset($_COOKIE["userid"])) {
			$_SESSION["userid"] = $_COOKIE["userid"];
			$_SESSION["username"] = $_COOKIE["username"];
			$_SESSION["useremail"] = $_COOKIE["useremail"];
			return true;
		}
		return false;
	}
}

/**
 * 返回错误信息数组
 */
function errorMessage($code, $message){
	return array('code'=>$code,'message'=>$message);
}

/**
 * 生成cookie数组
 * @param string $key 
 * @param string $value
 */
function createCookieArray($key, $value, $expire) {
	$cookie = array(
		'name'   => $key,
		'value'  => $value,
		'expire' => "".$expire,
		'domain' => '',
		'path'   => '/',
		'prefix' => '',
		'secure' => false,
	);
	return $cookie;
}

/**
 * http get
 * @param string $url url to get
 * @return html return
 */
function httpGet($url, $param = array(), $header = array()) {
	$paramString = "?";
	foreach ($param as $key => $value) $paramString = $paramString.$key."=".$value."&";
	if($paramString != "") $paramString[strlen($paramString) - 1] = '';

	if (count($header) == 0) {
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";   
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";   
		$header[] = "Cache-Control: max-age=0";   
		$header[] = "Connection: keep-alive";   
		$header[] = "Keep-Alive: 300";   
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";   
		$header[] = "Accept-Language: en-us,en;q=0.5";   
		$header[] = "Pragma: ";
	}
	
	//$ch = curl_init($url.$paramString);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url.$paramString);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$html = curl_exec($ch);
	curl_close($ch);
	return $html;
}

/**
 * http post
 * @param string $url url to post
 * @return html return
 */
function httpPost($url, $param = array(), $header = array()) {
	if (count($header) == 0) {
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";   
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";   
		$header[] = "Cache-Control: max-age=0";   
		$header[] = "Connection: keep-alive";   
		$header[] = "Keep-Alive: 300";   
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";   
		$header[] = "Accept-Language: en-us,en;q=0.5";   
		$header[] = "Pragma: ";
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$html = curl_exec($ch);
	curl_close($ch);
	return $html;
}

/**
 * http patch
 * @param string $url url to patch
 * @return html return
 */
function httpPatch($url, $param = array(), $header = array()) {
	if (false && count($header) == 0) {
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";   
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";   
		$header[] = "Cache-Control: max-age=0";   
		$header[] = "Connection: keep-alive";   
		$header[] = "Keep-Alive: 300";   
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";   
		$header[] = "Accept-Language: en-us,en;q=0.5";   
		$header[] = "Pragma: ";
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$html = curl_exec($ch);
	curl_close($ch);
	return $html;
}

/**
 * http delete
 * @param string $url url to patch
 * @return html return
 */
function httpDelete($url,  $header = array()) {
	if (count($header) == 0) {
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";   
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";   
		$header[] = "Cache-Control: max-age=0";   
		$header[] = "Connection: keep-alive";   
		$header[] = "Keep-Alive: 300";   
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";   
		$header[] = "Accept-Language: en-us,en;q=0.5";   
		$header[] = "Pragma: ";
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$html = curl_exec($ch);
	curl_close($ch);
	return $html;
}

?>

