<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <title>Dashboard Page</title>
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        
        <!-- Animation library for notifications   -->
        <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
	    
	    <style>
	        .content{
	            max-width: 450px;
	            margin: auto;
	            padding: 10px;
	            align: center;
	            filter: blur(0px);
	        }
	        table{
	            border: 1px solid #888;
	            border-left: 4px solid #4CAF50;
	            width: 50%;
	            margin: 0px auto;
	            float: none;
	        }
	        th, td{
	            padding: 4px;
	            text-align: left;
	        }
	        body{
	            background: #70e1f5;  /* fallback for old browsers */
	            background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
	            background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	        }
	    </style>
	</head>
	<body>
		<h1>Profil</h1>
		<p><?php echo "$_SESSION[mail] => $_SESSION[fnam] $_SESSION[lnam]"; ?></p>
		<a href="<?php echo base_url('index.php/login/logout');?>">Keluar</a>
		<hr>
		<a href="<?php echo base_url('index.php/dashboard'); ?>">Home</a>
		<a href="<?php echo base_url('index.php/dashboard/artikel'); ?>">Artikel</a>
		<a href="<?php echo base_url('index.php/dashboard/data'); ?>">Data Transmmigrasi</a>
		<a href="<?php echo base_url('index.php/dashboard/user'); ?>">Manajer Pengguna</a>
		<a href="<?php echo base_url('index.php/dashboard/profil'); ?>">Akun</a>
		<a href="<?php echo base_url('index.php/dashboard/sandi'); ?>">Password</a>
		<a href="<?php echo base_url('index.php/dashboard/conf'); ?>">Configure</a>

        <hr>
        <h3>Profil</h3>
        <?php echo form_open('crud/profil?todo=update&is=user');?>
            <input name="surel" value="<?php echo $user->surel; ?>" type="email" placeholder="Email" required><br>
            <input name="fnam" value="<?php echo $user->namadepan; ?>" type="text" placeholder="First Name" required><br>
            <input name="lnam" value="<?php echo $user->namabelakang; ?>" type="text" placeholder="Last Name"><br>
            <fieldset>
                <legend>Password to Save</legend>
                <input name="pass" type="password" placeholder="Password" required><br>
            </fieldset>
            <button type="submit">Simpan</button>
        </form>
	</body>
    <!--   Core JS Files   -->
    <script async src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
    <script async src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script async src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>

    <?php if($this->session->flashdata('info')){ foreach($this->session->flashdata('info') as $row) {?>
        <script async type="text/javascript">
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