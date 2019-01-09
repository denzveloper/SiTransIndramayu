<!DOCTYPE html>
<html>
	<head>
		<title>News</title>
	</head>
	<body>
	<h1>Berita Ter-Kini</h1>
		<table border="1">
			<tr>
				<th>no</th>
				<th>Judul</th>
				<th>Tanggal</th>
				<th>Konten</th>	
				<th>Image</th>	
			</tr>
			<?php 
			$no = $this->uri->segment('3') + 1;
			if($user){ foreach($user as $u){ 
			?>
			<tr>
				<td><?php echo $no++; ?></td>
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