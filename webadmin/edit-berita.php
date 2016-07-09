<?php include 'header.php';
$sql_kat = 'SELECT
kategori.id_kategori,
kategori.kategori
FROM
kategori
ORDER BY
kategori
ASC';
$qry_kat = $mysqli->query($sql_kat) or die ($mysqli->error);

$sql_berita = "SELECT
berita.judul,
berita.id_kategori,
berita.gambar,
berita.teks_berita
FROM
berita
WHERE
berita.id_berita='$_GET[id]'";

$qry_berita = $mysqli->query($sql_berita) or die ($mysqli->error);

$data = $qry_berita->fetch_assoc();
?>

<div class="container-fluid body">
	<div class="row">
		<div class="col-lg-2 sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="col-lg-10 main-content">
			<div class="panel panel-default">
				<div class="panel-body">
<?php
$var_judul = isset($_POST['judul']) ? $_POST['judul']:$data['judul'];
$var_kategori = isset($_POST['kategori']) ? $_POST['kategori']:$data['id_kategori'];
$var_teksberita = isset($_POST['teks_berita']) ? $_POST['teks_berita']:$data['teks_berita'];
if (isset($_POST['btn_edit'])) {
	$message=array();

    if (!empty($_FILES['gambar']['name'])) {
    	$file_name_gambar = $_FILES['gambar']['name'];
    	$filename_gambar = explode(".", $file_name_gambar);
    	$file_extension_gambar = $filename_gambar[count($filename_gambar)-1];
    	$file_weight_gambar = $_FILES['gambar']['size'];
    	$target_path_gambar="../images/";
    	$file_max_weight = 2048000; //batas maksimum ukuran file
    	$ok_ext = array('jpg','png','gif','jpeg','JPG','PNG','GIF','JPEG'); //type file yang diperbolehkan

    	if (in_array($file_extension_gambar, $ok_ext)) {
    		if ($file_weight_gambar <= $file_max_weight) {
    			move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path_gambar . $file_name_gambar);
    		} else {
    			$message[] = "<b>Ukuran File</b> terlalu besar!";
    		}
    	} else {
    		$message[] = "<b>Type File</b> tidak diperbolehkan";
    	}

    } else {
    	$file_name_gambar = $data['gambar'];
    }

    $judul = $mysqli->real_escape_string($_POST['judul']);
    $kategori = $_POST['kategori'];
    $teks_berita = $_POST['teks_berita'];

    if (count($message)==0) {
    	$insert_sql = "UPDATE berita SET judul = '$judul', id_kategori ='$kategori', gambar = '$file_name_gambar', teks_berita = '$teks_berita' WHERE id_berita = '$_GET[id]'";
    	$insert_qry = $mysqli->query($insert_sql) or die ($mysqli->error);

    	echo "<script>alert('Data Berhasil Diperbarui'); window.location = 'berita.php'</script>";
    }

    if (!count($message)==0) {
    	$num=0;
    	foreach ($message as $index => $show_message) {
    		$num++;
?>
		<div class="alert alert-danger alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php
                echo $show_message;
            ?>
        </div>
<?php
    	}
    }
}
?>
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-header"><i class="fa fa-newspaper-o"></i> Edit Berita</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="<?php echo $var_judul; ?>">
									</div>
									<div class="form-group">
										<textarea class="form-control input-sm" name="teks_berita" id="editor" rows="15"><?php echo $var_teksberita; ?></textarea>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Tanggal Posting</label>
                                        <input type="date" class="form-control input-sm" name="tgl_posting" value="<?php echo date('Y-m-d'); ?>" disabled>
                                    </div>
                                    <div class="form-group">
										<label>Kategori</label>
										<select class="form-control input-sm" name="kategori">
										<?php while ($kat = $qry_kat->fetch_assoc()):?>
											<?php if ($kat['id_kategori']==$var_kategori): ?>
											<option value="<?php echo $kat['id_kategori']; ?>" selected><?php echo $kat['kategori']; ?></option>
											<?php else: ?>
											<option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['kategori']; ?></option>
											<?php endif; ?>
										<?php endwhile; ?>
										</select>
									</div>
									<div class="form-group">
										<input type="file" name="gambar" id="gambar">
										<script type="text/javascript">
											document.getElementById("gambar").onchange = function () {
    											var reader = new FileReader();

    											reader.onload = function (e) {
        											// get loaded data and render thumbnail.
       												document.getElementById("image").src = e.target.result;
    											};

    											// read the image file as a data URL.
    											reader.readAsDataURL(this.files[0]);
											};
										</script>
										<label class="text-muted">Ukuran gambar maks. 2 MB dengan type: jpg, png, gif</label>
										<img src="../images/<?php echo $data['gambar'] ?>" width="100%" height="150" id="image">
									</div>
								</div>
								<div class="col-sm-12">
									<a href="berita.php" class="btn btn-danger btn-sm">
										<i class="fa fa-arrow-left"></i> Kembali
									</a>
									<button class="btn btn-sm btn-primary" type="submit" name="btn_edit">
										<i class="fa fa-check"></i> Edit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    CKEDITOR.replace( 'editor' );
</script>
<?php include 'footer.php'; ?>