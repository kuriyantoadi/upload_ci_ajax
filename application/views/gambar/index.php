<html>
<head>
	<title>Data Gambar</title>
	<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load File librari Jquery -->
	<script src="<?php echo base_url("js/ajax.js"); ?>"></script> <!-- Load file ajax.js -->
</head>
<body>
	<h1>Data Gambar</h1><hr>

	<form>
		<!-- Untuk menampilkan pesan -->
		<div id="msg"></div>

		<table cellpadding="8">
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" name="input_deskripsi" id="input_deskripsi"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input type="file" name="input_gambar" id="input_gambar"></td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
			<tr>
				<td><button type="button" id="btn-upload">Upload</button></td>
				<td><span id="loading">Uploading...</span></td>
			</tr>
		</table>
	</form>

	<div id="view">
		<?php $this->load->view('gambar/view', array('gambar'=>$gambar)); // Load view.php dan kirimkan data gambarnya ?>
	</div>

	<script>
	$(document).ready(function(){
		$("#loading").hide(); // Sembunyikan dulu loadingnya
		
		$("#btn-upload").click(function(){ // Ketika user mengklik tombol Upload, lakukan: 
			upload('<?php echo base_url("index.php/gambar/upload"); ?>', $("#loading"), $("#msg"), $("#view")); // Panggil fungsi upload yg ada di file process.js
		});
	});
	</script>
</body>
</html>
