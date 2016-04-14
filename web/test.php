<!DOCTYPE html>
<html>
<body>

<?php
include('functions/user_search.php');

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

echo "Does it work?";

$a = $_POST["email"];

$sql = "INSERT INTO users (userid, lastpicid)"
    ." VALUES ('"
    .$a
    ."', 1)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "SELECT IF ( EXISTS (SELECT lastpicid FROM users WHERE userid= '"
    .$a
    ."'), (SELECT lastpicid FROM users WHERE userid= '"
    .$a
    ."'), 0)";


$result = $conn->query($sql);
echo $sql;
//$row = mysqli_fetch_assoc($result);

while($row = mysql_fetch_assoc($result)){
    print_r($row);
}
//$num = $row[0];
//echo $num;

//if ($conn->query($sql) === TRUE) {
//    echo "Stuff might be working";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}

//$row = mysqli_fetch_assoc($result);
//$num = $row[0];
//echo $num;

?>

</body>
</html>