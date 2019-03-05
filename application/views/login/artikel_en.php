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
                <li class="active">
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
                            <div class="header">
                                <a href="<?php echo base_url('index.php/dashboard/artikel');?>"><button class="btn btn-warning pull-right">Back</button></a>
                                <h4 class="title">Artikel Berita</h4>
                            </div>
                            <div class="content">
                                <?php if(isset($_GET['id']))$lnk = "$_GET[todo]&id=$_GET[id]";
                                else $lnk = "$_GET[todo]";
                                echo form_open_multipart("crud/artikel?todo=$lnk");?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><i class="ti-text"></i> Judul Artikel</label>
                                                <input type="text" name="title" value="<?php if($edit){echo $user['judul'];} ?>" class="form-control border-input" placeholder="Judul" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><i class="ti-text"></i> Gambar</label><br>
                                                <img alt="..." id="foto" class="img-responsive img-rounded center-block" height="30%"  src="<?php if($edit)echo $this->image->show("data/img/kabar/$user[sampul]");
                                                    else echo $this->image->show(""); ?>" alt="...">
                                                <p>Ubah Foto</p>
                                                <input type="file" name="foto" class="form-control border-input" accept="image/gif,image/jpeg,image/png" onchange="readURL(this);">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><i class="ti-align-justify"></i> Isi</label>
                                                <textarea id="trumbowyg" rows="10" class="form-control border-input" placeholder="Artikel" name="artikel" required><?php if($edit){echo $user['konten'];} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill btn-wd pull-right">Simpan</button>
								    </form>
                                    
                                    <?php if($edit){
                                            echo "<a href=\"".base_url("index.php/crud/artikel?todo=delete&id=")."$_GET[id]\" onclick=\"return confirm('Yakin ingin menghapus $user[judul]?')\"><button class=\"btn btn-danger btn-fill btn-wd\">Hapus</button></a>";
                                        }
                                        ?>
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
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

        }

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