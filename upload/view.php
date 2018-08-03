<?php
require('connect.php');
 
$sql = "SELECT * FROM `upload`";
$result = mysqli_query($connection, $sql);
?>
<html>
<head>
	<title>File Upload Script Using PHP & MySQL</title>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function deleteItem(id) {
    if (confirm("Are you sure?")) {
        // your deletion code
        window.location.href='delete.php?id='+id;
    }
    return false;
}
</script>
 
</head>
<body>
 
<div class="container">
 
<table class="table">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Size</th>
      <th>Type</th>
      <th>Location</th>
      <th>Delete</th>
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
      <td><a href="#" onclick='deleteItem(<?php echo $r['id'] ?>)'>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
      
</div>
 
</body>
 
</html>