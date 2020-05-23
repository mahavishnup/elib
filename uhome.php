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
       <div class="col-md-3" id="navi"> <?php include "usersidebar.php"; ?> </div>
	   <div class="col-md-9">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="ulogin.php"> User</a></li>
				<li class="active"><a href="uhome.php"> Dashboard</a></li>
			</ul> 
       <h3 id="heading" class="h3">Welcome <?php echo  $_SESSION["NAME"];?></h3>       
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner slide__size" role="listbox">
        <div class="item active">
          <img src="resourse/image/3.jpg">
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="resourse/image/4.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="resourse/image/5.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="resourse/image/4.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- /.carousel -->
  <h3 class="h3">Demo</h3>
			   <p> &nbsp;If you want to access the HULMS with the privilege of a student you are able to search and 
           request for the book you want no matter whether you are pending or returned.</p>
           <p> &nbsp;This is the most important feature of the HULMS that provides a search engine for the members in order
              to look after their favorite books based on different criteria i.e. book title, author, category, section, 
              languages as well as searching for a specific library among other libraries. </p>	 
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