<?php include 'header.php';
$sql_pesan = "SELECT
pesan.pesan_id,
pesan.email,
pesan.pengirim,
pesan.subjek,
pesan.pesan_isi,
pesan.status,
pesan.tanggal
FROM
pesan
WHERE
pesan_id = '$_GET[id]'";

$qry_pesan = $mysqli->query($sql_pesan);

$pesan = $qry_pesan->fetch_assoc();

$update = "UPDATE pesan SET status = 'dibaca' WHERE pesan_id = '$_GET[id]'";

$qry = $mysqli->query($update) or die($mysqli->error);
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
							<h2 class="page-header"><i class="fa fa-envelope"></i> Detail Pesan</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
                            <table class="pesan-table">
                                <tr>
                                    <th width="15%">Pengirim</th>
                                    <td width="5%">:</td>
                                    <td width="80%"><?php echo $pesan['pengirim']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email Pengirim</th>
                                    <td>:</td>
                                    <td><?php echo $pesan['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Subjek</th>
                                    <td>:</td>
                                    <td><?php echo $pesan['subjek']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>:</td>
                                    <td><?php echo $pesan['tanggal']; ?></td>
                                </tr>
                            </table>
                            <hr>
                            <div class="message-content">
                               <p><?php echo $pesan['pesan_isi']; ?></p>
                            </div>
						</div>
					</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="pesan.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <a href="hapus-pesan.php?id=<?=$pesan['pesan_id']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Pesan</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>