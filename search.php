<?php
include 'header.php';
if (!isset($_GET['q'])) redirect('404');
$limit = 5;
if(isset($_GET['p'])){
    $noPage = $mysqli->real_escape_string($_GET['p']);
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$query = $mysqli->real_escape_string($_GET['q']);

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
WHERE
berita.judul LIKE '%".$query."%' OR
kategori.kategori LIKE '%".$query."%'
ORDER BY
berita.tgl_posting DESC
LIMIT ".$mysqli->real_escape_string($offset).",". $limit;

$sql_rec = "SELECT
Count(berita.id_berita) AS jumlah
FROM
berita
INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori
WHERE
berita.judul LIKE '%".$mysqli->real_escape_string($query)."%' OR
kategori.kategori LIKE '%".$mysqli->real_escape_string($query)."%'";

$total_rec = $mysqli->query($sql_rec);

$jumlah = $total_rec->fetch_assoc();

$total_rec_num = $jumlah['jumlah'];

$qryIndex = $mysqli->query($sqlIndex);

$total_page = ceil($total_rec_num/$limit);
?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
						<h4>Berita dengan kata kunci "<strong><?php echo $query;?></strong>"</h4>
						<?php while ($post_search = $qryIndex->fetch_assoc()) { ?>
						<div class="post">
							<div class="row post-title">
								<div class="col-sm-12">
									<a href="<?php echo $base_url."detail.php?id=".$post_search['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-",$post_search['judul'])); ?>">
										<h2><?php echo strtoupper($post_search['judul']); ?></h2>
									</a>
								</div>
							</div>
							<div class="row post-meta">
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;
									<a href="<?php echo $base_url."author.php?id=".$post_search['id_admin']; ?>">
										<?php echo $post_search['nama_lengkap']; ?>
									</a>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;
									<?php echo $post_search['tgl_posting']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;
									<?php echo $post_search['dilihat']; ?>x
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;
									<a href="<?php echo $base_url."kategori.php?id=".$post_search['id_kategori']."&amp;".
									strtolower(str_replace(' ', '-',$post_search['kategori'])); ?>">
										<em><?php echo $post_search['kategori']; ?></em>
									</a>
								</div>
							</div>
							<div class="row post-content">
								<div class="col-sm-12 excerpt">
									<img src="<?php echo $base_url."images/".$post_search['gambar']; ?>" class="wow fadeIn">
									<?php echo substr($post_search['teks_berita'], 0,200); ?>...
									<a href="<?php echo $base_url."detail.php?id=".$post_search['id_berita']."&amp;judul=".
									strtolower(str_replace(' ', '-', $post_search['judul'])); ?>">
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
								<a href="<?php echo $base_url."search.php?q=".$_GET['q']."&amp;p=".($noPage-1);?>">
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
            						else echo " <li><a href='".$_SERVER['PHP_SELF']."?q=".$_GET['q']."&amp;p=".$page."'>".$page."</a></li> ";
            						if ($page == 1 && $noPage >=6) echo "<li class='active'><a>...</a></li>";
								?>
							<?php } ?>
						<?php } ?>

						<?php if ($noPage < $total_page) { ?>
							<li>
								<a href="<?php echo $base_url."search.php?q=".$_GET['q']."&amp;p=".($noPage+1); ?>">
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