<?php
include('config/config.php'); //Add configuration file

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
