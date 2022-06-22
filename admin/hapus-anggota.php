<?php
include "conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM data_anggota WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'anggota.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'anggota.php'</script>";	
}
?>