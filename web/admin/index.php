
<?php



//$servername = "localhost";
//$username = "root";
//$password = "napasbang";
//$db = "spine";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password,$db);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$a = $_POST["1"];
//$b = $_POST["2"];
//
//$filename1 = str_pad(strval(rand(1,3869)), 4, "0", STR_PAD_LEFT).".jpg";
//$filename2 = str_pad(strval(rand(1,3869)), 4, "0", STR_PAD_LEFT).".jpg";
////$filename1 = "0001".".jpg";
////$filename2 = "0002".".jpg";
//
//
//
//$sql = "INSERT INTO a (a, b, id)"
//    ." VALUES ('"
//    .$filename1
//    ."', '"
//    .$filename2
//    ."', 0)";
//
//if ($conn->query($sql) === TRUE) {
//    $sucess = "Thanks for sharing!";
//} else {
//    $sucess = $conn->error;
//}
//
//$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FaceMatch Survey</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/main.css"/>
</head>
<body>
<div class="wrapOverall">
    <div class="header"><?php head(); ?></div><!-- END header -->
    <div class="wrapContent">
        <div class="sideNav">
            <ul>
                <li><a href="#">Survey 1</a></li>
                <li><a href="#">Survey 2</a></li>
            </ul>
        </div><!-- END sideNav -->
        <div class="content">
            <h2>Survey Name</h2>
            <div class="entry">
                <h3 class="qTitle">Question 1: </h3>
                <form action="index.php" method="post">
                    <input type="text" name="answer" size="65" />
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="questionid" value="questionid" />
                    <input type="hidden" name="submitted" value="1" />
                </form>
            </div><!-- END entry -->
        </div><!-- END content -->
    </div><!-- END wrapContent -->

    <div class="footer"><p><a href="admin/index.php">Admin Panel</a></p></div><!-- END footer -->
</div><!-- END wrapOverall -->
</body>
</html>
