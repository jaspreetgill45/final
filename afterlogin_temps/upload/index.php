
<html>
<head>
	<title>DOCS</title>
    <link rel="stylesheet" href="../styles.css" >
     <style>
            #wrapper{
                background-color: #ccc;
                color: black;
                margin: 0px;
                text-align: center;
            }
           
            h2{
                width:70%;
            }
            #pic img{
                width:100%;
                height: auto;
            }
            #wrapper_first{
                background-color:rgb(155, 201, 25);
            }
            #footer{
                background-color:rgb(155, 201, 25);
            }
            h2{
                margin: auto;
                padding: 5%;
                font-size: 1.5em;
                font-weight: lighter;
            }
            @media screen and (max-width: 800px) {
                body{
                    background-image:none;
                }
                #header h2{
                    width: auto;
                    padding-left: 5%;
                }
            }
             @media screen and (max-width: 600px) {
                body{
                    background-image:none;
                }
                #header h2{
                    width: auto;
                    padding-left: 5%;
                }
            }
        </style>
    </head>
    <body>
    <div id="wrapper">
     <div id="wrapper_first">
        <div id="header">
            <h2>Outside Resto</h2>
        </div>
        <nav class="fill">
            <ul>            
                <li><a href="../">Home</a></li>
                <li><a href="../personal_data/">Personal data</a></li>
                <li><a href="../upload/">Upload documents</a></li>
                <li><a href="../avail/">Job positioning</a></li>
                <li><a href="../setting/">Settings</a></li>
                <li><a href="../../">log out</a></li>                            
            </ul>
                 
        </nav>
        </div>
    <div class="container">
         <?php
            require('connect.php');
            if (isset($_POST['upload'])) {
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $username = mysqli_real_escape_string($connection, $_REQUEST['username']);
            $tmp_name = $_FILES['file']['tmp_name'];
            $extension = substr($name, strpos($name, '.') + 1); 
            $max_size = 1000000000000;
            }
            if(isset($name) && !empty($name)){
                if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){

                    $location = "images/";
            //        echo $username .'<br>'. $name.'<br>'.$size.'<br>'.$type.'<br>'.$location.$name;
                    if(move_uploaded_file($tmp_name, $location.$name)){
                        $query = "INSERT INTO `upload` (uname, name, size, type, location) VALUES ('$username', '$name', '$size', '$type', '$location$name')";
                            $result = mysqli_query($connection, $query);
                        echo "Helll Yeah, You can check the documents in your personal data tab";	
                    }else{
                        echo "FAIL to upload";
                    }
                }else{
                    echo "File size should not greater than 1mb";
                }
            }else{
                echo "need to select a file budddy";
            }
            ?>
          <form class="form-signin" method="POST" enctype="multipart/form-data">     
          <h2 class="form-signin-heading">Upload File</h2>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="file" id="exampleInputFile">
            <p class="help-block">Upload files that are less than 1mb of size</p>
          </div>
           <label for="username"><b>user name</b></label>
            <input type="text" placeholder="Enter user Name" name="username" required>
            <button class="btn" type="submit" name="upload">Upload</button>
          </form>
    </div>
             <div id="footer">
                <h3>Copyright developed by jaspreet singh</h3>
            </div>
        </div>
</body>
 
</html>