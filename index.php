<!DOCTYPE HTML>
<html lang="en">
  <head>
    <?php include "head.php";?>
	   </head>
     <body>
<?php include "sidebar.php"; ?>
      <div class="jumbotron" style="margin-top:25px">
               <h2 class="text-center heading-primary--main">E-library</h2>
               <p class="text-center heading-primary--sub">Learn More Be Smart And Think</p>
               <div class="text-center"><a href="ulogin.php" class="btn btn--white btn--animated">Discover our Books</a></div>
      </div>
	  <div class="container">  
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
      </ol>
      <div class="carousel-inner slide__size" role="listbox">
        <div class="item active">
          <img src="resourse/image/3.jpg">
          <div class="carousel-caption">
          </div>
        </div>
        <div class  ="item">
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
        <div class="item">
          <img class="fifth-slide" src="resourse/image/4.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="sixth-slide" src="resourse/image/4.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="seveth-slide" src="resourse/image/4.jpg" alt="Second slide">
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
    </div><!-- /.carousel -->
  
  <h3 class="h3">Online</h3>
 <p>&nbsp;Much of the functioning of a library could be automatic using the available technologies. Instead of dealing with files the use of a good Database together with a correct front end would not only reduce the operating charge but also make the task of the Librarian easier. The most significant thing is that an automated system of this sort can be customized to suit the needs of the customers or users and provide good service to them. </p>
      <h3 class="h3">Target</h3>
<p>&nbsp;Aim of the project is to develop software which would automate the functioning of a library over
    a WWW, be it Internet or Intranet</p>
<h3 class="h3">Overview</h3>
<p>&nbsp;The idea of providing online automation finds its major use in the case of members of a City Library wherein they might have to go there to find to their disappointment that the book that they are looking for isn't available. The system automates all the basic tasks like keeping record of all the book usual, returns and fining etc.</p>
<h3 class="h3">Features</h3>
<p>1. Maintaining the list of the books and periodicals available in the library.<br>
2. Keeping track of issue and return of books with the fine for the defaulters.<br>
3. Enabling the users / librarian to search for the books based on author name, title etc.</p>
</div>
<?php include "footer.php";?>
</body>
</html>
