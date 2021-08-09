<?php
use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
use GuzzleHttp\Exception\RequestException;

try{
	session_start();
	require "vendor/autoload.php";
	$auth=new Auth(Session::get("tenant_id"), Session::get("client_id"), Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
	// echo "<pre>";
	// print_r($_REQUEST);
	// die();
	if(isset($_REQUEST['code'])){
		$tokens=$auth->getToken($_REQUEST['code']);
	}else{
		$tokens=$auth->getToken($_REQUEST['code']);
	}

	$accessToken=$tokens->access_token;

	$auth->setAccessToken($accessToken);

	$user=new User;

		echo "Name :" . $user->data->getDisplayName()."<br>";
		echo "Email : " . $user->data->getUserPrincipalName()."<br>";	
}
catch(RuntimeException $e){
	echo $e->getMessage();
}
?>