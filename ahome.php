<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
	$res=$db->query($sql);
	return $res->num_rows;
}
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
        <?php include "sidebar.php";?>		
		<?php include "primary.php";?>
  <div class="container">
    <div class="row">
	 <div class="col-md-3" id="navi"> <?php include "adminsidebar.php";  ?>  </div> 
	 <div class="col-md-9">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="alogin.php"> Admin</a></li>
				<li class="active"><a href="ahome.php"> Dashboard</a></li>
			</ul>
	       	 <h3 id="heading" class="h3">Welcome Admin</h3>
			 <div class="record text-center">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat bg-primary" href="#">
						<span class="number counter"><?php echo countRecord("select * from student",$db);?></span>
						<span class="name">Total Students</span>
						<span class="bg-icon"><i class="fa fa-users"></i></span>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat bg-danger" href="#">
						<span class="number counter"><?php echo countRecord("select * from book",$db);?></span>
						<span class="name">Total Books</span>
						<span class="bg-icon"><i class="fa fa-book"></i></span>
					</a>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat bg-success" href="#">
						<span class="number counter"><?php echo countRecord("select * from request",$db);?></span>
						<span class="name">Total Requests</span>
						<span class="bg-icon"><i class="fa fa-bank"></i></span>
					</a>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat bg-info" href="#">
							<span class="number counter"><?php echo countRecord("select * from comment",$db);?></span>
						<span class="name">Total Comments</span>
						<span class="bg-icon"><i class="fa fa-file-text"></i></span>
					</a>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat bg-warning" href="#">
						<span class="number counter"><?php echo countRecord("select * from about",$db);?></span>
						<span class="name">Total Abouts</span>
						<span class="bg-icon"><i class="fa fa-envelope"></i></span>
					</a>
				</div>

			</div>
</div>
			 </div>
		</div>           
	 </div>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to Online Library Management System!");

            });
        </script>
	 <br>	 
	   <?php include "footer.php"; ?>
</body>
</html>