<?php
/**
 * Created by PhpStorm.
 * User: abhmul
 * Date: 4/10/16
 * Time: 3:14 PM
 */

//DEFINE ('DB_USER', 'root');
//DEFINE ('DB_PASSWORD', 'napasbang');
//DEFINE ('DB_HOST', 'mysql://bc8d51af1970c7:d9b58a52@us-cdbr-iron-east-03.cleardb.net/heroku_22bf2fadbb5295c?reconnect=true');
//DEFINE ('DB_NAME', 'faceMatch_survey');
//
//$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ("Connection failed: " . mysqli_connect_error() );

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>