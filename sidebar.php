<?php
$kategori_list = 'SELECT
					kategori.kategori,
					Count(berita.id_berita) AS jumlah,
					kategori.id_kategori
					FROM
					berita
					INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori
					GROUP BY
					kategori.kategori,
					kategori.id_kategori';
$list_kategori = $mysqli->query($kategori_list) or die($mysqli->error);

$terkini = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_lengkap
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5
';

$populer = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
admin.nama_lengkap,
berita.id_admin,
berita.dilihat
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
ORDER BY
berita.dilihat DESC
LIMIT 0, 5
';

$list_terkini = $mysqli->query($terkini) or die ($mysqli->error);

$list_populer = $mysqli->query($populer) or die ($mysqli->error);
?>
					<div class="col-md-4 sidebar">
						<div class="sidebar-item kategori">
							<h3 class="page-header">Kategori</h5>
							<ul class="nav nav-pills nav-stacked nav-kat">
							<?php while ($data_kat = $list_kategori->fetch_array()) { ?>

							<?php if (isset($_GET['kat']) && $data_kat['id_kategori'] == $_GET['id'] ) { ?>
								<li class="active">
									<a href="<?php echo $base_url."kategori.php?id=".$data_kat['id_kategori']."&amp;kat=".strtolower($data_kat['kategori']); ?>">
									<?php echo $data_kat['kategori']; ?> <span class="badge pull-right"><?php echo $data_kat['jumlah'] ?></span></a>
								</li>
							<?php } else { ?>
								<li>
									<a href="<?php echo $base_url."kategori.php?id=".$data_kat['id_kategori']."&amp;kat=".strtolower($data_kat['kategori']); ?>">
									<?php echo $data_kat['kategori']; ?> <span class="badge pull-right"><?php echo $data_kat['jumlah'] ?></span></a>
								</li>
							<?php } ?>
							<?php } ?>
							</ul>
						</div>
						<div class="sidebar-item">
							<h3 class="page-header">Populer</h3>
							<ul class="news-list">
							<?php while ($populer_list = $list_populer->fetch_array()) { ?>
								<li>
									<a <a href="<?php echo $base_url."detail.php?id=".$populer_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $populer_list['judul'])); ?>">
										<img src="<?php echo $base_url."images/".$populer_list['gambar']; ?>" class="img-responsive wow fadeIn">
									</a>
									<p>Oleh: <a href="<?php echo $base_url."author.php?id=".$populer_list['id_admin']; ?>"><?php echo $populer_list['nama_lengkap']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $populer_list['tgl_posting']; ?></p>
									<a href="<?php echo $base_url."detail.php?id=".$populer_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $populer_list['judul'])); ?>">
										<?php echo $populer_list['judul']; ?>
									</a>
								</li>
							<?php } ?>
							</ul>
						</div>
						<div class="sidebar-item">
							<h3 class="page-header">Terkini</h3>
							<ul class="news-list">
							<?php while ($terkini_list = $list_terkini->fetch_array()) { ?>
								<li>
									<a href="<?php echo $base_url."detail.php?id=".$terkini_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $terkini_list['judul'])); ?>">
										<img src="<?php echo $base_url."images/".$terkini_list['gambar']; ?>" class="img-responsive wow fadeIn">
									</a>
									<p>Oleh: <a href="<?php echo $base_url."author.php?id=".$terkini_list['id_admin']; ?>"><?php echo $terkini_list['nama_lengkap']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $terkini_list['tgl_posting']; ?></p>
									<a href="<?php echo $base_url."detail.php?id=".$terkini_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $terkini_list['judul'])); ?>">
										<?php echo $terkini_list['judul']; ?>
									</a>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>