<?php include 'header.php'; ?>
<?php
$sql_admin = "SELECT
admin.username,
admin.password,
admin.nama_lengkap,
admin.foto,
admin.deskripsi,
admin.level
FROM
admin
WHERE
id_admin = '$_SESSION[id_admin]'";

$qry_admin = $mysqli->query($sql_admin);
$admin = $qry_admin->fetch_assoc();

if ($admin['level'] == "admin") {
	$level_akses = 'Administrator';
} elseif($admin['level'] == "author") {
	$level_akses = 'Penulis';
}
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
if (isset($_POST['btn_simpan'])) {
	$message=array();

	//VALIDASI FOTO
    if (!empty($_FILES['foto']['name'])) {
    	$file_name_foto = $_FILES['foto']['name'];
    	$filename_foto = explode(".", $file_name_foto);
    	$file_extension_foto = $filename_foto[count($filename_foto)-1];
    	$file_weight_foto = $_FILES['foto']['size'];
    	$target_path_foto="../images/author/";
    	$file_max_weight = 2048000; //batas maksimum ukuran file
    	$ok_ext = array('jpg','png','gif','jpeg','JPG','PNG','GIF','JPEG'); //type file yang diperbolehkan

    	if (in_array($file_extension_foto, $ok_ext)) {
    		if ($file_weight_foto <= $file_max_weight) {
    			move_uploaded_file($_FILES['foto']['tmp_name'], $target_path_foto . $file_name_foto);
    		} else {
    			$message[] = "<b>Ukuran File</b> terlalu besar!";
    		}
    	} else {
    		$message[] = "<b>Type File</b> tidak diperbolehkan";
    	}

    } else {
    	$file_name_foto = $admin['foto'];
    }

    if (trim($_POST['txt_username'])=="") {
    	$message[] = "Username tidak boleh kosong!";
    }
    if (trim($_POST['txt_nmlengkap'])=="") {
    	$message[] = "Nama Lengkap tidak boleh kosong!";
    }

    //VALIDASI PASSWORD BARU
    if (!empty($_POST['txt_passwordbaru'])) {
    	if (trim($_POST['txt_passwordlama'])=="") {
    		$message[] = "Password Lama Kosong";
    	} elseif(!password_verify($_POST['txt_passwordlama'], $admin['password'])) {
    		$message[] = "Password Lama Salah";
    	} else {
    		if (!empty($_POST['txt_passwordbaru'])) {
    			$password = password_hash($_POST['txt_passwordbaru'],PASSWORD_DEFAULT);
				if (trim($_POST['txt_kpassword'])=="") {
					$message[] = "Konfirmasi Password tidak boleh kosong!";
    			} elseif(!password_verify($_POST['txt_kpassword'],$password)){
    				$messsage[] = "Konfirmasi Password tidak sesuai!";
    			}
    		}
    	}
    } else {
    	$password = $admin['password'];
    }

    $txt_password = $password;
    $txt_username = $mysqli->real_escape_string($_POST['txt_username']);
    $txt_nmlengkap = $mysqli->real_escape_string($_POST['txt_nmlengkap']);
    $txt_deskripsi = $mysqli->real_escape_string($_POST['txt_deskripsi']);

    if (count($message)==0) {

    	$sql_update = "UPDATE admin SET username = '$txt_username',
    									nama_lengkap = '$txt_nmlengkap',
    									password = '$txt_password',
    									deskripsi = '$txt_deskripsi',
    									foto = '$file_name_foto',
    									deskripsi = '$txt_deskripsi'
    					WHERE id_admin = '$_SESSION[id_admin]'";

    	$qry_update = $mysqli->query($sql_update);
    	if (!$qry_update) {
    		die ($mysqli->error);
    	} else { ?>
    				<div class="alert alert-success alert-dismissable fade in">
            			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            			<?php
            			echo "Data Berhasil Diperbaharui.";
            			?>
        			</div>

<?php

		}
    } else {
    	$Num=0;
        foreach ($message as $index => $show_message) {
            $Num++;
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
							<h2 class="page-header"><i class="fa fa-user"></i> Pengaturan Profil</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-sm-4">
									<div class="form-group">
										<div class="profile-pic">
											<img src="../images/author/<?php echo $admin['foto']; ?>">
										</div>
										<input type="file" name="foto">
										<label class="text-muted">Ukuran gambar maks. 2 MB dengan type: jpg, png, gif</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control input-sm" name="txt_username" value="<?php echo $admin['username']; ?>">
									</div>
									<div class="form-group">
										<label>Nama Lengkap</label>
										<input type="text" class="form-control input-sm" name="txt_nmlengkap" value="<?php echo $admin['nama_lengkap']; ?>" maxlength="30">
									</div>
									<div class="form-group">
										<label>Deskripsi</label>
										<textarea class="form-control input-sm" name="txt_deskripsi" rows="5"><?php echo $admin['deskripsi']; ?></textarea>
									</div>
									<hr>
									<div class="form-group">
										<label>Level Akses</label><br>
										<label class="text-muted"><?php echo $level_akses; ?></label>
									</div>
									<div class="form-group">
										<label>Password Lama</label>
										<input type="password" class="form-control input-sm" name="txt_passwordlama">
									</div>
									<div class="form-group">
										<label>Password Baru</label>
										<input type="password" class="form-control input-sm" name="txt_passwordbaru">
									</div>
									<div class="form-group">
										<label>Konfirmasi Password</label>
										<input type="password" class="form-control input-sm" name="txt_kpassword">
									</div>
								</div>
								<div class="col-sm-12">
									<a href="beranda.php" class="btn btn-danger btn-sm">
										<i class="fa fa-times"></i> Batal
									</a>
									<button class="btn btn-sm btn-primary" type="submit" name="btn_simpan">
										<i class="fa fa-check"></i> Simpan
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
<?php include 'footer.php'; ?>