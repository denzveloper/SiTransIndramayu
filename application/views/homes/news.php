<!DOCTYPE html>
<html>
	<head>
		<title>Berita-In Transmigrasi</title>
	</head>
	<body>
	<?php //$this->uri->segment('3'); ?>
	<h1>MANPOWER AND TRANSMIGRATION REGION INDRAMAYU</h1>
    <a href="<?php echo base_url('index.php/login'); ?>">Login Landing Page</a>
    <br>
    <a href="<?php echo base_url('index.php/home'); ?>">Home</a>
    <a href="<?php echo base_url('index.php/register'); ?>">Register</a>
    <a href="#">News</a>
    <br>
	<h2>Berita Ter-Kini</h2>
		<table border="1">
			<tr>
				<th>Judul</th>
				<th>Tanggal</th>
				<th>Konten</th>	
				<th>Image</th>	
			</tr>
			<?php
			if($news){foreach($news as $u){ 
			?>
			<tr>
				<td><?php echo $u['judul']; ?></td>
				<td><?php echo $u['timedate']; ?></td>
				<td><?php echo $u['konten']; ?></td>
				<td><img src="data:image;base64,<?php echo base64_encode(file_get_contents($u['image'])); ?>"></td>
			</tr>
			<?php }}?>
		</table>
		<br/>
		<?php 
		echo $this->pagination->create_links();
		?>
	</body>
</html>