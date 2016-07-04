<?php
$nasional = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_lengkap,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "1"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$olahraga = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_lengkap,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "2"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$teknologi = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_lengkap,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "3"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$list_nasional = $mysqli->query($nasional) or die("Error Nasional:".$mysqli->error);
$list_olahraga = $mysqli->query($olahraga) or die("Error Olahraga".$mysqli->error);
$list_teknologi = $mysqli->query($teknologi) or die("Error Teknologi".$mysqli->error);
 ?>
<div class="container-fluid footer">
	<div class="row footer-upper">
		<div class="container">
			<div class="col-md-4">
				<h3 class="page-header">Teknologi</h3>
				<ul class="news-list">
				<?php while ($teknologi_list = $list_teknologi->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$teknologi_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $teknologi_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$teknologi_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."author.php?id=".$teknologi_list['id_admin']; ?>"><?php echo $teknologi_list['nama_lengkap']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $teknologi_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$teknologi_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $teknologi_list['judul'])); ?>">
							<?php echo $teknologi_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 class="page-header">Nasional</h3>
				<ul class="news-list">
				<?php while ($nasional_list = $list_nasional->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$nasional_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $nasional_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$nasional_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."author.php?id=".$nasional_list['id_admin']; ?>"><?php echo $nasional_list['nama_lengkap']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $nasional_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$nasional_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $nasional_list['judul'])); ?>">
							<?php echo $nasional_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 class="page-header">Olahraga</h3>
				<ul class="news-list">
				<?php while ($olahraga_list = $list_olahraga->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$olahraga_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $olahraga_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$olahraga_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."author.php?id=".$olahraga_list['id_admin']; ?>"><?php echo $olahraga_list['nama_lengkap']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $olahraga_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$olahraga_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $olahraga_list['judul'])); ?>">
							<?php echo $olahraga_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row footer-bottom">
		<div class="col-md-12">
			<span class="copy">Copyright &copy; <?php echo date('Y');?> Berita Kita</span>
		</div>
	</div>
</div>
<script src="<?php echo $base_url; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>assets/ticker/jquery.ticker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/wow/dist/wow.min.js"></script>
<script src="<?php echo $base_url; ?>dist/js/portalberita.js"></script>
</body>
</html>
