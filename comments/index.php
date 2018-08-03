<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<script type="text/javascript">
    
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'post_comment.php',
      data: 
      {
         user_comm:comment,
	     user_name:name
      },
      success: function (response) 
      {
	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
	    document.getElementById("comment").value="";
        document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}
</script>
        <style>
            body{
               
                color: black;
                margin: 0px;
            }
           
            #wrapper_second{
                display: flex;
            }
            form{
                width: 50%;
                padding: 5%;
            }
            #all_comments{
                width: 50%;
                padding: 5%;
                background-color: lightsteelblue;
                color:black;
            }
            #pic img{
                width:100%;
            }
            #wrapper_first{
                background-color:rgb(39, 94, 145);
            }
            #footer{
                background-color: rgb(39, 94, 145);;
            }
            h2{
                padding: 5%;
                font-size: 2em;
            }
            .comment_div{
                background-color: #ccc;
                color: white;
                text-align: center;
            }
            @media screen and (max-width: 800px) {
                body{
                    background-image:none;
                }
                #wrapper_second{
                    display: list-item;
                    padding-bottom: 2%;
                }
                form{
                    width: auto;
                }
                 #all_comments{
                     width: auto;
                 }
            }
             @media screen and (max-width: 600px) {
                body{
                    background-image:none;
                }
                #wrapper_second{
                    display: list-item;
                    padding-bottom: 2%;
                }
                form{
                    width: auto;
                }
                 #all_comments{
                     width: auto;
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
                           
                                <li><a href="../about_us/">About us</a></li>
                                <li><a href="../locations/">Locations</a></li>
                                <li><a href="../pictures/">Pictures</a></li>
                                <li><a href="./">Comments</a></li>
                                                
                     </ul>
                     
            </nav>
            </div>
            <div id="wrapper_second">
                   <form method='post' action="" onsubmit="return post();">
                      <input type="text" id="comment" placeholder="Type in your valuable review here">
                      <br>
                      <input type="text" id="username" placeholder="your email">
                      <br>
                      <input type="submit" value="Post Comment">
                  </form>

        
                <div id="all_comments">
                  <?php
                    require_once '../sqlhelper.php';


                    $connect=connectToMyDatabase();

                    $comm = mysqli_query($connect, "select name,comment,post_time from comments order by post_time desc");
                    while($row=mysqli_fetch_array($comm))
                    {
                      $name=$row['name'];
                      $comment=$row['comment'];
                      $time=$row['post_time'];
                    ?>

                    <div class="comment_div"> 
                      <p class="name">Posted By:<?php echo $name;?></p>
                      <p class="comment"><?php echo $comment;?></p>	
                      <p class="time"><?php echo $time;?></p>
                    </div>

                    <?php
                    }
                    ?>
                  </div>
            </div>
        
        
            <div id="footer">
                <h3>Copyright developed by jaspreet singh</h3>
            </div>
                  
                  
        </div>
</body>
</html>