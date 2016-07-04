<?php
include '../config/koneksi.php';

function anti_injection($data){
	global $mysqli;
	$filter = $mysqli->real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));

	return $filter;

}

$nama_lengkap = anti_injection($_POST['nama_lengkap']);
$email = anti_injection($_POST['email']);
$subjek = anti_injection($_POST['subjek']);
$isi_pesan = anti_injection($_POST['pesan']);
$tanggal = date('Y-m-d H:i:s');
$error = array();

if(strlen($nama_lengkap)<2){ // If length is less than 4 it will output JSON error.
    $error[] =  'Mohon Isi Nama Lengkap!';
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
    $error[] = 'Mohon Isi Dengan Email Yang Valid!';
}

if(strlen($subjek)<4){ // If length is less than 4 it will output JSON error.
    $error[] = 'Mohon Isi Subjek Dengan Anda!';
}

if(strlen($isi_pesan)<4){ // If length is less than 4 it will output JSON error.
    $error[] = 'Mohon Isi Subjek Dengan Anda!';
}

if (count($error) > 0 ) {
  	$output = json_encode($error);
  	echo $output;
}

if (count($error)==0) {
   	$output = json_encode(array('type'=>'success', 'text' => 'Validation Passed!'));
   	echo $output;
}

$query = "INSERT INTO pesan VALUES ('',
									'$email',
									'$nama_lengkap',
									'$subjek',
									'$isi_pesan',
									'belum_dibaca',
									'$tanggal')";

$send = $mysqli->query($query) or die ($mysqli->error);

if (!$send) {
	$output = json_encode(array('type'=>'error', 'text' => 'Terjadi Kesalahan!'));
    die($output);
} else {
	$output = json_encode(array('type'=>'message', 'text' => 'Terima Kasih! Pesan Anda Telah Kami Terima.'));
	die($output);
}