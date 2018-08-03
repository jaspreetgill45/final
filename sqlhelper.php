<?php

function connectToMyDatabase(){
    $user = 'CPSC2030';
    $pwd = 'CPSC2030';
    $server = 'localhost';
    $dbname = 'outside_resto';
 
    $conn = new mysqli($server, $user, $pwd, $dbname);
    return $conn;
}
function setupMyTwigEnvironment(){
    $loader = new Twig_Loader_Filesystem('./templates');
    $twig = new Twig_Environment($loader); 
    return $twig;  
}
$select_db = mysqli_select_db(connectToMyDatabase(), 'outside_resto');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>

