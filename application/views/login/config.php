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

	<link rel="stylesheet" href="<?php echo base_url('assets/trumbowyg/dist/ui/trumbowyg.css'); ?>">
	<script src="<?php echo base_url('assets/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css'); ?>"></script>

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
                <li class="active">
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
			<?php echo form_open_multipart('crud/home?todo=home');?>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <img width="128px" src="<?php echo $this->image->show(); ?>" alt="..." id="foto" class="img-responsive img-rounded center-block"/>
                            <div class="content text-center">
                                    <h2 class="title">Si Trans</h2>
                                    <p class="description text-center">
                                    Aplikasi Transmigrasi
                                    </p>
                            </div>
                            <div class="footer">
                                <hr />
                                <p>Tambah Foto Home</p>
                                <input type="file" multiple="" name="images[]" class="form-control border-input" accept="image/gif,image/jpeg,image/png" onchange="readURL(this);">
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Gambar Home</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <?php if(!empty($user['img'])){foreach($user['img'] as $img){ ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <img src="<?php echo $this->image->show($img['img']);?>" alt="..." class="img-responsive img-rounded center-block">
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <a href="<?php echo base_url('index.php/crud/home').'?id='.$img['id']."&todo=delete";?>" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }}else{ echo "<li><div class='row'><div class='col-xs-12'><h4>EMPTY</h4></div></div></li>"; } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Home</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><i class="ti-text"></i> Judul Artikel</label>
                                                <input type="text" name="title" value="<?php echo $user['title']; ?>" class="form-control border-input" placeholder="Judul" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><i class="ti-align-justify"></i> Isi</label>
                                                <textarea id="trumbowyg" rows="10" class="form-control border-input" placeholder="Artikel" name="artikel" required><?php echo $user['content']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Perbarui</button>
                                        &nbsp;&middot;&nbsp;
                                        <button type="reset" class="btn btn-info btn-fill btn-wd">Atur Ulang</button>
                                    </div>
									</form>
									<hr>
									<div class="header">
										<h4 class="title">Sign</h4>
									</div>
									<?php echo form_open('crud/home?todo=sign');?>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
												<label><i class="ti-layout-cta-center"></i> Nama Kepala Trans</label>
                                                <input type="text" name="namf" value="<?php echo $namak; ?>" class="form-control border-input" placeholder="Nama Kepala Transmigrasi" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
												<label><i class="ti-layout-cta-btn-right"></i> NIK</label>
                                                <input type="text" name="nik" value="<?php echo $nik; ?>" class="form-control border-input" placeholder="NIK Kepala" required>
                                            </div>
                                        </div>
                                    </div>
									<div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Perbarui</button>
                                        &nbsp;&middot;&nbsp;
                                        <button type="reset" class="btn btn-info btn-fill btn-wd">Atur Ulang</button>
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


	<!--  Charts Plugin -->
	<script src="<?php echo base_url('assets/js/chartist.min.js'); ?>"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
	<!-- Import Trumbowyg -->
	<script src="<?php echo base_url('assets/trumbowyg/dist/trumbowyg.js'); ?>"></script>
	<!-- Import Trumbowyg plugins -->
	<script src="<?php echo base_url('assets/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js'); ?>"></script>
	
	<script src="<?php echo base_url('assets/trumbowyg/dist/plugins/base64/trumbowyg.base64.js'); ?>"></script>
	<script>
	$('#trumbowyg').trumbowyg({
		lang: 'id',
		btnsDef: {
			// Create a new dropdown
			image: {
				dropdown: ['insertImage', 'base64'],
				ico: 'insertImage'
			}
    	},
		btns: [
			['formatting'],
			['strong', 'em', 'del'],
			['superscript', 'subscript'],
			['foreColor', 'backColor'],
			['link'],
			['image'], // Our fresh created dropdown
			['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
			['unorderedList', 'orderedList'],
			['horizontalRule'],
			['removeformat'],
			['fullscreen']
    	]
	});

    function readURL(input) {
        $(document).ready(function(){

			$.notify({
				icon: 'ti-info',
				title: "<strong>Information</strong>",
				message: "<strong>To save image:</strong><br>Click Update button."

			},{
				type: 'info',
				placement: {
					from: "top",
					align: "center"
				},
				animate: {
					enter: 'animated bounceInDown',
					exit: 'animated bounceOutUp'
				},
				timer: 3000
			});

        });
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