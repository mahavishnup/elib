<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
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
       	<div class="col-md-3" id="navi">  <?php include "usersidebar.php"; ?> </div> 
		  <div class="col-md-9">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="ulogin.php"> User</a></li>
				<li class="active"><a href="req_book.php">Request Books</a></li>
			</ul>
       		 <h3 id="heading" class="h3">Request Book</h3>
						<?php
			 if(isset($_POST["submit"]))
			 {
			 $sql="insert into request (ID,MES,LOGS) values({$_SESSION["ID"]},'{$_POST["mess"]}',now())"; 
			 $db->query($sql);
			  echo"<p class='success'>Request Sented Admin </p>";
			
			 }
			?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form  portal" autocomplete="off" >
				   <div class="form__group">
					   <textarea class="form__input" placeholder="Message" name="mess" required></textarea>
					   <label class="form__label">Message</label>
				   </div>
				   
				   <div class="text-center">
					   <button class="btn btn-success" type="submit" name="submit">Send Message</button>
				   </div>
			</form>
  			</div>
	</div>
</div><br>
	   <?php include "footer.php"; ?>
  </body>







</html>