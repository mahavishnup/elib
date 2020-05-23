<?php
include "database.php";
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
       	<div class="col-md-3" id="navi">  <?php include "susersidebar.php"; ?> </div>
		  <div class="col-md-9">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="ulogin.php"> User</a></li>
				<li class="active"><a href="sbooks.php"> Books</a></li>
			</ul>
			<h3 id="heading" class="h3 text-center">Books</h3>

			<?php
				  $s="select * from book";
			  $re=$db ->query($s);
			 if($re->num_rows>0)
			 {?>
				<div id="example_wrapper" style="overflow-x:auto;">

				<table id="example">
				<thead>
				<tr>
				<th>#</th>
				<th>BTITLE</th>
				<th>AUTHOR</th>
				<th>KEYWORD</th>
				<th>IMAGE</th>
				<th>FILE</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th>#</th>
				<th>BTITLE</th>
				<th>AUTHOR</th>
				<th>KEYWORD</th>
				<th>IMAGE</th>
				<th>FILE</th>
				</tr>
				</tfoot>
				<tbody>
				<?php
				$i=0;
				while($row=$re->fetch_assoc())
				{
					$i++;
					echo"<tr>";
					echo	"<td>{$i}</td>";
					echo	"<td>{$row["BTITLE"]}</td>";
					echo	"<td>{$row["AUTHOR"]}</td>";
					echo	"<td>{$row["KEYWORDS"]}</td>";?>
				    <td><a href="<?php echo"{$row["IMG"]}";?>"><img src="<?php echo"{$row["IMG"]}";?>" height="60px" width="60px"></a></td><?php
					echo"<td><a href='{$row['FILE']}' target='blank>'>Download</a></td>";
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
				 echo"<p class='error'>No Books Found..</p>";
			 }
			 ?>

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
