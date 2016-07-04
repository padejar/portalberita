<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['id_admin']);
unset($_SESSION['nm_admin']);
echo "<script>alert('Anda telah keluar dari Halaman Administrator'); window.location = 'index.php'</script>";