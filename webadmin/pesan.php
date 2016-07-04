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
pesan.pesan_id,
pesan.pengirim,
pesan.email,
pesan.subjek,
pesan.pesan_isi,
pesan.status,
pesan.tanggal
FROM
pesan
ORDER BY tanggal DESC
LIMIT ".$offset.",". $limit;
$qry = $mysqli->query($sql) or die ("Error retrieving data: ".$mysqli->error);

$sql_rec = "SELECT pesan.pesan_id FROM pesan";

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
							<h2 class="page-header"><i class="fa fa-envelope"></i> Kontak</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="30%">Pengirim</th>
										<th width="30%">Subjek</th>
										<th width="20%">Tanggal</th>
										<th width="20%">Pilihan</th>
									</tr>
								</thead>
								<tbody>
								<?php if ($total_rec_num == 0) { ?>
									<tr>
										<td colspan="4" align="center">Belum ada data</td>
									</tr>
								<?php } else { ?>
									<?php while ($pesan = $qry->fetch_assoc()) { ?>
										<?php if ($pesan['status']=="belum") { ?>
									<tr>
										<td><strong><?php echo $pesan['email']; ?></strong></td>
										<td><strong><?php echo $pesan['subjek']; ?></strong></td>
										<td><strong><?php echo $pesan['tanggal']; ?></strong></td>
										<td align="center">
											<a href="lihat-pesan.php?id=<?=$pesan['pesan_id']?>" class="btn btn-sm btn-primary">
												<i class="fa fa-eye"></i>
											</a>
											<a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" href="hapus-pesan.php?id=<?=$pesan['pesan_id']?>" class="btn btn-danger btn-sm">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
										<?php } else { ?>
									<tr>
										<td><?php echo $pesan['email']; ?></td>
										<td><?php echo $pesan['subjek']; ?></td>
										<td><?php echo $pesan['tanggal']; ?></td>
										<td align="center">
											<a href="lihat-pesan.php?id=<?=$pesan['pesan_id']?>" class="btn btn-sm btn-primary">
												<i class="fa fa-eye"></i>
											</a>
											<a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" href="hapus-pesan.php?id=<?=$pesan['pesan_id']?>" class="btn btn-danger btn-sm">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
										<?php } ?>
									<?php } ?>
								<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col-md-12">
							<ul class="pagination">
							<?php if ($noPage > 1) { ?>

								<li>
									<a href="<?php echo "pesan.php?p=".($noPage-1);?>">
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
									<a href="<?php echo "pesan.php?p=".($noPage+1); ?>">
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