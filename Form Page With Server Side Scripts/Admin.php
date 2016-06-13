<!DOCTYPE html>
<html>
<title>Admin Panel</title>
<head>
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>

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

mysql_select_db("rss_db") or die(mysql_error()); 
//-- Display all the most recent comments --//
$result = mysql_query("SELECT post_id, creation_date, subject, description, firstname, lastname, email FROM Yocta ORDER BY post_id DESC");


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

<h1><mark>&nbsp;- Delete Post -&nbsp;</mark></h1>
<form action="Delete.php" autocomplete="off" id="delete_form" method="post">
<input type="text" value="Post_ID" id="post_id_box" name="post_id_box">
<input type="submit" value="DELETE" id="submit">
</form>

</body>
</html> 