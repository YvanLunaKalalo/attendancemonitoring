<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "attendance_monitoring";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "Connected";
}

?>