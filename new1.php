<?php
include "database.php";
?>
<!DOCTYPE HTML>
<html>
  <head>
	 <style>i:hover{color:black;}</style>
 <?php include "head.php";?>
  </head>
  <body>
	<?php include "sidebar.php";
	include "primary.php";	
	?>
	<ul class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="#"> Admin</a></li>
		<li class="active"><a href="new1.php"> New Admin Login</a></li>
	</ul>
         		 <h3 id="heading" class="h3">New Admin Portal</h3>
						<?php
			 if(isset($_POST["submit"]))
			 {
				 $options=array("cost"=>4);
				 $hashpassword=password_hash($_POST["apass"],PASSWORD_BCRYPT,$options);
				  $sql= "insert into admin (aname,apass)
				  values('{$_POST["aname"]}','".$hashpassword."')";
				$db->query($sql);
				echo "<p class='success'>Admin Registration Successfully.</p>";
			 }
			?>
			<div class="container">
			<div class="row">
			<div class="col-md-8 text-center">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form  portal" autocomplete="off" enctype="multipart/form-data">
					<div class="form__group">
							<input type="text" class="form__input" placeholder="Admin Name" name="aname" required>
							<label class="form__label">Admin Name</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="Admin Password" name="apass" required>
						<label class="form__label">Admin Password</label>
					</div>
					
					<div class="text-center">
							<button class="btn btn-info" type="submit" name="submit">Register Now</button> &nbsp;
					</div>
			 </form>
			</div></div></div><br>
	   	  <?php include "footer.php"; ?>
  </body>
</html>