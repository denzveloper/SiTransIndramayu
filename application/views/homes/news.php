<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>News Transmigrasi</title>

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

  </head>
<!-- NAVBAR
================================================== -->
  <body>
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href="#">Si TRANS</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
				<li><a href="<?php echo base_url('index.php/register');?>">Register</a></li>
				<li class="active"><a href="#">News</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-left"><a href="<?php echo base_url('index.php/login'); ?>">Login</a></li>
			</ul>
		</div>
		</nav>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

	<?php
	if($news){foreach($news as $u){ 
	?>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="featurette-image img-responsive center-block" src="<?php echo $this->image->show($u['image']); ?>" alt="...">
          <h3><?php echo $u['judul']; ?></h3>
          <p><i><?php echo $u['timedate']; ?></i></p>
        </div>
        <div class="col-lg-8">
          <p><?php echo $u['konten']; ?></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	  <hr>
	  <?php }}?>

	  <div class="row">
        <div class="col-lg-12 text-center">
		<?php 
			echo $this->pagination->create_links();
		?>
		</div>
	</div>

  </div><!-- /.container -->

    <!-- FOOTER -->
    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2018 - <script>document.write(new Date().getFullYear())</script></p>
      </div>
    </footer>
  </body>
      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
</html>