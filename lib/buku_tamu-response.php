<?php
include '../config/koneksi.php';

function anti_injection($data){

	global $mysqli;
	$filter = $mysqli->real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));

	return $filter;

}

$pengirim = anti_injection($_POST['nama']);
$email = anti_injection($_POST['email']);
$komentar = anti_injection($_POST['komentar']);
$tanggal = date('Y-m-d H:i:s');

$error = array();
if(strlen($pengirim)<2){ // If length is less than 4 it will output JSON error.
    $error['nama'] =  'Mohon Isi Nama Lengkap!';
}

if(strlen($email)<2){ // If length is less than 4 it will output JSON error.
    $error['email'] =  'Mohon Isi Nama Lengkap!';
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error['email_invalid'] = 'Mohon Isi Dengan Email Yang Valid!';
}

if (strlen($komentar)==0) {
	$error['komentar'] = 'Isilah komentar';
}

if (count($error) > 1) {
	echo json_encode(array('type'=>'error','label'=>'all'));
} elseif (count($error)==1) {
	if (isset($error['nama'])) {
		echo json_encode(array('type'=>'error','label'=>'nama'));
	}

	if (isset($error['komentar'])) {
		echo json_encode(array('type'=>'error','label'=>'komentar'));
	}

	if (isset($error['email'])) {
		echo json_encode(array('type' => 'error','label'=>'email' ));
	} elseif (isset($error['email_invalid'])) {
		echo json_encode(array('type' => 'error','label'=>'email_invalid' ));
	}
} elseif (count($error)==0) {
	$send_qry = $mysqli->query("INSERT INTO buku_tamu VALUES('','$pengirim','$email','$komentar','tidak','$tanggal')");
	if (!$send_qry) {
		$output = array('type' => 'invalid', 'message' => $mysqli->error);
	} else {
		$output = array('type' => 'sukses');
	}
	echo json_encode($output);
}
