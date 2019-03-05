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

    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet"/>

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
                <li>
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
                <li class="active">
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
                            <div class="header">
                                <a href='<?php echo base_url('index.php/view/data?')."id=$_GET[id]";?>&todo=view'><button class="btn btn-warning pull-right">Back</button></a>
                                <h4 class="title">Edit KK</h4>
                            </div>
                            <div class="content">
                                <?php echo form_open("crud/data?todo=$_GET[todo]&id=$_GET[id]&who=$_GET[who]&ida=$_GET[ida]");?>

                                    <h4 class="title">Data Pribadi KK</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="<?php echo $user['nama']; ?>" class="form-control border-input" placeholder="Nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Usia</label>
                                                <input type="text" name="umur" value="<?php echo $user['umur']; ?>" class="form-control border-input" placeholder="Usia" onkeypress="return number(event);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control border-input" name="jk">
                                                <option value='0' <?php if($user['jk'] == 0) echo "selected" ?>>Perempuan</option>
                                                <option value='1' <?php if($user['jk'] == 1) echo "selected" ?>>Laki-Laki</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Hubungan</label>
                                                <input id="dateborn" type="text" name="hubungan" value="<?php echo $user['hubungan']; ?>" class="form-control border-input" placeholder="Hubungan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select class="form-control border-input" name="agama">
                                                <option <?php if($user['agama'] == "Islam") echo "selected" ?> >Islam</option>
                                                <option <?php if($user['agama'] == "Protestan") echo "selected" ?> >Protestan</option>
                                                <option <?php if($user['agama'] == "Katolik") echo "selected" ?> >Katolik</option>
                                                <option <?php if($user['agama'] == "Hindu") echo "selected" ?> >Hindu</option>
                                                <option <?php if($user['agama'] == "Buddha") echo "selected" ?> >Buddha</option>
                                                <option <?php if($user['agama'] == "Konghucu") echo "selected" ?> >Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pekerjaan</label>
                                                <input type="text" name="pekerjaan" value="<?php echo $user['pekerjaan']; ?>" class="form-control border-input" placeholder="Pekerjaan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pendidikan</label>
                                                <input type="text" name="pendidikan" value="<?php echo $user['pendidikan']; ?>" class="form-control border-input" placeholder="Pendidikan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" value="<?php echo $user['keterangan']; ?>" class="form-control border-input" placeholder="Keterangan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
                                    </div>
								</form>
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

    <!--   JQUERY-UI Files   -->
    <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script>
    $( function() {
        $( "#dateborn" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datewed" ).datepicker({ dateFormat: 'yy-mm-dd' });
    } );
    function number(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
    </script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>

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

</html>