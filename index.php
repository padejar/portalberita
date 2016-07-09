<?php include 'header.php';

//Jumlah Perhalaman
$limit = 5;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

//Mengambil data berita
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
ORDER BY
berita.tgl_posting DESC
LIMIT ".$mysqli->real_escape_string($offset).",". $limit;

//data untuk dihitung
$sql_rec = "SELECT id_berita FROM berita";

$total_rec = $mysqli->query($sql_rec);

//Menghitung data yang diambil
$total_rec_num = $total_rec->num_rows;

$qryIndex = $mysqli->query($sqlIndex);

//Total semua data
$total_page = ceil($total_rec_num/$limit);
?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">

			<?php include 'slider.php'; ?>

			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
					<?php while ($index = $qryIndex->fetch_array()) { ?>
						<div class="post">
							<div class="row post-title">
								<div class="col-sm-12">
									<a href="<?php echo $base_url."detail.php?id=".$index['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-",$index['judul'])); ?>">
										<h2><?php echo strtoupper($index['judul']); ?></h2>
									</a>
								</div>
							</div>
							<div class="row post-meta">
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;
									<a href="<?php echo $base_url."author.php?id=".$index['id_admin']; ?>">
										<?php echo $index['nama_lengkap']; ?>
									</a>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;
									<?php echo $index['tgl_posting']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;
									<?php echo $index['dilihat']; ?>x
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;
									<a href="<?php echo $base_url."kategori.php?id=".$index['id_kategori']."&amp;".
									strtolower(str_replace(' ', '-',$index['kategori'])); ?>">
										<em><?php echo $index['kategori']; ?></em>
									</a>
								</div>
							</div>
							<div class="row post-content">
								<div class="col-sm-12 excerpt">
									<img src="<?php echo $base_url."images/".$index['gambar']; ?>" class="wow fadeIn">
									<?php echo substr($index['teks_berita'], 0,200); ?>...
									<a href="<?php echo $base_url."detail.php?id=".$index['id_berita']."&amp;judul=".
									strtolower(str_replace(' ', '-', $index['judul'])); ?>">
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
						<?php if ($total_rec_num > $limit) { ?>
						<?php if ($noPage > 1 ) { ?>

							<li>
								<a href="<?php echo $base_url."index.php?p=".($noPage-1);?>">
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
            						else echo " <li><a href='".$_SERVER['PHP_SELF']."?p=".$page."'>".$page."</a></li> ";
            						if ($page == 1 && $noPage >=6) echo "<li class='active'><a>...</a></li>";
								?>
							<?php } ?>
						<?php } ?>

						<?php if ($noPage < $total_page) { ?>
							<li>
								<a href="<?php echo $base_url."index.php?p=".($noPage+1); ?>">
									<i class="glyphicon glyphicon-chevron-right"></i>
								</a>
							</li>
						<?php } ?>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';