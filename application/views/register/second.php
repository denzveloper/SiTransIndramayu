<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Permintaan Transmigrasi - 1</title>
</head>
<body>
	No Pendaftaram: -
	<input name="jt" type="text" placeholder="Jenis Trans" required><br>
    <input name="ta" type="text" placeholder="Tahun Anggaran" required><br>
	<input name="prov" type="text" placeholder="Provinsi" required><br>
	<input name="kab" type="text" placeholder="Kabupaten" required><br>
	<input name="lok" type="text" placeholder="Lokasi" required><br>
</body>
<script>
    $('.ta').change(function() {
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
        var tahun = $('.ta').val();
        var prov = $(this).val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("index.php/crud/registerf?todo=update&is=gloc&loc=gkab");?>',
            data:{'th':tahun, 'pro':prov},
            success:function(data){
                $(".kab").html(data);
            }
        });
    });
    $('.kab').change(function() {
        var tahun = $('.ta').val();
        var prov = $('.prov').val();
        var kab = $(this).val();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("index.php/crud/registerf?todo=update&is=gloc&loc=gloc");?>',
            data:{'th':tahun, 'pro':prov, 'kab': kab},
            success:function(data){
                $(".loc").html(data);
            }
        });
    });
    </script>
</html>