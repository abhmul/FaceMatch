<?php
include("config/config.php"); //Add configuration file

//Get username and whether the user came from log in page or not
$email = $_POST["email"];
$logged_in = (int)$_POST["logged_in?"];

//An array to convert rating to score number
$rate_to_score = array(
    "Wrong Gender!" => 0,
    "Hmmmmm..." => 1,
    "OK" => 2,
    "Nice" => 3,
    "Hot" => 4,
    "Stunning" => 5
);

//An array to convert preference to number
$like_to_num = array(
    "I like Guys!" => 0,
    "I like Girls!" => 1
);

//If user did not come from log in page
if ($logged_in == 0){

    //Get the rated pictures id, its score and users preference num
    $pic_id = $_POST["pic_id"];
    $rating = $_POST["rating"];
    $likenum = $_POST["pref"];
    $score = $rate_to_score[$rating];

    //Insert the picid, score, userid, and uniqueid made of pic and user into table
    //Just change the score if there is a duplicate
    $sql = "INSERT INTO scores (picid, score, userid, uniqueid) VALUES ("
        . $pic_id
        . ", "
        . $score
        . ", '"
        . $email
        ."', '"
        .$pic_id
        .$email
        ."') ON DUPLICATE KEY UPDATE score = "
        .$score;

    //Check if query successful
    if ($conn->query($sql) === TRUE) {
//        echo "Thank You!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql = "INSERT INTO genders (picid, gender) VALUES ("
        .$pic_id
        .", NOT ("
        .$score
        ." XOR "
        .$likenum
        .")) ON DUPLICATE KEY UPDATE gender = NOT ("
        .$score
        ." XOR "
        .$likenum
        .")";

    if ($conn->query($sql) === TRUE) {
//        echo " Gender Recorded!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //Initiate correct gender so while loop runs once
    $correct_gender = 1;

    while ($correct_gender == 1) {

        $sql = "UPDATE users SET lastpicid = "
            . $pic_id
            . " + 1 WHERE userid = '"
            . $email
            . "'";

        if ($conn->query($sql) === TRUE) {
//            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $last_pic_id = $pic_id +1;
        $pic_id = $last_pic_id;

        $sql = "INSERT INTO genders (picid, gender) VALUES ("
            .$pic_id
            .", 2) ON DUPLICATE KEY UPDATE gender = gender";

        if ($conn->query($sql) === TRUE) {
//            echo " Gender Recorded!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $sql = "SELECT gender FROM genders WHERE picid= "
            .$last_pic_id;

//        echo "<br>" . $sql;

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $pic_gender = $row["gender"];
//        echo "<br>" . $pic_gender;

        if ($pic_gender == 2){
            $correct_gender = 0;
        }
        else {
            $correct_gender = (int)($likenum != $pic_gender);
//            echo "<br>" . $correct_gender;
        }
    }

//    $sql = "SELECT lastpicid FROM users WHERE userid= '"
//        .$email
//        ."'";
//
//    $result = $conn->query($sql);
//
//    $row = $result->fetch_assoc();
//    $last_pic_id = $row["lastpicid"];
//    echo $last_pic_id;
    $pic_filename = str_pad($last_pic_id, 4, "0", STR_PAD_LEFT).".png";


}
else {
    $like = $_POST["like"];
    $likenum = $like_to_num[$like];

    $sql = "INSERT INTO users (userid, lastpicid, prefer) VALUES ('"
        .$email
        ."', 1, "
        .$likenum
        .") ON DUPLICATE KEY UPDATE prefer = "
        .$likenum;

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
//    echo $last_pic_id;
    $pic_filename = str_pad($last_pic_id, 4, "0", STR_PAD_LEFT).".png";

}

?>


<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%">
<head>
    <meta http-equiv="Content-Type" content="text/html"  />
    <title>FaceMatch Survey</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css"/>
    <style type="text/css">
           h1 { font-family: Roboto; font-size: 49px;}
           h2 { font-family: Roboto; font-size: 20px;}
           h3 { font-family: Roboto; font-size: 15px;}
           body { text-align:center; }
    </style>
</head>
<body style="height: 100%">
<div class="wrapOverall" style="height: 100%">
    <div class="header">
        <h1 class='siteTitle' style = "font: 49px roboto, sans-serif;">FaceMatch Survey</h1>
        <p align = "right">Welcome <?php echo $email?>!    </p><a class = 'siteTitle' href="login.php"><p align = "right">Logout</p></a>
    </div><!-- END header -->
    <div class="wrapContent" style="height: 100%">
        <div class="content">
            <div class="entry">
                <h3></h3>
                <h3 class="qTitle" style = "padding: 0px 50px; font: 25px roboto, sans-serif;">Rate the pictures below based on the person's attractiveness. Please try to
                be as consistent as you can (for me "Nice" means I'm mildly attracted, "OK" and "Hmmm..." mean I don't find the person attractive or I find the person
                unattractive respectively).If you happen to come across a wrong gender, go ahead and click wrong gender
                 so the survey can keep track of correct genders. Right now there are about 1200 pictures on the survey
                but more will be uploaded soon. If you've been on for a while and the picture does not load, you might
                have the last picture. If any errors appear, go ahead and logout, then log back in. Come back later when
                 the new pictures have been uploaded! Thank you for your help!</h3>
                <table cellspacing="10" cellpadding="10" align="center">
                    <tr class="image_row">
                        <td class="pic">
                            <img src="images/<?php echo $pic_filename?>" alt="Mountain View" width="300" class = "widthSet">
                        </td>
                    </tr>
                </table>
                <h3 class="qTitle" style = "font: 25px roboto, sans-serif;">Rate the picture above? </h3>
                <form action="index.php" method="post">
                    <!--<input type="text" name="answer" size="65" /> -->
                    
                    <input type = 'hidden' name = 'pic_id' value = '<?php echo $last_pic_id?>'>
                    <input type = 'hidden' name = 'email' value = '<?php echo $email?>'>
                    <input type = 'hidden' name = 'pref' value = '<?php echo $likenum?>'>
                    <input type = 'hidden' name = 'logged_in?' value = "0">
                    <input type = 'submit' name = 'rating' value = 'Wrong Gender!' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                    <input type = 'submit' name = 'rating' value = 'Hmmmmm...' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                    <input type = 'submit' name = 'rating' value = 'OK' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                    <input type = 'submit' name = 'rating' value = 'Nice' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                    <input type = 'submit' name = 'rating' value = 'Hot' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                    <input type = 'submit' name = 'rating' value = 'Stunning' style = "height: 60px; width: auto; min-width: 85px; font: bold 20px roboto, sans-serif;">
                </form>
            </div><!-- END entry -->
        </div><!-- END content -->
    </div><!-- END wrapContent -->

<!--    <div class="footer"><p><a href="admin/index.php">Admin Panel</a></p></div><!-- END footer -->-->
</div><!-- END wrapOverall -->
</body>
</html>
