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
				<li class="active"><a href="achange-pass.php"> Change Password</a></li>
			</ul>
       		 <h3 id="heading" class="h3">Change Admin Password</h3>
						<?php
			 if(isset($_POST["submit"]))
			 {
			 $sql="select * from admin where AID='{$_SESSION["AID"]}'"; 
			 $res=$db->query($sql);
			if($res->num_rows>0)
			 {
			   $row=$res->fetch_assoc();				 
			 if(password_verify($_POST['opass'],$row['APASS'])){
				$_SESSION["AID"]=$row["AID"];
			  }
				$options=array("cost"=>4);
				$hashpassword=password_hash($_POST["npass"],PASSWORD_BCRYPT,$options);
				 $s= "update admin set APASS='".$hashpassword."' WHERE AID=".$_SESSION["AID"];
				 			 $db->query($s);
                 echo"<p class='success'>Your Password succesfully changed</p>";
			 }
			 else
			 {
				 echo"<p class='error'>Your current password is wrong</p>";
			 }
			 }
			?>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.npass.value!= document.chngpwd.cpass.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.cpass.focus();
return false;
}
return true;
}
</script>

			<form name="chngpwd" \ onSubmit="return valid();" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form  portal" autocomplete="off" >
					<div class="form__group">
							<input type="password" class="form__input" placeholder="Old Password" name="opass" required>
							<label class="form__label">Old Password</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="New Password" name="npass" required>
						<label class="form__label">New Password</label>
					</div>

					<div class="form__group">
						<input type="password" class="form__input" placeholder="Confirm Password" name="cpass" required>
						<label class="form__label">Confirm Password</label>
					</div>
					
					<div class="text-center">
							<button class="btn btn-success" type="submit" name="submit">Update Password</button>
					</div>
			 </form>
</div>
	</div>
</div>
<br>
	   <?php include "footer.php"; ?>
  </body>
</html>