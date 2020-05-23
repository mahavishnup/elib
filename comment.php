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
  <?php include "head.php";
  ?>
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
				<li><a href="alogin.php"> User</a></li>
				<li><a href="books.php"> Books</a></li>
				<li class="active"><a href="comments.php"> Comments</a></li>
			</ul>
       		 <h3 id="heading" class="h3">Send Your Comment</h3>
			 <?php
			  if(isset($_POST["submit"]))
			 {
			  	$sql= "INSERT INTO comment(BID,SID,COMM,LOGS) VALUES ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["mes"]}',now())";
				$db->query($sql);
			}
			 $sql="select * from book where BID=".$_GET["id"];
			 $res=$db->query($sql);
			 if($res->num_rows>0)
			 {
				 echo"<table>";
				 $row=$res->fetch_assoc();
				 echo"<tr>
				 <th>Book Name</th>
				 <td>{$row["BTITLE"]}</td>
				 </tr>
				  <tr>
				 <th>Author</th>
				 <td>{$row["AUTHOR"]}</td>
				 </tr>
				  <th>Keyword</th>
				 <td>{$row["KEYWORDS"]}</td>
				 <tr>
				 </tr>";
				 echo"</table>";
			 }
			 else
			 {
				 echo"<p class='error'>No Record found</p>";
			 }
			 ?>
			<div id="center" class="text-center">
			 <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post" class="form  portal" autocomplete="off" >
					<div class="form__group">
							<textarea name="mes" class="form__input" placeholder="Message" required></textarea>
							<label class="form__label">Your Comment</label>
					</div>
					
					<div class="text-center">
						<button class="btn btn-success" type="submit" name="submit">Post Now</button>
					</div>
			 </form>
			</div> <br>
			<div class="text-center">
			<?php
			 $sql="select student.NAME,comment.COMM,comment.LOGS from comment inner join student on comment.SID=student.ID where comment.BID={$_GET["id"]} ORDER BY comment.CID DESC ";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
					echo"<p>
					<strong>{$row["NAME"]} :</strong>
					{$row["COMM"]}
					<i>{$row["LOGS"]}</i>
					</p>";
				}
			}
			else{
				echo"<p class='error'>No Comment Yet...</p>";
			}
			?>
			</div>
			
		
		</div>
	</div>
</div> <br>
	   <?php include "footer.php"; ?>
  
  </body>  
</html>