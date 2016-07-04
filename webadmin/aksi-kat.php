<?php
include '../config/koneksi.php';

session_start();

$act = $_GET['act'];

switch ($act) {
	case 'tambah':

		if (trim($_POST['kategori'])=="") {
			$message = 'Tidak ada data yang ditambahkan';
		}

		$kategori = $_POST['kategori'];

		if (!isset($message)) {
			$insert_sql = "INSERT INTO kategori VALUES ('','$kategori')";

			$insert_qry = $mysqli->query($insert_sql);

			if ($insert_qry) {
				echo "<script>alert('Data Berhasil Ditambah'); window.location = 'kategori.php'</script>";
			} else {
				echo $mysqli->error;
			}
		} else {

			echo "<script>alert('Data Gagal Ditambah'); window.location = 'kategori.php'</script>";

		}

		break;

	case 'edit':

		$kode = $mysqli->real_escape_string($_GET['id']);

		$kategori = $mysqli->real_escape_string($_POST['kategori']);

		$edit_sql = "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = '$kode'";

		$edit_qry = $mysqli->query($edit_sql);

		if ($edit_qry) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location = 'kategori.php'</script>";
		} else {
			echo "Gagal mengupdate data".$mysqli->error;
		}

		break;

	case 'hapus':

		$jum_sql = "SELECT id_berita FROM berita WHERE id_kategori = '".$mysqli->real_escape_string($_GET['id'])."'";

		$jum_qry = $mysqli->query($jum_sql);

		$jum_berita = $jum_qry->num_rows;

		if ($jum_berita > 0) {
			if ($_SESSION['level']=='admin') {
				header('location: hapus-kat.php?id='.$_GET['id']);
			} else {
				echo "<script>alert('Maaf, dalam kategori ini terdapat berita dari penulis lain!'); window.location = 'kategori.php'</script>";
			}

		} else {
			$del_kat_qry = "DELETE FROM kategori WHERE id_kategori = '".$_GET['id']."'";

			$del_kat = $mysqli->query($del_kat_qry);

			if ($del_kat) {
				echo "<script>alert('Data Berhasil Dihapus'); window.location = 'kategori.php'</script>";
			} else {
				echo $mysqli->error;
			}
		}

		break;

	default:

		header('location: kategori.php');

		break;
}