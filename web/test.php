<!DOCTYPE html>
<html>
<body>

<?php

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
    ."', 15)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

</body>
</html>