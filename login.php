<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$host = '127.0.0.1';
$dbuser = 'nith.ml'; 
$dbpass = '88888888';
$dbname = 'nith.ml';
$siteurl = 'https://nith.ml'; 
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if (!$conn) {
    echo '<script>alert("DATABASE NOT CONNECTED")</script>';
}
$gid = $_GET["id"];
$name = $_GET["name"];
$email = $_GET["email"];


$query = "SELECT google_id from users where google_id='".$gid."'";
$result = $conn->query($query);

if($result->num_rows > 0)
{
    $sql = "UPDATE users SET recent_login=now() WHERE google_id=".$gid;
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
else{
    $sql = "INSERT INTO users (google_id, name, email, reg_date)
    VALUES ('".$gid."', '".$name."','".$email."',now())";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}






$conn->close();
header("Location: ".$siteurl);

?>