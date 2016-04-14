<?php
/**
 * Created by PhpStorm.
 * User: abhmul
 * Date: 4/11/16
 * Time: 2:48 PM
 */

include ('../config/connection.php');

function does_id_exist($conn, $userid) {
    $sql = "SELECT COUNT(userid) FROM users WHERE userid = {$userid}";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    return ($row[0] > 0);
}

function get_last_pic($conn, $userid) {
    $sql = "SELECT lastpicid FROM users WHERE userid= {$userid}";
    $pic_id_result = $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($pic_id_result);
    return $row[0];
}
?>