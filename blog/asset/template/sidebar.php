	<div class="sidebar">
			<div class="isi_sidebar">
				<div class="judul_sidebar">Baca Juga</div>
				<?php while ($sidebar = mysqli_fetch_array($data_sidebar)) {if ($sidebar['id_article'] >2) {?>
					<div class="judul_content_sidebar">
					<a href=""><?php echo $sidebar['judul'] ?></a>
					</div>
					<div class="content_sidebar">
						<a href="detail-article.php">
							<img src="../asset/img/<?php echo $sidebar['image'] ?>" alt="image_content">
						</a>
				</div>
						<?php }} ?>
			</div>
			<div class="isi_sidebar">
				<div class="judul_sidebar">About Me</div>
				<div class="img_profile">
					<img src="../asset/img/profile.jpg" alt="profile">
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

	
		</div>
	</div>
