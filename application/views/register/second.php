<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Permintaan Transmigrasi - 2</title>
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
    
    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet"/>
</head>
<body>
  <h2 align="center">SELEKSI TRANSMIGRAN</h2>
  <br>
  <div class="container">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td colspan="4">
            <h4 align="center">DATA KEPALA KELUARGA CALON TRANSMIGRAN (KK)</h>
          </td>

          </tr>

        </tbody>
      </table>
    </div>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
 <table class="table table-striped">
  <tbody>
   <tr>
    <td colspan="1">
    <?php echo form_open('register/third', 'class="well form-horizontal"');?>
       <div class="form-group">
        <label class="col-md-4 control-label">Nama</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="name" placeholder="Nama Lengkap" class="form-control" required="true" type="text"></div>
       </div>
     </div>
     <div class="form-group">
      <label class="col-md-4 control-label">Alamat Rumah</label>
      <div class="col-md-8 inputGroupContainer">
       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine1" name="alamat" placeholder="Alamat Rumah" class="form-control" required="true" type="text"></div>
     </div>
   </div>
   <div class="form-group">
    <label class="col-md-4 control-label">Kelurahan/Desa</label>
    <div class="col-md-8 inputGroupContainer">
     <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine2" name="desa" placeholder="Kelurahan/Desa" class="form-control" required="true" type="text"></div>
   </div>
 </div>
 <div class="form-group">
  <label class="col-md-4 control-label">Kecamatan</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine3" name="kecamatan" placeholder="Kecamatan" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Kabupaten/Kota</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine4" name="kota" placeholder="Kabupaten/Kota" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Provinsi</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine5" name="provinsi" placeholder="Provinsi" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Tempat Lahir</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Tanggal Lahir (TTTT-BB-HH)</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="dateborn" name="tanggallahir" placeholder="Tanggal Lahir" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Tanggal kawin (TTTT-BB-HH)</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="datewed" name="tanggalkawin" placeholder="Tempat tanggal kawin" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Pendidikan</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="study" name="pendidikan" placeholder="Pendidikan" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Pekerjaan/Keahlian</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span><input id="work" name="pekerjaan" placeholder="Pekerjaan/Keahlian" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Pendapatan/Perkapita/Pertahun 「Rp.」</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span><input id="salary" name="gaji" placeholder="Pendapatan/Perkapita/Pertahun" class="form-control" required="true" type="number"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Luas tanah yang ditinggalkan 「M<sup>2</sup>」</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="home" name="tanah" placeholder="Luas tanah yang ditinggalkan" class="form-control" required="true" type="number"></div>
 </div>
</div>
</div>
<button name="btn-login" type="submit" class="btn btn-default">Lanjut</button>
</form>
</td>
</tr>
</tbody>
</table>
<hr>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>
<!--   JQUERY-UI Files   -->
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script>
  $( function() {
    $( "#dateborn" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datewed" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#salary" ).keypress(function(e) {allowNumbersOnly(e); } );
    $( "#home" ).keypress(function(e) {allowNumbersOnly(e); } );
  } );
</script>
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