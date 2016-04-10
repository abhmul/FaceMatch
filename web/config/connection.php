<?php
/**
 * Created by PhpStorm.
 * User: abhmul
 * Date: 4/10/16
 * Time: 3:14 PM
 */

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'napasbang');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'faceMatch_survey');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ("Connection failed: " . mysqli_connect_error() );

?>