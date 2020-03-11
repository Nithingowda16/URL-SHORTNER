<?php
$host = 'sql310.epizy.com';
$dbuser = 'epiz_25276881'; 
$dbpass = 'YECyNgNCQsC';
$dbname = 'epiz_25276881_nithin';
$siteurl = 'http://nith.ml';

$connect = new mysqli($host, $dbuser, $dbpass, $dbname);
if (!$connect) {
    echo '<script>alert("DATABASE NOT CONNECTED")</script>';
}
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_GET["input"])) {
    $title = generateRandomString();
    $url = $_GET['input'];
	$res = $connect->prepare("INSERT INTO links VALUES('',?,?)");
  	$res->bind_param("ss",$url,$title);
  	$res->execute();
    //$return = 'http://tempcloud.ml?link='.$siteurl."/".$title;
    $return = 'http://tempcloud.ml?link=';
    $result="<script>prompt('YOUR SHORTENED URL IS:', '".$siteurl."/".$title."');</script>"; 
    header('Location:'.$return.$result);
}
?>
