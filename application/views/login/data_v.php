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
                            <a href="<?php echo base_url('index.php/dashboard/data');?>"><button class="btn btn-warning pull-right">Back</button></a>
                                <h4 class="title">Data Transmigran</h4>
                            </div>
                            <div class="content">
                            <p>Created: <?php echo $t['date'];?></p>
                            <p>Status: <?php echo $t['brkt'];?></p>
                            <p>Terperiksa: <?php echo $t['periksa'];?></p>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Jenis Transmigrasi</td>
                                    <td><?php echo $t['jenis']?></td>
                                </tr><tr>
                                    <td>Tahun Keberangkatan</td>
                                    <td><?php echo $k['tahun']?></td>
                                </tr><tr>
                                    <td>Provinsi Tujuan</td>
                                    <td><?php echo $k['prov']?></td>
                                </tr><tr>
                                    <td>Kabupaten Tujuan</td>
                                    <td><?php echo $k['kab']?></td>
                                </tr><tr>
                                    <td>Lokasi Tujuan</td>
                                    <td><?php echo $k['lok']?></td>
                                </tr>
                                </table>
                                <div class="text-center">
                                <?php if($t['hid']){?>
                                <a href='<?php echo base_url('index.php/view/data?')."id=$_GET[id]";?>&todo=edit&who=tk'><button class="btn btn-sm btn-danger btn-icon" title="Edit"><i class="fa fa-file"></i> Edit Tujuan</button>&nbsp;</a>
                                <?php } ?>
                                </div>
                                <hr>
                                <h4 align="center">DETAIL KEPALA KELUARGA</h4>
                                <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Tanggal Kawin</th>
                                    <th>Penghasilan Kapita</th>
                                </tr>
                                <tr>
                                    <td><?php echo $t['namakk'];?></td>
                                    <td><?php echo "$t[tmp_lh], $t[tle]";?></td>
                                    <td><?php echo $t['pendidikan'];?></td>
                                    <td><?php echo $t['pekerjaan'];?></td>
                                    <td><?php echo $t['ttk'];?></td>
                                    <td><?php echo $t['pendapatan'];?></td>
                                </tr>
                                </table>
                                <br>
                                <h4>Alamat</h4>
                                <p><?php echo "$t[alamat]<br>$t[desa] - $t[kecamatan] - $t[kabupaten] - $t[provinsi]"; ?></p>
                                <br>
                                <h4>Luas Tinggal</h4>
                                <p><?php echo $t['luastinggal'];?> m<sup>2</sup></p>
                                <br>
                                <div class="text-center">
                                <?php if($t['hid']){ ?>
                                <a href='<?php echo base_url('index.php/view/data?')."id=$_GET[id]";?>&todo=edit&who=kk'><button class="btn btn-sm btn-danger btn-icon" title="Edit"><i class="fa fa-file"></i> Edit KK</button>&nbsp;</a>
                                <?php } ?>
                                </div>
                                <hr>

                                <h4 align="center">ANGGOTA KELUARGA</h4>

                                <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    if($a){foreach($a as $a){?>
                                    <tr>
                                    <td><?php echo $a['nama'];?></td>
                                    <td><?php echo $a['umur'];?></td>
                                    <td><?php if($a['jk']) echo "LAKI-LAKI";else echo "PEREMPUAN";?></td>
                                    <td><?php echo $a['hubungan'];?></td>
                                    <td><?php echo $a['agama'];?></td>
                                    <td><?php echo $a['pendidikan'];?></td>
                                    <td><?php echo $a['pekerjaan'];?></td>
                                    <td><?php echo $a['keterangan'];?></td>
                                    <td>
                                    <?php if($t['hid']){?>
                                    <a href='<?php echo base_url('index.php/view/data?')."id=$_GET[id]&ida=$a[id]";?>&todo=edit&who=ak'><button class="btn btn-sm btn-danger btn-icon" title="Edit"><i class="fa fa-file"></i></button></a>
                                    <?php }else{ echo "&middot;"; } ?>
                                    </td>
                                    </tr>
                                <?php }}?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php $idk = $_GET['id']; if($t['hid']){ ?>
                        <a href='<?php echo base_url('index.php/crud/data?')."id=$idk";?>&todo=acpt&who=kk' onclick="return confirm('Yakin ingin tandai selesai?')"><button class="btn btn-sm btn-default btn-icon" title="Tandai Selesai sehingga tidak dapat diedit"><i class="fa fa-check"></i> Tandai Selesai</button>&nbsp;</a>
                        &nbsp;&middot;&nbsp;
                        <a href='<?php echo base_url('index.php/crud/data?')."id=$idk";?>&todo=del&who=kk' onclick="return confirm('Yakin ingin Hapus?')"><button class="btn btn-sm btn-danger btn-icon" title="Hapus Data"><i class="fa fa-trash"></i> Hapus</button>&nbsp;</a>
                        <?php }else{if(!$t['berangkat']){ ?>
                        <a href='<?php echo base_url('index.php/crud/data?')."id=$idk";?>&todo=go&who=kk' onclick="return confirm('Yakin ingin tandai berangkat?')"><button class="btn btn-sm btn-info btn-icon" title="Telah berangkat"><i class="fa fa-plane"></i> Tandai Berangkat</button>&nbsp;</a>
                        &nbsp;&middot;&nbsp;
                        <?php } ?>
                        <a href='<?php echo base_url('index.php/dashboard/print?')."id=$idk";?>&todo=family' target="_blank"><button class="btn btn-sm btn-success btn-icon" title="Cetak Data"><i class="fa fa-print"></i> Cetak</button>&nbsp;</a>
                        <?php } ?>
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

</html>