<?php include 'config.php'; ?>
<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        echo '<script>alert("DATABASE NOT CONNECTED")</script>';
    }
	// echo 'This feature has been removed temporarily. This will made available soon :)'
    if(isset($_GET["title"])){
    	$query = "SELECT user FROM links WHERE title='".$_GET["title"]."'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $user = substr($row["user"],10,11)."9481599862".substr($row["user"],0,10)."4342039881";
        if($_GET["user"] == $user){
            $query = "DELETE FROM links WHERE title='".$_GET["title"]."'";
            $result = $conn->query($query);
            header('Location: index.php');
        }
    	echo "You cannot delete other user's shortlinks.";
    }
?>