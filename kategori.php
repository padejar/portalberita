<?php include 'header.php';
if (!isset($_GET['id'])) redirect('404');
$limit = 5;
if(isset($_GET['p'])){
    $noPage = $mysqli->real_escape_string($_GET['p']);
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$sqlKategori = "SELECT kategori FROM kategori WHERE id_kategori='".$mysqli->real_escape_string($_GET['id'])."'";

$qryKategori = $mysqli->query($sqlKategori);

$jumlah = $qryKategori->num_rows;

if ($jumlah > 0) {
	$kategori = $qryKategori->fetch_assoc();

	$sqlIndex = "SELECT
	berita.id_berita,
	berita.judul,
	berita.gambar,
	berita.teks_berita,
	berita.tgl_posting,
	berita.dilihat,
	admin.id_admin,
	admin.nama_lengkap,
	kategori.id_kategori,
	kategori.kategori
	FROM
	admin
	INNER JOIN berita ON admin.id_admin = berita.id_admin
	INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
	WHERE kategori.id_kategori = '".$mysqli->real_escape_string($_GET['id'])."'
	ORDER BY
	berita.tgl_posting DESC
	LIMIT ".$mysqli->real_escape_string($offset).",". $mysqli->real_escape_string($limit);

	$sql_rec = "SELECT id_berita FROM berita WHERE id_kategori = '".$mysqli->real_escape_string($_GET['id'])."'";

	$total_rec = $mysqli->query($sql_rec);

	$total_rec_num = $total_rec->num_rows;

	$qryIndex = $mysqli->query($sqlIndex);

	$total_page = ceil($total_rec_num/$limit);
} else {
	echo "<script>window.location = '404.php'</script>";
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
						<h4>Berita dengan kategori "<strong><?php echo $kategori['kategori']; ?></strong>"</h4>
						<?php while ($post_kat = $qryIndex->fetch_assoc()) { ?>
						<div class="post">
							<div class="row post-title">
								<div class="col-sm-12">
									<a href="<?php echo $base_url."detail.php?id=".$post_kat['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-",$post_kat['judul'])); ?>">
										<h2><?php echo strtoupper($post_kat['judul']); ?></h2>
									</a>
								</div>
							</div>
							<div class="row post-meta">
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;
									<a href="<?php echo $base_url."author.php?id=".$post_kat['id_admin']; ?>">
										<?php echo $post_kat['nama_lengkap']; ?>
									</a>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;
									<?php echo $post_kat['tgl_posting']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;
									<?php echo $post_kat['dilihat']; ?>x
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<em><?php echo $post_kat['kategori']; ?></em>
								</div>
							</div>
							<div class="row post-content">
								<div class="col-sm-12 excerpt">
									<img src="<?php echo $base_url."images/".$post_kat['gambar']; ?>" class="wow fadeIn">
									<?php echo substr($post_kat['teks_berita'], 0,200); ?>...
									<a href="<?php echo $base_url."detail.php?id=".$post_kat['id_berita']."&amp;judul=".
									strtolower(str_replace(' ', '-', $post_kat['judul'])); ?>">
										Selengkapnya <i class="glyphicon glyphicon-chevron-right"></i>
									</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php include 'sidebar.php'; ?>
					<div class="col-md-12">
						<ul class="pagination">
						<?php if ($total_rec_num > $limit): ?>
						<?php if ($noPage > 1) { ?>
							<li>
								<a href="<?php echo $base_url."kategori.php?id=".$_GET['id']."&amp;p=".($noPage-1);?>">
									<i class="glyphicon glyphicon-chevron-left"></i>
								</a>
							</li>
						<?php } ?>
						<?php for ($page=1; $page <= $total_page ; $page++) { ?>
							<?php if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $total_page)) { ?>
								<?php
									$showPage = $page;
									if ($page==$total_page && $noPage <= $total_page-5) echo "<li class='active'><a>...</a></li>";
            						if ($page == $noPage) echo "<li class='active'><a href='#'>".$page."</a></li> ";
            						else echo " <li><a href='".$_SERVER['PHP_SELF']."?id=".$_GET['id']."&amp;p=".$page."'>".$page."</a></li> ";
            						if ($page == 1 && $noPage >=6) echo "<li class='active'><a>...</a></li>";
								?>
							<?php } ?>
						<?php } ?>
						<?php if ($noPage < $total_page) { ?>
							<li>
								<a href="<?php echo $base_url."kategori.php?id=".$_GET['id']."&amp;p=".($noPage+1); ?>">
									<i class="glyphicon glyphicon-chevron-right"></i>
								</a>
							</li>
						<?php } ?>
						<?php endif ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>