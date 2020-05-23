<?php
session_start();
include "database.php";
?>
<!DOCTYPE HTML>
<html>
  <head>
	 <style>i:hover{color:black;}</style>
	<?php include "head.php";
	include "primary.php";
	?>
  </head>
  <body>
  <?php include "sidebar.php"; ?>
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li class="active"><a href="ulogin.php"> User Login</a></li>
			</ul>
  	   		 <h3 id="heading" class="h3">User Portal</h3>
			   <?php
			  if(isset($_POST["submit"]))
			  {
				  $sql="select * from student where name='{$_POST["name"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  {
					  $row=$res->fetch_assoc();
					  if(password_verify($_POST['pass'],$row['PASS'])){
						$_SESSION["ID"]=$row["ID"];
						$_SESSION["NAME"]=$row["NAME"];
				 header("location:uhome.php"); 
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
			  			<div class="row">
			<div class="col-md-12">
			 <form action="ulogin.php" method="post" class="form  portal" autocomplete="off" >
					<div class="form__group">
							<input type="text" class="form__input" placeholder="User Name" name="name" required>
							<label class="form__label">User Name</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="User Password" name="pass" required>
						<label class="form__label">User Password</label>
					</div>
					
					<div class="text-center">
						<button class="btn btn-success" type="submit" name="submit">login Now</button>						
						<a href="suhome.php" class="btn btn-info">SKIP</a>	
						<a href="new.php"><i class="btn btn-warning">New Registration..</i></a>
					</div>
			 </form>
			 </div> </div> </div><br>
</body>
</html>