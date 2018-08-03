<?php

   require_once 'sqlhelper.php';
   require_once './vendor/autoload.php';  
   $loader = new Twig_Loader_Filesystem('./templates'); 

    
   $twig = new Twig_Environment($loader);
   $conn = connectToMyDatabase();

   $dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
   $phone_no = mysqli_real_escape_string($conn, $_REQUEST['phone_no']);
   $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
   $password = mysqli_real_escape_string($conn, $_REQUEST['Password']);

   $firstname = strtolower(mysqli_real_escape_string($conn, $_REQUEST['first_name']));
   $lastname = strtolower(mysqli_real_escape_string($conn, $_REQUEST['last_name']));

   $fname = substr(strtolower($firstname),0,1);

   $result = $conn->query("SELECT * FROM users");
   $num_rows = mysqli_num_rows($result);

   $number = $num_rows+1;
   $username = trim($fname).trim($lastname).trim($number);

   $sql = "INSERT INTO users(`username`, `firstname`, `lastname`, `DateOfBirth`, `phoneNo`, `email`, `passwrd`) 
            VALUES ('$username', '$firstname', '$lastname', '$dob', '$phone_no', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    $template = $twig->load('summary.twig.html');
    echo $template->render(array("firstname"=>$firstname,
                                "lastname"=>$lastname,
                                "username"=>$username,
                                "password"=>$password,
                            ));
} else {
    $template = $twig->load('error.twig.html');
    echo $template->render();
}

?>
