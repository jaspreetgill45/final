<?php
    require_once '../sqlhelper.php';
    $connect=connectToMyDatabase();

    if(isset($_POST['user_comm']) && isset($_POST['user_name']))
    {
      $comment=$_POST['user_comm'];
      $name=$_POST['user_name'];
      $insert=mysqli_query($connect, "insert into comments values('DEFAULT','$name','$comment',CURRENT_TIMESTAMP)");


      $select=mysqli_query($connect,"select name,comment,post_time from comments where name='$name' and comment='$comment'");

      if($row=mysqli_fetch_array($select))
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
    exit;
    }

?>