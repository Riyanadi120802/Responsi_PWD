<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'fitur.php';

$NIS = $_GET["id_Siswa"];

if (hapus($NIS) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'tampilMHS.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'tampilMHS.php';
		</script>
	";
}
