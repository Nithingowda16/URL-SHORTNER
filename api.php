<?php include 'config.php'; ?>
<?php
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (isset($_POST['submit'])){
    setdb();
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
        $myObj->url = $siteurl.$title;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }
}
?>
