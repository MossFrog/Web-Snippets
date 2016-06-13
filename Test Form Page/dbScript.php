<html>
<body>

Welcome <?php echo $_POST["firstname"]; ?><br>
Your email address is: <?php echo $_POST["email_section"]; ?>
Your Subject is: <?php echo $_POST["optradio"]; ?>

 <?php
$servername = "164.8.250.222:3306";
$username = "rss";
$password = "t6UnUv7c";

//-- Create connection --//
$conn = mysql_connect($servername, $username, $password);


//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";

$optradio=$_POST['optradio']; 
$comment=$_POST['comment'];; 

mysql_select_db("rss_db") or die(mysql_error()); 
mysql_query("INSERT INTO `Yocta` VALUES ('0', '$optradio', CURDATE(), '$comment')"); 

?> 

</body>
</html> 