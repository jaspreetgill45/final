<?php
$connection = mysqli_connect('localhost', 'CPSC2030', 'CPSC2030','ass9');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ass9');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
