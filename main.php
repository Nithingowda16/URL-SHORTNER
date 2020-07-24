<?php include 'config.php'; ?>
<?php

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
	$titl=$_GET['title'];
    $query = "SELECT title from links where title='".$titl."'";
    $result = $connect->query($query);
    if($result->num_rows > 0){
        $clicks = "SELECT url,Clicks from links where title='".$titl."'";
        $result = $connect->query($clicks);
    	$rarray=$result->fetch_assoc();
    	$newClick = intval($rarray["Clicks"])+1;
        $sql = "UPDATE links SET Clicks=".$newClick." WHERE title='".$titl."'";
        $update = $connect->query($sql);
        $sql = "UPDATE links SET recent_access= now() WHERE title='".$titl."'";
    	$update = $connect->query($sql);
    	header("Location: ".$rarray["url"]);
    }
    else{
        header("Location: https://tempcloud.ml");
    }
}
if (isset($_POST['submit'])){
    $url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Ld9sQAVAAAAALDJTkbv9Ajg-6C1ZEu6CEa64uPy",
			'response' => $_POST['token'],
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success']) {
			setdb();
		} else {
			echo '<div class="alert alert-warning">
					  <strong>reCAPTCHA verification failed</strong> You are not a human.
				  </div>';
		}
}

function setdb(){
 	include 'config.php';
	$connect = new mysqli($host, $dbuser, $dbpass, $dbname);
    $title = generateRandomString();
  	if (substr($_POST['textarea'], 0, 4) != "http") {
      $url = "http://".$_POST['textarea'];
    } else {
    $url = $_POST['textarea'];
    }
    $query = "SELECT title from links where title='".$title."'";
    $result = $connect->query($query);
    if($result->num_rows > 0){
        setdb();
        die();
    }
    else{
        $sql = "INSERT INTO links (url, title, Clicks, created_at, user)
        VALUES ('".$url."', '".$title."','0',now(),'".$_POST["user"]."')";
        if ($connect->query($sql) === TRUE) {
        echo " ";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo "<script>prompt('YOUR SHORTENED URL IS:', '".$siteurl."/".$title."');</script>"; 
    }
}
?>
