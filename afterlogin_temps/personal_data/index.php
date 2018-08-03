<?php
require('../upload/connect.php');
 
$sql = "SELECT * FROM `upload`";
$result = mysqli_query($connection, $sql);
?>
<html>
<head>
	<title>Personal data</title>
    <link rel="stylesheet" href="../styles.css" >
     <style>
            #wrapper{
                background-color: white;
                color: black;
                margin: 0px;
                text-align: center;
            }
            h2{
                width:70%;
            }

            #wrapper_first{
                background-color: rgb(255, 201, 25);
            }
            #footer{
                background-color:rgb(255, 201, 25);
            }
            
         .container{
             padding: 5%;
             text-align: center;
             margin: auto;
         }
         
         
         td{
             padding: 2%;
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
                <li><a href="./">Personal data</a></li>
                <li><a href="../upload/">Upload documents</a></li>
                <li><a href="../avail/">Job positioning</a></li>
                <li><a href="../setting/">Settings</a></li>
                <li><a href="../../">log out</a></li>                            
            </ul>
                 
        </nav>
     </div>
            <div class="container">

            <table class="table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Size</th>
                  <th>Type</th>
                  <th>Location</th>
                
                </tr>
              </thead>
              <tbody>
              <?php
                while($r = mysqli_fetch_assoc($result)){
               ?>
                <tr>
                  <th scope="row"><?php echo $r['id'] ?></th>
                  <td><?php echo $r['name'] ?></td>
                  <td><?php echo $r['size'] ?></td>
                  <td><?php echo $r['type'] ?></td>
                  <td><a href="<?php echo $r['location'] ?>">View</a></td>
                  
                </tr>
            <?php
            }
            ?>
              </tbody>
            </table>

            </div>
            <div id="footer">
                <h3>Copyright developed by jaspreet singh</h3>
            </div>
    </div>
</body>
 
</html>