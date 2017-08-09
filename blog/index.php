<?php 
require_once('conn.php');

$sql_sidebar = 'SELECT * FROM article';
$sql_article = 'SELECT article.*,user.nama_user FROM article,user WHERE article.id_username = user.id_user limit 2';
$sql_user = 'SELECT * FROM user';
$data_article = mysqli_query($conn,$sql_article);
$data_user = mysqli_query($conn,$sql_user);
$data_sidebar = mysqli_query($conn,$sql_sidebar);



 ?>
<?php include('asset/template/header.php') ?>

	<div class="wrapper">
		<div class="content">
		<?php while ($user = mysqli_fetch_array($data_user)) { ?>
		<?php while ($article = mysqli_fetch_array($data_article)) { ?>
			<div class="article">
				
				<div class="judul"> <a href="detail-article.php"><?php echo $article['judul'] ?></a></div>
				<div class="descripsi">
					<div class="user" style="display: inline;">Post by : <a href="#"><?php echo $article['nama_user'] ?></a></div>
					<div class="tanggal" style="display: inline; padding-left: 10px;">Update : <?php echo $article['tgl_article'] ?></div>
				</div>
				<div class="image_content">
					<img src="asset/img/<?php echo $article['image'] ?>" alt="image_content" style="width: 50%">
				</div>
				<div class="isi_content">
					<?php echo $article['descripsi'] ?>
					<br>
					<a href="detail-article.php">Read More</a>
				</div>
			</div>
		<?php } ?>
		<?php } ?>
		
		<?php include('asset/template/footer.php') ?>
	
		<?php include('asset/template/sidebar.php') ?>

</body>
</html>


