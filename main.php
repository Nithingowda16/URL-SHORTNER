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
if (isset($_GET['title'])) {
    $res = $connect->prepare("SELECT * FROM links WHERE title=?");
    $res->bind_param("s", $_GET['title']);
    $res->execute();
    $goto = $res->get_result()->fetch_array();
    $g = $goto[1];
    $clicks=$goto[3] + 1;
    $echo = '<script>console.log("'.$clicks.'")</script>'; 
    echo $echo;
    $linkk = 'UPDATE links SET Clicks = '.$clicks.' WHERE title=\''.$_GET['title'].'\'';
    echo $linkk;
    $increment = $connect->prepare($linkk);
    $increment->execute();
    header("Location: $g");
}
if (isset($_POST['submit'])) {
    $title = generateRandomString();
  	if (substr($_POST['textarea'], 0, 4) != "http") {
      $url = "http://".$_POST['textarea'];
    } else {
    $url = $_POST['textarea'];
    }
	$res = $connect->prepare("INSERT INTO links VALUES('',?,?,'')");
  	$res->bind_param("ss",$url,$title);
  	$res->execute();
    echo "<script>prompt('YOUR SHORTENED URL IS:', '".$siteurl."/".$title."');</script>"; 
}
?>
