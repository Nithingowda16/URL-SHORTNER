<?php include 'config.php'; ?>
<?php
header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");;

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (isset($_POST['submit'])){
	if(isset($_POST['link'])){
        if(isset($_POST['user'])){
        setdb();
        }
        else{
            $myObj->error = "Please provide valid user. If no userID just provide the number 0";
            $myJSON = json_encode($myObj);
            echo $myJSON;
        }
    } 
    else{
        $myObj->error = "Please provide valid link";
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }
}

function setdb(){
 	include 'config.php';

	$connect = new mysqli($host, $dbuser, $dbpass, $dbname);
    $title = generateRandomString();
  	if (substr($_POST['link'], 0, 4) != "http") {
      $url = "http://".$_POST['link'];
    } else {
    $url = $_POST['link'];
    }
    $query = "SELECT title from links where title='".$title."'";
    $result = $connect->query($query);
    if($result->num_rows > 0){
        setdb();
        die();
    }
    else{
        $sql = "INSERT INTO links (url, title, Clicks, created_at, user)
        VALUES ('".$url."', '".$title."','0',now(),'".$_POST['user']."')";
        if ($connect->query($sql) === TRUE) {
        echo " ";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $myObj->url = $siteurl.'/'.$title;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }
}
?>
