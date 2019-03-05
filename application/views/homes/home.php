<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dinas Transmigrasi</title>

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/carousel.css'); ?>" rel="stylesheet" />
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			<a class="navbar-brand" href="#">Si TRANS</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="<?php echo base_url('index.php/register');?>">Register</a></li>
				<li><a href="<?php echo base_url('index.php/news'); ?>">News</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-left"><a href="<?php echo base_url('index.php/login'); ?>">Login</a></li>
			</ul>
		</div>
		</nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
      <?php foreach($welcmsg['img'] as $img){ ?>
        <div class="item <?php if(!isset($x)){$x= 1; echo "active";}?>">
          <img class="first-slide" src="<?php echo $this->image->show($img); ?>" alt="...">
          <div class="container">
            <div class="carousel-caption">
              <h1>Dinas Tenaga Kerja</h1>
              <h2>Kabupaten Indramayu</h2>
            </div>
          </div>
        </div>
      <?php } ?>
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



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-12">
          <h3><?php echo $welcmsg['title']; ?></h3>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
          <p><?php echo $welcmsg['content']; ?></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	</div>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 - <script>document.write(new Date().getFullYear())</script></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
  </body>
</html>
