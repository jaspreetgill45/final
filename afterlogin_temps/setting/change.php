<?php

   require_once '../../sqlhelper.php';
   require_once '../../vendor/autoload.php';    
   $loader = new Twig_Loader_Filesystem('./templates'); 

    
   $twig = new Twig_Environment($loader);
   $conn = connectToMyDatabase();

   $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
   $province = mysqli_real_escape_string($conn, $_REQUEST['province']);
   $postal = mysqli_real_escape_string($conn, $_REQUEST['postal_code']);
   $emergency = mysqli_real_escape_string($conn, $_REQUEST['ephone_no']);

   $password = mysqli_real_escape_string($conn, $_REQUEST['Password']);
   $phone = mysqli_real_escape_string($conn, $_REQUEST['phone_number']);

   $uname = mysqli_real_escape_string($conn, $_REQUEST['username']);

   $sql = "UPDATE users
   SET passwrd = '$password', phoneNo = '$phone'
   WHERE username = '$uname';
   ";

    

if (mysqli_query($conn, $sql)) {
    $template = $twig->load('summary.twig.html');
    echo $template->render(array("username"=>$uname,
                                "password"=>$password,
                                "phoneNo =>$phone"
                            ));
} else {
    $template = $twig->load('error.twig.html');
    echo $template->render();
}

?>
