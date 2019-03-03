<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard Of <?php echo $this->session->userdata("fnam");?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url('assets/css/paper-dashboard.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/demo.css" rel="stylesheet'); ?>" />

    <!--  Fonts and icons     -->
    <link href='<?php echo base_url('assets/fa/css/all.min.css');?>' rel='stylesheet' type='text/css'> 
    <link href='<?php echo base_url('assets/fonts/muli/font.css');?>' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('assets/css/themify-icons.css'); ?>" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <img  width="64px" class="img-responsive center-block" src="<?php echo $this->image->show(); ?>" alt="..."/>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url('index.php/dashboard');?>">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/artikel');?>">
                        <i class="ti-rss"></i>
                        <p>Artikel</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/data');?>">
                        <i class="ti-files"></i>
                        <p>Data Trans</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/tuju');?>">
                        <i class="ti-map-alt"></i>
                        <p>Data Tujuan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/user');?>">
                        <i class="ti-user"></i>
                        <p>User Manager</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/dashboard/conf');?>">
                        <i class="ti-paint-roller"></i>
                        <p>Configure Home</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="<?php echo base_url('index.php/dashboard/profil');?>" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
								<p><?php echo $_SESSION['nama'];?></p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Pengaturan Akun</li>
                                <li><a href="<?php echo base_url('index.php/dashboard/profil');?>">Pengguna</a></li>
                                <li><a href="<?php echo base_url('index.php/dashboard/sandi');?>">Sandi</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Log Keluar</li>
                                <li><a href="<?php echo base_url('index.php/login/logout');?>">Keluar Sesi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="text-center">
                                            <img class="align-content" width="40%" src="<?php echo $this->image->show(); ?>" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Nama Anda</p>
                                            <?php echo $_SESSION['nama'];?>
                                            <p class="category"><?php echo $_SESSION['mail']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="<?php echo base_url('index.php/dashboard/profil');?>"><i class="ti-user"></i> Edit Profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Statistik Trans Tahun Ini</h4>
                                <p class="category">Statistik Trans</p>
                            </div>
                            <div class="content">
                                <div id="chartUser" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Sedang Keluar
                                        <i class="fa fa-circle text-warning"></i> Sedang Aktif
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-time"></i> <?php echo date("H:i D,d-M-Y"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Statistik Transmigrasi Total</h4>
                                <p class="category">Jumlah Total</p>
                            </div>
                            <div class="content">
                                <div id="chartLevel" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Administrator
                                        <i class="fa fa-circle text-danger"></i> Pengguna Ponsel
                                        <i class="fa fa-circle text-warning"></i> Admin Tempat
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data informasi diatas terlampir semua user termasuk Anda
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="#">DENZVELOPER DzEN/DzEN</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url('assets/js/paper-dashboard.js'); ?>"></script>


	<!--  Charts Plugin -->
	<script src="<?php echo base_url('assets/js/chartist.min.js'); ?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>

    <?php if($this->session->flashdata('info')){ foreach($this->session->flashdata('info') as $row) {?>
    <script type="text/javascript">
        $(document).ready(function(){

        $.notify({
            icon: "<?php echo $row['ico']; ?>",
            title: "<strong><?php echo $row['tit']; ?></strong>",
            message: "<br><?php echo $row['txt']; ?>"

            },{
                type: "<?php echo $row['typ']; ?>",
                timer: 3000
            });

        });
	</script>
    <?php } } ?>

    <script>

        new Chartist.Pie('#chartUser', {
            series: [<?php echo "$udat[jumlah], $udat[aktif]"; ?>]
        });

        new Chartist.Pie('#chartLevel', {
            series: [<?php echo "$udat[lvla], $udat[lvlb], $udat[lvlc]"; ?>]
        }, {
            donut: true
        });

    </script>


</html>