<?php
include "database.php";
session_start();
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
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="about.php" class="active"> About Me</a></li>
		</ul>
         		 <h3 id="heading" class="h3">About Me</h3>
			<div class="container">
				<div class="row   portal">
				<div class="text-center box col-sm-5">	
                    SE THINKS<br>
					Valayamadevi - 636121 <br>
					Attur,Salem <br>
					Mail - selvamvishnu25@gmail.com<br>
					Phone - (+91) 9751294297
		</div>
		<div class="col-sm-6">
						<?php
			 if(isset($_POST["submit"]))
			 {
			  	$sql= "insert into about(name,mail,des) values('{$_POST["name"]}','{$_POST["mail"]}','{$_POST["mes"]}')";
				$db->query($sql);
				echo "<p class='success'>Message Sended</p>";
			}
			?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data" class="form" autocomplete="off" >
					<div class="form__group">
							<input type="text" class="form__input" placeholder="Name" name="name" required>
							<label class="form__label">Name</label>
					</div>

					<div class="form__group">
						<input type="Email" class="form__input" placeholder="Mail" name="mail" required>
						<label class="form__label">Mail</label>
					</div>

					<div class="form__group">
						<textarea name="mes" class="form__input" placeholder="Message"  required></textarea>
						<label class="form__label">Description</label>
					</div>
					
					<div class="text-center">
							<button class="btn btn-success" type="submit" name="submit">Submit</button>
					</div>
			 </form>

			</div>
			</div>
			</div> <br>
	   	  <?php include "footer.php"; ?>
  </body>
</html>