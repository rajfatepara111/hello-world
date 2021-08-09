<?php
session_start();

require "vendor/autoload.php";
use myPHPnotes\Microsoft\Auth;

$tenant="common";
$client_id="6e91c86a-2666-4560-8a79-18a5c204b97d";
$client_secret="hEtvLx~3Id~o.NH5_0fUhwVV67VE7PE31~";
$callback="http://localhost/microsoft_login/callback.php";
$scopes=["User.Read"];

$microsoft=new Auth($tenant,$client_id,$client_secret,$callback,$scopes);
header("location: ".$microsoft->getAuthUrl());
?>