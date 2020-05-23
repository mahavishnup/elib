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
		<li><a href="#"> User</a></li>
		<li class="active"><a href="new.php"> New User Login</a></li>
	</ul>
         		 <h3 id="heading" class="h3">New User Portal</h3>
						<?php
			 if(isset($_POST["submit"]))
			 {
				 $options=array("cost"=>4);
				 $hashpassword=password_hash($_POST["pass"],PASSWORD_BCRYPT,$options);
				  $sql= "insert into student (name,pass,mail,dep)
				  values('{$_POST["name"]}','".$hashpassword."','{$_POST["mail"]}','{$_POST["dep"]}')";
				$db->query($sql);
				echo "<p class='success'>User Registration Success</p>";
			 }
			?>
			<div class="container">
			<div class="row">
			<div class="col-md-8 text-center">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form  portal" autocomplete="off" enctype="multipart/form-data">
					<div class="form__group">
							<input type="text" class="form__input" placeholder="Name" name="name" required>
							<label class="form__label">Name</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="Password" name="pass" required>
						<label class="form__label">Password</label>
					</div>

					<div class="form__group">
			<input type="Email" class="form__input" placeholder="Email" name="pass" required>
			<label class="form__label">Email</label>
					</div>

					<div class="form__group">
			<select name="dep" class="form__input"  required>
			<option value="">Department</option>
			<option value="IT">IT</option>
			<option value="CSE">CSE</option>
			<option value="ITI">ITI</option>
			<option value="IIT">IIT</option>
			<option value="EEE">EEE</option>
			<option value="ECE">ECE</option>
			<option value="MECH">MECH</option>
			</select>
					</div>
					
					<div class="text-center">
							<button class="btn btn-info" type="submit" name="submit">Register Now</button> &nbsp;							
							<a href="ulogin.php"><i class="btn btn-success">Already Register..</i></a>
					</div>
			 </form>
			</div></div></div><br>
	   	  <?php include "footer.php"; ?>
  </body>
</html>