# PANDUAN UNTUK MEMBUAT FRONTEND
1. Pengambilan data
Silahkan clone data menggunakan git dan desktop client git(tortuise git, git extension, gitahead, dll) dan simpanlah pada direktori "htdocs" pada xampp atau direktori lain.
Tutorial silahkan tanya pada Owner repositori atau Searching google.「Saya rekomendasikan menggunakan GitAhead karena ada dukungan terhadap login menggunakan akun」

3.  Mohon jangan Hapus
 - Icon untuk web
```
<link  rel="icon"  type="image/png"  sizes="96x96"  href="<?php  echo  $this->image->show(); ?>">
```
 - CSS dan JS Bootstrap/JQuery
```
<link  href="<?php  echo  base_url('assets/css/bootstrap.min.css'); ?>"  rel="stylesheet" />

....

<script  src="<?php  echo  base_url('assets/js/jquery-1.10.2.js'); ?>"  type="text/javascript"></script>
<script  src="<?php  echo  base_url('assets/js/bootstrap.min.js'); ?>"  type="text/javascript"></script>
```

 - CSS dan JS Notifikasi
```
<link  href="<?php  echo  base_url('assets/css/animate.min.css'); ?>"  rel="stylesheet"/>

....

<script  src="<?php  echo  base_url('assets/js/bootstrap-notify.js'); ?>"  type="text/javascript"></script>
```
 - Skrip untuk menampilkan notifikasi
```
....
<?php  if($this->session->flashdata('info')){ foreach($this->session->flashdata('info') as $row) {?>

<script  type="text/javascript">

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
```

 3. Pembagian Direktori
 - Frontend Register dan Home
> ./application/views/homes


 - Frontend dashboard
 Direktori untuk frontend dashboard berada di:
> ./application/views/login
> ./application/views/forget

4. Simpan
Untuk penyimpanan silahkan simpan ke direktori masing-masing dan harus diuji coba terlebih dahulu di-perambahan web.
Setelah uji coba silahkan "Commit" dan "Push" ke repositori.

> Jangan lupa gunakan "BRANCH" masing-masing!!! 「Tutorial? Seperti diatas.. :)」
