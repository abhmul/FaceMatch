<?php
/**
 * Created by PhpStorm.
 * User: abhmul
 * Date: 4/11/16
 * Time: 2:30 PM
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FaceMatch Survey Login</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style type="text/css">
        h1 { font-family: Roboto; font-size: 49px; }
        h2 { font-family: Roboto; font-size: 20px; }
        td { text-align:center; }
    </style>
</head>

<body align="center">
<<div class="entry">
    <h3 class="qTitle">Email: </h3>
    <form action="index.php" method="post">
        <input type="text" name="answer" size="65" />
        <input type="submit" value="Submit" name="submit" />
        <input type="hidden" name="questionid" value="questionid" />
        <input type="hidden" name="submitted" value="1" />
    </form>
</div><!-- END entry -->
</body>
</html>