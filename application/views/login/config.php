<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <title>Dashboard Page</title>
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url('assets/trumbowyg/dist/ui/trumbowyg.css'); ?>">
		<script src="<?php echo base_url('assets/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css'); ?>"></script>
        
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
		<h1>Configure</h1>
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
        <h3>Tampilan Muka</h3>
		<?php echo form_open_multipart('crud/home?todo=home');?>
            <input name="title" value="<?php echo $user['title']; ?>" type="text" placeholder="Title Page" required><br>
            <textarea id="trumbowyg" rows="30" placeholder="Artikel...." name="artikel" required><?php echo $user['content']; ?></textarea>
			<input type="file" multiple="" name="images[]"accept="image/*">
            <button type="submit">Simpan</button>
        </form>
		<?php if(!empty($user['img'])){foreach($user['img'] as $img){ ?>
				<?php echo $img['id']; ?>
                <img src="<?php echo $this->image->show($img['img']); ?>">
				<a href="<?php echo base_url('index.php/crud/home').'?id='.$img['id']."&todo=delete";?>"><button>Delete</button></a>
				<br>
        <?php }}else{ echo "NO IMAGE YET"; } ?>
		<hr>
        <h3>Sign</h3>
		<?php echo form_open('crud/home?todo=sign');?>
            <input name="namf" value="<?php echo $namak; ?>" type="text" placeholder="Nama Kepala" required><br>
			<input name="nik" value="<?php echo $nik; ?>" type="text" placeholder="NIK" required><br>
            <button type="submit">Simpan</button>
        </form>
	</body>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
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