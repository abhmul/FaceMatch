<?php
include("config/config.php"); //Add configuration file

$email = $_POST["email"];
$
$sql = "INSERT INTO users (userid, lastpicid) VALUES ('"
    .$email
    ."',1) ON DUPLICATE KEY UPDATE lastpicid = lastpicid + 1";

if ($conn->query($sql) === TRUE) {
    echo "Logged in!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql = "SELECT lastpicid FROM users WHERE userid= '"
        .$email
        ."'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$last_pic_id = $row["lastpicid"];
echo $last_pic_id;
$pic_filename = str_pad($last_pic_id, 4, "0", STR_PAD_LEFT).".jpg";


?>


<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html"  />
    <title>FaceMatch Survey</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css"/>
</head>
<body>
<div class="wrapOverall">
    <div class="header"><h2 class='siteTitle'>FaceMatch Survey</h2></div><!-- END header -->
    <div class="wrapContent">
        <div class="sideNav">
            <ul>
                <li><a href="#">Survey 1</a></li>
                <li><a href="#"><?php echo $last_pic_id ?><?php echo "Fucking hell" ?></a></li>
            </ul>
        </div><!-- END sideNav -->
        <div class="content">
            <h2>Survey Name</h2>
            <div class="entry">
                <table cellspacing="10" cellpadding="10" align="center">
                    <tr class="image_row">
                        <td class="pic">
                            <img src="images/<?php echo $pic_filename?>" alt="Mountain View" style="width:304px;height:228px;">
                        </td>
                    </tr>
                </table>
                <h3 class="qTitle">Rate the picture above? </h3>
                <form action="index.php" method="post">
                    <!--<input type="text" name="answer" size="65" /> -->
                    
                    <input type = 'hidden' name = 'pic_id' value = '<?php echo $last_pic_id?>'>
                    <input type = 'submit' name = 'Hmmmmm...' value = '1'>
                    <input type = 'submit' name = 'OK' value = '2'>
                    <input type = 'submit' name = 'Nice' value = '3'>
                    <input type = 'submit' name = 'Hot' value = '4'>
                    <input type = 'submit' name = 'Stunning' value = '5'>
                </form>
            </div><!-- END entry -->
        </div><!-- END content -->
    </div><!-- END wrapContent -->

    <div class="footer"><p><a href="admin/index.php">Admin Panel</a></p></div><!-- END footer -->
</div><!-- END wrapOverall -->
</body>
</html>
