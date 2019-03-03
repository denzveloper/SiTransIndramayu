<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Permintaan Transmigrasi - 3</title>
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
            <h4 align="center">DATA ANGGOTA KELUARGA</h4>
          </td>

          </tr>

        </tbody>
      </table>
    </div>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
<?php echo form_open('register/confirm', 'class="well form-horizontal"');?>
<div class="form-group add-field">
<div class="user">
 <table class="table table-striped">
  <tbody>
   <tr>
    <td colspan="1">
      <fieldset>
      <div class="form-group">
        <label class="col-md-4 control-label">Nama</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="name[]" placeholder="Nama" class="form-control" required="true" type="text"></div>
       </div>
     </div>
     <div class="form-group">
      <label class="col-md-4 control-label">Usia</label>
      <div class="col-md-8 inputGroupContainer">
       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="umur" name="umur[]" placeholder="Usia Saat ini" class="form-control umur" required="true" type="text" onkeypress="return number(event);"></div>
     </div>
   </div>
   <div class="form-group">
    <label class="col-md-4 control-label">Jenis Kelamin</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    <select class="selectpicker form-control" name="jk[]">
     <option value='0'>Perempuan</option>
     <option value='1'>Laki-Laki</option>
   </select>
 </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Hubungan Keluarga</label>
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    <select class="selectpicker form-control" name="hub[]">
     <option>Istri</option>
     <option>Anak</option>
     <option>Lainnya</option>
   </select>
 </div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Agama</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group">
    <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
    <select class="selectpicker form-control" name="agama[]">
     <option>Islam</option>
     <option>Protestan</option>
     <option>Katolik</option>
     <option>Hindu</option>
     <option>Buddha</option>
     <option>Konghucu</option>
   </select>
 </div>
</div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Pendidikan</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="study" name="pendidikan[]" placeholder="Pendidikan" class="form-control" required="true" value="" type="text"></div>
    <!--
   <select class="selectpicker form-control">
     <option>Tidak Bersekolah</option>
     <option>SD/Sederajat</option>
     <option>SMP/Sederajat</option>
     <option>SMA/Sederajat</option>
     <option>Ahli Madya (D3)</option>
     <option>Sarjana (S1)</option>
     <option>Magister (S2)</option>
     <option>Doktor (S3)</option>
     <option>Lainnya</option>
   </select>
   -->
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Pekerjaan/Keahlian</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span><input id="work" name="kerja[]" placeholder="Pekerjaan/Keahlian" class="form-control" required="true" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Keterangan</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="keterangan" name="ket[]" placeholder="Keterangan" class="form-control" type="text"></div>
 </div>
</div>
</div>
</fieldset>
</form>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<button class="btn btn-primary add-more pull-right">+</button>
<button name="btn-login" type="submit" class="btn btn-default">Lanjut</button>
</form>
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
  function number(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
  }
  
  var data_fo = $('.add-field').html();
    var sd = '<button class="btn btn-danger remove-add-more">-</button><br><br><br>';
    var data_combine = data_fo.concat(sd);
    var max_fields = 5; //maximum input boxes allowed
    var wrapper = $(".user"); //Fields wrapper
    var add_button = $(".add-more"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
        x++; //text box increment
        //$('.num').html(x);
        $(wrapper).append(data_combine); //add input box
        //$(wrapper).append('<div class="remove-add-more">Remove</div>')
      // console.log(data_fo);
    });

    $(wrapper).on("click",".remove-add-more", function(e){ //user click on remove text
        e.preventDefault();
        $(this).prev('.user').remove();
        $(this).remove();
        x--;
    })
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

