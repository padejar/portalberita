<?php include 'header.php'; ?>
<?php
$limit = 5;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$sql = "SELECT
buku_tamu.komentar_id,
buku_tamu.komentar_pengirim,
buku_tamu.komentar_email,
buku_tamu.komentar_isi,
buku_tamu.komentar_status,
buku_tamu.komentar_tgl
FROM
buku_tamu
ORDER BY komentar_tgl DESC
LIMIT ".$offset.",". $limit;
$qry = $mysqli->query($sql) or die ("Error retrieving data: ".$mysqli->error);

$sql_rec = "SELECT buku_tamu.komentar_id FROM buku_tamu";

$total_rec = $mysqli->query($sql_rec) or die ("Error retrieving number:".$mysqli->error);

$total_rec_num = $total_rec->num_rows;

$total_page = ceil($total_rec_num/$limit);

?>
<div class="container-fluid body">
	<div class="row">
		<div class="col-lg-2 sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="col-lg-10 main-content">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-header"><i class="fa fa-envelope"></i> Buku Tamu</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="20%">Pengirim</th>
										<th width="15%">Email</th>
										<th width="35%">Isi</th>
										<th width="10%">Status</th>
										<th width="10%">Tanggal</th>
										<th width="10%">Pilihan</th>
									</tr>
								</thead>
								<tbody>
								<?php if ($total_rec_num == 0) { ?>
									<tr>
										<td colspan="5" align="center">Belum ada data</td>
									</tr>
								<?php } else { ?>
									<?php while ($pesan = $qry->fetch_assoc()) { ?>
									<tr>
										<td><?php echo $pesan['komentar_pengirim']; ?></td>
										<td><?php echo $pesan['komentar_email']; ?></td>
										<td><?php echo $pesan['komentar_isi']; ?></td>
										<td>
											<?php if ($pesan['komentar_status']=='tidak') { ?>
											<label class="label label-danger">PERLU MODERASI</label>
											<?php } else { ?>
											<label class="label label-success">DITERIMA</label>
											<?php } ?>
										</td>
										<td><?php echo substr($pesan['komentar_tgl'],0,10); ?></td>
										<td align="center">
											<a data-toggle="tooltip" data-placement="bottom" title="Ubah Status" href="ubah-komentar.php?id=<?php echo $pesan['komentar_id']?>" class="btn btn-xs btn-success">
												<i class="fa fa-edit"></i>
											</a>
											<a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" data-toggle="tooltip" data-placement="bottom" title="Hapus" href="hapus-komentar.php?id=<?php echo $pesan['komentar_id']?>" class="btn btn-danger btn-xs">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
									<?php } ?>
								<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col-md-12">
							<ul class="pagination">
							<?php if ($noPage > 1) { ?>

								<li>
									<a href="<?php echo "buku-tamu.php?p=".($noPage-1);?>">
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
									<a href="<?php echo "buku-tamu.php?p=".($noPage+1); ?>">
										<i class="glyphicon glyphicon-chevron-right"></i>
									</a>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>