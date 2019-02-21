<!DOCTYPE html>
<html>
<?php
$u = $this->session->tempdata('place');
$j = $this->session->tempdata('jet');
$k = $this->session->tempdata('kepala');
$t = $this->session->tempdata('tanggungan');
?>
<head>
    <title>Registrasi Permintaan Transmigrasi - Confirmation</title>
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
    
    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet"/>
</head>
<body>
<h2 align="center">SELEKSI TRANSMIGRAN</h2>
<br>
<br>
<h4 align="center">TUJUAN TRANSMIGRAN</h4>

<table class="table table-bordered">
<tr>
    <td>Jenis Transmigrasi</td>
    <td><?php echo $j?></td>
</tr><tr>
    <td>Tahun Keberangkatan</td>
    <td><?php echo $u['tahun']?></td>
</tr><tr>
    <td>Provinsi Tujuan</td>
    <td><?php echo $u['prov']?></td>
</tr><tr>
    <td>Kabupaten Tujuan</td>
    <td><?php echo $u['kab']?></td>
</tr><tr>
    <td>Lokasi Tujuan</td>
    <td><?php echo $u['lok']?></td>
</tr>
</table>
<br>
<h4 align="center">DETAIL KEPALA KELUARGA</h4>
<table class="table table-striped">
<tr>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>Pendidikan</th>
    <th>Luas Tanah</th>
</tr>
<tr>
    <td><?php echo $k['namakk']?></td>
    <td><?php echo $k['tl']?></td>
    <td><?php echo $k['pendidikan']?></td>
    <td><?php echo $k['luastinggal']?></td>
</tr>
</table>
<br>

<h4 align="center">ANGGOTA KELUARGA</h4>

<table class="table table-striped">
<tr>
    <th>Nama</th>
    <th>Umur</th>
    <th>Hubungan</th>
    <th>Agama</th>
</tr>
<?php
    if($t){foreach($t as $t){?>
    <tr>
    <td><?php echo $t['nama']?></td>
    <td><?php echo $t['umur']?></td>
    <td><?php echo $t['hubungan']?></td>
    <td><?php echo $t['agama']?></td>
    </tr>
<?php }}?>
</table>

<?php echo form_open('register/save', 'class="well form-horizontal"');?>
    <button name="btn-login" type="submit" class="btn btn-primary">Simpan</button>
</form>

</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>
<!--   JQUERY-UI Files   -->
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
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