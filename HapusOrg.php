<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'fitur.php';

$id = $_GET["id_org"];

if (hapusOrg($id) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'tampilOrg.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'tampilOrg.php';
		</script>
	";
}
