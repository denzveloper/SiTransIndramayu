<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Permintaan Transmigrasi - 1</title>
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
</head>
<body>
<h2 align="center">SELEKSI TRANSMIGRAN</h2>
<br>
<div class="container">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="4">
                    <h4 align="center">DATA TUJUAN CALON TRANSMIGRAN (KK)</h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container">
<table class="table table-striped">
<tbody>
<tr>
<td colspan="1">
    <?php echo form_open('register/second', 'class="well form-horizontal"');?>
        <div class="form-group">
        <label class="col-md-4 control-label">Jenis Trans</label>
        <div class="col-md-8 inputGroupContainer">
        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <input name="jt" type="text" placeholder="Jenis Trans" class="form-control" required>
        </div></div></div>
        <div class="form-group">
        <label class="col-md-4 control-label">Tahun</label>
        <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
		<select name="ta" class='ta selectpicker form-control'>
			<?php if(!empty($reg)){ ?>
				<option selected="selected" disabled>Select Year</option>
				<?php foreach($reg as $hit){ ?>
					<option value="<?php echo $hit; ?>"><?php echo $hit; ?></option>
			<?php }}else{ ?> <option selected="selected" value="Empty" disabled>Tidak Ada Program Transmigrasi</option>
			<?php } ?>
        </select>
        </div></div></div>
        <div class="form-group">
        <label class="col-md-4 control-label">Provinsi</label>
        <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
		<select name="prov" class="prov selectpicker form-control">
		<option selected="selected" disabled>-</option>
        </select>
        </div></div></div>
        <div class="form-group">
        <label class="col-md-4 control-label">Kabupaten/Kota</label>
        <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
		<select name="kab" class="kab selectpicker form-control">
		<option selected="selected" disabled>-</option>
        </select>
        </div></div></div>
        <div class="form-group">
        <label class="col-md-4 control-label">Lokasi</label>
        <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-map-marker"></i></span>
		<select name="lok" class="lok selectpicker form-control">
		<option selected="selected" disabled>-</option>
        </select>
        </div></div></div>
        <button name="btn-login" type="submit" class="btn btn-default">Lanjut</button>
	</form>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
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

<script>
    $('.ta').change(function() {
		var option = '<option selected="selected" disabled>-</option>';
		$(".lok").html(option);
		$(".kab").html(option);
		$(".prov").html(option);
        var tahun = $(this).val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("index.php/crud/registerf?todo=update&is=gloc&loc=gpro");?>',
            data:{'th':tahun},
            success:function(data){
                $(".prov").html(data);
            }
        });
    });
    $('.prov').change(function() {
		var option = '<option selected="selected" disabled>-</option>';
		$(".lok").html(option);
		$(".kab").html(option);
        var tahun = $(this).val();
        var tahun = $('.ta').val();
        var prov = $(this).val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("index.php/crud/registerf?todo=update&is=gloc&loc=gkab");?>',
            data:{'th':tahun, 'pr':prov},
            success:function(data){
                $(".kab").html(data);
            }
        });
    });
    $('.kab').change(function() {
		var option = '<option selected="selected" disabled>-</option>';
		$(".lok").html(option);
        var tahun = $('.ta').val();
        var prov = $('.prov').val();
        var kab = $(this).val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("index.php/crud/registerf?todo=update&is=gloc&loc=gloc");?>',
            data:{'th':tahun, 'pr':prov, 'ka':kab},
            success:function(data){
                $(".lok").html(data);
            }
        });
    });
    </script>
</html>