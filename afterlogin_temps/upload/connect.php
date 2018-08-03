<?php
$connection = mysqli_connect('localhost', 'CPSC2030', 'CPSC2030','outside_resto');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'outside_resto');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
