<!DOCTYPE html>
<html>
<title>Delte Entry</title>
<head>
	<!-- Main style sheet -->
 	<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>

<!-- This script is the resulting page that parses the form data utilizing PHP, it connects to a remote mySQL server @ the FERI faculty in Maribor -->
<h1><mark>&nbsp;- Entry Deleted -&nbsp;</mark></h1>



<?php
//-- Hard coded server information (This is not optimal and unsafe and merely for demonstration purposes) --//
$servername = "164.8.250.222:3306";
$username = "rss";
$password = "t6UnUv7c";

//-- Create connection --//
$conn = mysql_connect($servername, $username, $password);

//-- Uncomment this section to display connection status --//
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";

$deleteID = $_POST["post_id_box"]; 
mysql_select_db("rss_db") or die(mysql_error()); 
mysql_query("DELETE FROM `rss_db`.`Yocta` WHERE `Yocta`. post_id = '$deleteID'");
?>

<a href="Admin.php"><mark>&nbsp;> Return to Admin Panel <&nbsp;</mark></a>

</body>
</html>