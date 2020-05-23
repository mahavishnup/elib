<?php
session_start();
include "database.php";
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
?>
<!DOCTYPE HTML>
<html>
  <head>
	  <?php include "head.php";?>
  </head>
  <body>
   <?php include "sidebar.php";
         include "primary.php";
   ?>
<div class="container">
   <div class="row">
       	<div class="col-md-3" id="navi">  <?php include "adminsidebar.php"; ?> </div>
		  <div class="col-md-9">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="alogin.php"> Admin</a></li>
				<li class="active"><a href="upload_books.php"> Upload Books</a></li>
			</ul>
       		 <h3 id="heading" class="h3">Upload Book</h3>
					<?php
			 if(isset($_POST["submit"]))
			 {
				$target_dir="resourse/img/";
			    $target_file1=$target_dir.basename($_FILES["ifile"]["name"]);
				   if(move_uploaded_file($_FILES["ifile"]["tmp_name"], $target_file1))

			   $target_dir="resourse/upload/";
			   $target_file=$target_dir.basename($_FILES["efile"]["name"]);
			   if(move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file))
			 {
				$sql= "insert into book (BTITLE,AUTHOR,KEYWORDS,IMG,FILE) values('{$_POST["bname"]}','{$_POST["auname"]}','{$_POST["keys"]}','{$target_file1}','{$target_file}')";
				$db->query($sql);
				echo "<p class='success'>Book Uploaded Success</p>";
			 }
			 else
			 {
				 echo"<p class='error'>Error In Upload</p>";
			 }
			 }
			?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>"method="POST" enctype="multipart/form-data" class="form  portal" autocomplete="off">
		     <div class="form__group">
	    		<input type="text" class="form__input" placeholder="Book Title" name="bname" required>
				<label class="form__label">Book Title</label>
					</div>

					<div class="form__group">
			<input type="text" class="form__input" placeholder="Author Name" name="auname" required>
			<label class="form__label">Author Name</label>
					</div>

					<div class="form__group">
			<textarea name="keys" class="form__input" placeholder="Keyword" required></textarea>
			<label class="form__label">Keyword</label>
					</div>

					<div class="form__group">
			<input type="file" class="form__input" placeholder="Image" name="ifile" required>
			<label class="form__label">Image</label>
					</div>

					<div class="form__group">
			<input type="file" class="form__input" placeholder="E-Book" name="efile" required>
			<label class="form__label">E-Book</label>
					</div>
			<div class="text-center">
			<button type="submit" name="submit" class="btn btn-success">Upload Book</button>
			</div>
			</form>
			</div>
	</div>
</div> <br>
	   <?php include "footer.php"; ?>
  </body>
</html>
