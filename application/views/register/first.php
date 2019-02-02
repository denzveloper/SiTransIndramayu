<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Permintaan Transmigrasi - 1</title>
</head>
<body>
	<?php echo form_open('register/temp');?>
		<input name="jt" type="text" placeholder="Jenis Trans" required><br>
		<select name="ta" class='ta'>
			<?php if(!empty($reg)){ ?>
				<option selected="selected" disabled>Select Year</option>
				<?php foreach($reg as $hit){ ?>
					<option value="<?php echo $hit; ?>"><?php echo $hit; ?></option>
			<?php }}else{ ?> <option selected="selected" value="Empty" disabled>Tidak Ada Program Transmigrasi</option>
			<?php } ?>
		</select><br>
		<select name="prov" class="prov">
		<option selected="selected" disabled>-</option>
		</select><br>
		<select name="kab" class="kab">
		<option selected="selected" disabled>-</option>
		</select><br>
		<select name="lok" class="lok">
		<option selected="selected" disabled>-</option>
		</select>
	</form>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>

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