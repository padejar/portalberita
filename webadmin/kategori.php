<?php include 'header.php'; ?>
<?php
$limit = 10;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$sql = "SELECT id_kategori, kategori FROM kategori LIMIT ".$offset.",". $limit;
$qry = $mysqli->query($sql) or die ($mysqli->error);

$sql_rec = "SELECT id_kategori FROM kategori";

$total_rec = $mysqli->query($sql_rec);

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
							<h2 class="page-header"><i class="fa fa-folder-o"></i> Kategori</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3">
								<form method="POST" action="aksi-kat.php?act=tambah">
									<div class="form-group">
										<label>Tambah Kategori</label>
										<input class="form-control input-sm" name="kategori" type="text" placeholder="Tambah Kategori"></input>
									</div>
									<div class="form-group">
										<button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> Tambah</button>
									</div>
								</form>
							</div>
							<div class="clear"></div>
							<hr>
							<table class="table table-hover">
								<thead>
									<tr>
										<th width="10%" style="text-align: right">ID Kategori</th>
										<th width="70%">Kategori</th>
										<th width="20%" style="text-align: center">Pilihan</th>
									</tr>
								</thead>
								<tbody>
								<?php while ($kat_list = $qry->fetch_assoc()) { ?>
									<tr>
										<td align="right"><?php echo $kat_list['id_kategori']; ?></td>
										<td><?php echo $kat_list['kategori'] ?></td>
										<td align="center">
											<?php if ($kat_list['kategori']!='Uncategorized') { ?>
											<a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" href="aksi-kat.php?act=hapus&amp;id=<?=$kat_list['id_kategori']?>" class="btn btn-sm btn-danger">
												<i class="fa fa-trash"></i>
											</a>
											<a href="aksi-kat.php?act=edit&amp;id=<?=$kat_list['id_kategori']?>" class="btn btn-sm btn-success">
												<i class="fa fa-edit"></i>
											</a>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col-md-12">
							<ul class="pagination">
							<?php if ($noPage > 1) { ?>

								<li>
									<a href="<?php echo "kategori.php?p=".($noPage-1);?>">
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
									<a href="<?php echo "kategori.php?p=".($noPage+1); ?>">
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