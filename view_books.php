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
				<li class="active"><a href="view_books.php"> View Books</a></li>
			</ul>
       		 <h3 id="heading" class="h3">View Book Details</h3>
<?php
			 $sql="select * from book";
			 $res=$db ->query($sql);
			 if($res->num_rows>0)
			 {?>
				<div id="example_wrapper" style="overflow-x:auto;">

				<table id="example">
				<thead>
				<tr>
				<th>&nbsp;#&nbsp;</th>
				<th>BTITLE</th>
				<th>AUTHOR</th>
				<th>KEYWORD</th>
				<th>KEYWORD</th>
				<th>IMAGE</th>
				<th>&nbsp;EDIT&nbsp;</th>
				<th>DELETE</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th>&nbsp;#&nbsp;</th>
				<th>BTITLE</th>
				<th>AUTHOR</th>
				<th>KEYWORD</th>
				<th>KEYWORD</th>
				<th>IMAGE</th>
				<th>&nbsp;EDIT&nbsp;</th>
				<th>DELETE</th>
				</tr>
				</tfoot>
				<tbody>
				<?php
				$i=0;
				while($row=$res->fetch_assoc())
				{
					$i++;
					echo"<tr>";
					echo	"<td>{$i}</td>";
					echo	"<td>{$row["BTITLE"]}</td>";
					echo"<td>{$row["AUTHOR"]}</td>";
					echo	"<td>{$row["KEYWORDS"]}</td>";?>
					<td><a href="<?php echo"{$row["IMG"]}";?>"><img src="<?php echo"{$row["IMG"]}";?>" height="60px" width="60px"></a></td><?php
					echo"<td><a href='{$row['FILE']}' target='blank>'>Download</a></td>";
					echo	"<td> <a href='view_books.php?id={$row["BID"]}#popup' class='success'>&nbsp;Edit&nbsp;</a></td>";
						echo	"<td> <a href='abd.php?id={$row["BID"]}' class='error'>&nbsp;Delete&nbsp;</a></td>";
			    	echo	"</tr>";
				}
				?>
				</tbody>
				</table>
						</div>
				<?php
			 }
			 else
			 {
				 echo"<p class='error'>No Books Record Found </p>";
			 }
			 ?>
			</div>



			<div class="popup" id="popup" style="margin-left:20rem;margin-top:15rem;">
            <div class="popup__content">
                <div class="popup__right">
                    <a href="view_books.php" class="popup__close">&times;</a>
					<h2 class="heading-secondary u-margin-bottom-small" style="color:#25b40c;">Edit Book Details</h2>
                    <div class="popup__text">
						
	<?php
	if(isset($_POST["submit"])) {
	$sql1="UPDATE book SET book.BID='{$_POST["BID"]}',BTITLE='{$_POST["BTITLE"]}', AUTHOR ='{$_POST["AUTHOR"]}',KEYWORDS = '{$_POST["KEYWORDS"]}',IMG = '{$_POST["IMG"]}',
	FILE = '{$_POST["FILE"]}'	WHERE book.BID='{$_POST["BID"]}'";
	$db ->query($sql1);
	}
	$s="SELECT * from book WHERE book.BID='{$_GET["id"]}'";
	$re=$db ->query($s);
	if($re->num_rows>0)
	{
	while($row=$re->fetch_assoc()){
	?>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" class="form" autocomplete="off">

	<div class="form__group">
	<input type="hidden" name="BID" value="<?php echo $row['BID']; ?>">
	<textarea cols="30" rows="2" type="text" name="BTITLE" value="<?php echo $row['BTITLE']; ?>" class="form__input" placeholder="BTITLE"><?php echo $row['BTITLE']; ?></textarea>
	<label class="form__label">BTITLE </label>
	</div>

	<div class="form__group">
	<textarea cols="30" rows="2" type="text" name="AUTHOR" value="<?php echo $row['AUTHOR']; ?>" class="form__input" placeholder="AUTHOR"><?php echo $row['AUTHOR']; ?></textarea>
	<label class="form__label">AUTHOR </label>
	</div>

	<div class="form__group">
	<textarea cols="30" rows="2" name="KEYWORDS" value="<?php echo $row['KEYWORDS']; ?>" class="form__input" placeholder="KEYWORDS"><?php echo $row['KEYWORDS']; ?></textarea>
	<label class="form__label">KEYWORDS </label>
	</div>

	<div class="form__group">
	<td><a href="<?php echo"{$row["IMG"]}";?>"><img src="<?php echo"{$row["IMG"]}";?>" height="60px" width="60px"></a></td>					
	<input type="file" class="form__input" value="<?php echo $row['IMG']; ?>" placeholder="Image" name="ifile" required>
	<label class="form__label">IMG </label>
	</div>

	<div class="form__group">
	<td><a href="<?php echo"{$row["FILE"]}";?>"><object data="<?php echo"{$row["FILE"]}";?>"></object></a></td>	
	<input type="file" class="form__input" name="efile" value="<?php echo $row['FILE']; ?>" placeholder="FILE" required>
	<label class="form__label">FILE</label>
	</div>

	<div class="form__group">
	<button type="submit" name="submit" class="btn">update</button>
	</div>

	</form>
	<?php
	}
	}
	?>
			        </div>
                </div>
            </div>
        </div>

	</div>
	</div>

</div>



<script src="assets/js/DataTables/datatables.min.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>

<br>
	   <?php include "footer.php"; ?>
  </body>
</html>
