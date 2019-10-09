<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername1 = "mydbserver.hostdude.org";
$username1 = "fylehq";
$password1 = "Ringo1";
//$password1 = "*************";
//$username1 = "root";
$tz = "330";
$allowSendMail = 1;
$whitelist = array('127.0.0.1','::1');
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	//$servername1 = "127.0.0.1";
	//$username1 = "root";
	//$password1 = "***********";
	$tz = "0";
	$allowSendMail = 0;
}
$dbname1 = "fyle";
$sessiontimeout = "1800";
$googleAPIKey = "AIzaSyCAdXhVjZxxXVDh94RVwtUo9L_Q9T5-whg";
//$rootUrl = "https://my.sauda.co";
//$con2=mysqli_connect($servername2, $username1, $password1, $dbname1);
$con=mysqli_connect($servername1, $username1, $password1, $dbname1);if (!$con) {    die('Could not connect: ' . mysqli_error());}

$_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
$ipadd = $_SERVER['REMOTE_ADDR'];
$timestamp = mysqli_fetch_assoc(mysqli_query($con, "select (NOW() + INTERVAL '$tz' MINUTE) AS time"))['time'];

