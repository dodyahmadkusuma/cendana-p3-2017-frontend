<?php 
require_once('conn.php');

$sql_post = "SELECT * FROM article WHERE id_article = 1 ";

$data_post = mysqli_query($conn,$sql_post);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Kasus</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>
<body>


	<div class="wrapper">

		<div class="navbar">
			<ul class="left">
				<li><a href="index.php"><img src="asset/img/logo.png" alt="logo"></a></li>
				
				<li><input  class="trans" type="input" placeholder="Search In Here"><button>Search</button></li>
			</ul>
			<ul class="right">
				<li><a href="login.html">Masuk</a></li>
				<li></li>
			</ul>
		</div>


		<div class="content">
				<?php while ($post = mysqli_fetch_array($data_post)) { ?>
			<div class="post">
			<div class="judul"><?php echo $post['judul'] ?></div>
			<div class="image_content">
				<img src="asset/img/<?php echo $post['image'] ?>" alt="image_content" style="width: 100%">
			</div>
			<div class="isi_content">
				<?php echo $post['content'] ?>
				
			</div>
			<?php } ?>
		</div>
<div class="commentar" style="border-radius: 9px 9px 9px 9px; box-shadow: 2px 2px 1px gray; display: inline-block;width: 100%;padding-top: 20px" >
	
	<div class="share" style="text-align:center; padding: 0;margin: 0">
	Share With:
	<a href="#" style="text-decoration: none; color: white; font-size: 45px;">
		<ul>
			<li style="display: inline-block; width: 20%;background: #3E64AD;">f</li>
			<li style="display: inline-block; width: 20%;background: #CD3627;">G+</li>
			<li style="display: inline-block; width: 20%;background: #6AADD1"><img src="asset/img/twitter.png" style="width: 20%"></li>
		</ul>
	</a>
	</div>
		<label>Komentar</label>

	<div class="kolom">
		<img src="ava.gif" style="width: 18%;height: 100%; float: left;">
	<form action="detail-article.php" method="GET">
		<button style="float: right;">Komentar</button>
		<input type="text" name="komentar" style="height: 100px;width: 60% ;float: right;">
	</form>
	</div>
</div>
<div class="list_commentar" style="border-radius: 9px 9px 9px 9px; box-shadow: 2px 2px 1px gray; width: 100%;padding-top: 20px">
	<label>List Komentar</label>
	<div class="ava">
		<div class="komentar_q">

		<img src="##"  style="width: 25px;height: 25px">
			Nice Info Gan....  <a href=''>Reply</a>
		</div>
		<div class="komentar_a" style="padding-left: 29px;">

		<img src="##"  style="width: 25px;height: 25px">
			Sundul Gan ... <a href=''>Reply</a>
		</div>

		<div class="komentar_q">
			
		
			<?php if (!empty($_GET['komentar'])) {
				echo "<img src=''  style='width: 25px;height: 25px'>". $_GET['komentar']." ... <a href=''>Reply</a>";
			} ?>
		</div>

	</div>


</div>

	
	</div>
	<div class="sidebar">
			<div class="isi_sidebar">
				<div class="judul_sidebar">Baca Juga</div>
					<div class="judul_content_sidebar">
					<a href="">Pesulap Di Tangkap Polisi</a></div>
					<div class="content_sidebar">
						<a href="detail-article.php">
							<img src="asset/img/content1.jpg" alt="image_content">
						</a>
					<div class="judul_content_sidebar">
					<a href="">Balita Di Cium Hingga Mati</a></div>
					<div class="content_sidebar">
						<a href="detail-article.php">
							<img src="asset/img/content4.jpg" alt="image_content">
						</a>
					<div class="judul_content_sidebar">
					<a href="">Mantan Awkarin Is Dead</a></div>
					<div class="content_sidebar">
						<a href="detail-article.php">
							<img src="asset/img/content3.jpg" alt="image_content">
						</a>
				</div>
			</div>
			<div class="isi_sidebar">
			</div>
			<div class="isi_sidebar">
				<div class="judul_sidebar">About Me</div>
				<div class="img_profile">
					<img src="asset/img/profile.jpg" alt="profile">
				</div>
				<div class="content_profile">
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>Dody Ahmad Kusuma Jaya</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Perum Pondok Mutiara Singosari Dengkol Malang</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>dodyrepper@gmail.com</td>
						</tr>
						<tr>
							<td>No.Telp</td>
							<td>:</td>
							<td>+6281283848923</td>
						</tr>
					</table>
				</div>
			</div>



</body>
</html>
