<?php
session_start();
include "database.php";
?>
<!DOCTYPE HTML>
<html>
  <head>
	 <?php include "head.php";?>
  </head>
  <body>
  <?php include "sidebar.php";?>
  <?php include "primary.php";?>
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li class="active"><a href="alogin.php"> Admin Login</a></li>
			</ul>
		 <h3 id="heading" class="h3">Admin Portal</h3>
		 <?php
			  if(isset($_POST["submit"]))
			  {
				  $sql="select * from admin where aname='{$_POST["aname"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  {
					  $row=$res->fetch_assoc();
					  if(password_verify($_POST['apass'],$row['APASS'])){
						$_SESSION["AID"]=$row["AID"];
						$_SESSION["ANAME"]=$row["ANAME"];
						echo"<script>window.open('ahome.php','_self');</script>";
					  }
					  else
					  {
						  echo"<p class='error'>Your current password is wrong</p>";
					  }
					
				  }
				  else
				  {
					  echo"<p class='error'>Your current password is wrong</p>";
				  }
			  }
			  ?>
			  <div class="container">
			 <form action="alogin.php" method="post" class="form  portal" autocomplete="off" >
					<div class="form__group">
							<input type="text" class="form__input" placeholder="Admin Name" name="aname" required>
							<label class="form__label">Admin Name</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="Admin Password" name="apass" required>
						<label class="form__label">Admin Password</label>
					</div>
					
					<div class="text-center">
							<button class="btn btn-info" type="submit" name="submit">login Now</button>
					</div>
			 </form>
			 </div>
			 <br>
	  </body>
</html>