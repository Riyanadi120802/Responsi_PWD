<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'fitur.php';

$kode = $_GET["Kode_Guru"];

if (hapusGuru($kode) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'tampilGuru.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'tampilGuru.php';
		</script>
	";
}
