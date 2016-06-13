<!DOCTYPE html>
<html>
<title>PHP Followup Script</title>
<head>
	<!-- Main style sheet -->
 	<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>

<!-- This script is the resulting page that parses the form data utilizing PHP, it connects to a remote mySQL server @ the FERI faculty in Maribor -->

<h2>Thank you for submitting data <?php echo $_POST["firstname"]; ?></h2>
<h2>We will contact you through the following E-mail address: <?php echo $_POST["email_section"]; ?></h2>
<h2>Your Issue is: <?php echo $_POST["optradio"]; ?></h2>
<br>

<h1><mark>&nbsp;- Recently Submitted Issues -&nbsp;</mark></h1>



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

$subject = $_POST['optradio']; 
$comment = $_POST['comment'];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email_section"];

mysql_select_db("rss_db") or die(mysql_error()); 
mysql_query("INSERT INTO `Yocta` VALUES ('0', '$subject', '$firstname', '$lastname', '$email', CURDATE(), '$comment')"); 


//-- Display all the most recent comments --//
$result = mysql_query("SELECT post_id, creation_date, subject, description FROM Yocta ORDER BY post_id DESC LIMIT 30");


function array_result($result)
{
    $args = array();
    while ($row = mysql_fetch_assoc($result)) {
        $args[] = $row;
    }
    return $args;
}


/**
 * Create a table from a result set
 *
 * @param array $results
 * @return string
 */
function createTable(array $results = array())
{
    if (empty($results)) {
        return '<table><tr><td>Empty Result Set</td></tr></table>';
    }

    // dynamically create the header information from the keys
    // of the result array from mysql
    $table = '<table>';
    $keys = array_keys(reset($results));
    $table.='<thead><tr>';
    foreach ($keys as $key) {
        $table.='<th><mark>&nbsp;'.$key.'&nbsp;</mark></th>';
    }
    $table.='</tr></thead>';

    // populate the main table body
    $table.='<tbody>';
    foreach ($results as $result) {
        $table.='<tr>';
        foreach ($result as $val) {
            $table.='<td><mark>&nbsp;'.$val.'&nbsp;</mark></td>';
        }
        $table.='</tr>';
    }
    $table.='</tbody></table>';
    return $table;
}


print createTable(array_result($result));

?> 

</body>
</html> 