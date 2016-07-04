<?php
include '../config/koneksi.php';

$data_qry = $mysqli->query("SELECT komentar_status FROM buku_tamu WHERE komentar_id = '$_GET[id]'") or die ($mysqli->error);
$data = $data_qry->fetch_assoc();

if ($data['komentar_status']=='tidak') {
	$update_qry = $mysqli->query("UPDATE buku_tamu SET komentar_status = 'ya' WHERE komentar_id = '$_GET[id]'");
} else {
	$update_qry = $mysqli->query("UPDATE buku_tamu SET komentar_status = 'tidak' WHERE komentar_id = '$_GET[id]'");
}

if (!$update_qry) {
	die("Error updating 'buku_tamu': ".$mysqli->error);
} else {
	header("location:buku-tamu.php");
}