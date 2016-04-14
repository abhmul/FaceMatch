<!DOCTYPE html>
<html>
<body>

<?php
echo "Does it work?";

$a = $_POST["email"];

$sql = "INSERT INTO users (userid, lastpicid) VALUES ($a, 10)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

</body>
</html>