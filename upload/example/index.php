<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Upload File Using PHP</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<p><br/></p>
	<div class="container">
		
		<?php
		$db = new PDO('mysql:host=localhost;dbname=alupload', 'root', '');
		if(isset($_POST['upload'])){
			$file = $_FILES['foto']['name'];
			$size = $_FILES["foto"]["size"];
			$type = $_FILES["foto"]["type"];
			$tmp = $_FILES['foto']['tmp_name'];
			$target = "images/".$file;
			if (!file_exists($target)) {
				if ($size <= 50000000) {
					if($type == "image/jpg" || $type == "image/png" || $type == "image/jpeg" || $type == "image/gif" ) {
						if (move_uploaded_file($tmp, $target)) {
							$stmt = $db->prepare("INSERT INTO foto (foto) VALUES (?)");
							$stmt->bindParam(1, $file);
							if($stmt->execute()){
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  Berhasil Diupload dan Disimpan dalam database (<?php echo $file ?>);
								</div>
								<?php
							} else{
								?>
								<div class="alert alert-warning alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  File belum disimpan kedalam database
								</div>
								<?php
							}
						} else {
							?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  Sorry, there was an error uploading your file.
							</div>
							<?php
						}
					} else{
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							Sorry, only JPG, JPEG, PNG & GIF files are allowed.
						</div>
						<?php
					}
				} else{
					?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						Sorry, your file is too large.
					</div>
					<?php
				}
			} else{
				?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					Sorry, file already exists.
				</div>
				<?php
			}
		}
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$foto = $_GET['foto'];
			if(unlink('images/'.$foto)){
				$stmt3 = $db->prepare("DELETE FROM foto where id = ?");
				if ($stmt3->execute(array($id))) {
					?>
					<script>location.href='index.php'</script>
					<?php
					//header('location: index.php');
				}
			}
		}
		?>
		<form method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="foto">Pilih Foto</label>
			<input type="file" id="foto" name="foto">
			<p class="help-block">Only JPG, PNG, GIF</p>
		  </div>
		  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
		</form>
		
		<p></p>
		<div class="row">
		
		<?php
		$stmt2 = $db->prepare("SELECT * FROM foto");
		if ($stmt2->execute()) {
		  while ($row = $stmt2->fetch()) {
		?>
		  <div class="col-sm-6 col-md-3">
			<div class="thumbnail">
			  <img src="images/<?php echo $row['foto'] ?>" alt="<?php echo $row['foto'] ?>" style="height:120px;">
			  <div class="caption">
				<p><a href="#" data-toggle="modal" data-target="#myModal-<?php echo $row['id'] ?>" class="btn btn-primary" role="button">View</a> <a href="?id=<?php echo $row['id'] ?>&foto=<?php echo $row['foto'] ?>" onclick="return confirm('Kamu yakin!')" class="btn btn-danger" role="button">Delete</a></p>
				<!-- Modal -->
				<div class="modal fade" id="myModal-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['id'] ?>">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel-<?php echo $row['id'] ?>"><?php echo $row['id'] ?> <?php echo $row['foto'] ?></h4>
					  </div>
					  <div class="modal-body">
						<img src="images/<?php echo $row['foto'] ?>" style="width:100%"/>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
				
			  </div>
			</div>
		  </div>
		<?php
		  }
		}
		?>
		</div>
		
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>