
<?php
   require_once '../sqlhelper.php';
   require_once '../vendor/autoload.php';  
   $loader = new Twig_Loader_Filesystem('../afterlogin_temps'); 

    $twig = new Twig_Environment($loader);
    $conn = connectToMyDatabase();
    $username = mysqli_real_escape_string($conn, $_REQUEST['Username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['Password']);
    
   $result = $conn->query("CALL spCheck('$username','$password')");
   $num_rows = mysqli_num_rows($result);

   if($num_rows != 0){
      $table = $result->fetch_all(MYSQLI_ASSOC); 
      $template = $twig->load('index.html');
      echo $template->render(array("username"=>$username,
      "password"=>$password,
  ));

      $conn->close(); 
   }else {
    $loader = new Twig_Loader_Filesystem('../templates'); 
    $twig = new Twig_Environment($loader);
    $template = $twig->load("error.twig.html");
    echo $template->render();
   }
?>

