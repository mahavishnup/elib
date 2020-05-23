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
				<li class="active"><a href="view_student.php"> View Student</a></li>
			</ul>
       		 <h3 id="heading" class="h3">View Student Details</h3>
			 <?php
			 $sql="select * from student";
			 $res=$db ->query($sql);
			 if($res->num_rows>0)
			 {?>
				<div id="example_wrapper" style="overflow-x:auto;">
		
				<table id="example">
				<thead>
				<tr>
				<th>#</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>DEPARTMENT</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<th>#</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>DEPARTMENT</th>
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
			        	   echo	"<td>{$row["NAME"]}</td>";
			         	   echo	"<td>{$row["MAIL"]}</td>";
			               echo	"<td>{$row["DEP"]}</td>";
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
				 echo"<p class='error'>No Student Record Found </p>";
			 }
			 ?>
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