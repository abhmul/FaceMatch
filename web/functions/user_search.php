<?php
/**
 * Created by PhpStorm.
 * User: abhmul
 * Date: 4/11/16
 * Time: 2:48 PM
 */

include ('../config/connection.php');

function does_id_exist($conn, $userid) {
    $result = mysqli_query($conn, "SELECT COUNT(userid) FROM users WHERE userid = {$userid}");
    $row = mysqli_fetch_assoc($result);
    return ($row[0] > 0);
}

function get_last_pic($conn, $userid) {
    $pic_id_result = mysqli_query($conn, "SELECT lastpicid FROM users WHERE userid= {$userid}");
    $row = mysqli_fetch_assoc($pic_id_result);
    return $row[0];
}
?>