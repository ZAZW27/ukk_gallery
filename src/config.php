<?php 

$con = mysqli_connect('localhost', 'root', '', 'ukk_gallery');

if (!$con) {
    die('could not connect to gallery db').mysqli_connect_errno();
}

?>