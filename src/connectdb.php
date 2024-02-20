<?php
$hostname = 'localhost';
$username = 'wpuser';
$userpassword = '';
$userdatabase = 'wpuser';

    $conn = mysqli_connect($hostname, $username, $userpassword, $userdatabase);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    else {
        echo 'connection successful'
    }
?>