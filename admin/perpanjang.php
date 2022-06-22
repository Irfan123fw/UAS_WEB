<?php
$id_transaksi	= isset($_GET['id_trans']) ? $_GET['id_trans'] : "";
$judul			= isset($_GET['judul']) ? $_GET['judul'] : "";
$tgl_kembali	= isset($_GET['kembali']) ? $_GET['kembali'] : "";
$lambat			= isset($_GET['lambat']) ? $_GET['lambat'] : "";



if($lambat > 7) {
	echo "<script>alert('Anda Sudah lewat dari maksimal batas pengembalian, silahkan kembalikan buku kemudian pinjam kembali!'); window.location = 'transaksi.php'</script>";

} else {
	include "conn.php"; 

	$pecah			= explode("-",$tgl_kembali);
	$next_7_hari	= mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
	$hari_next		= date("Y-m-d", $next_7_hari);


	$update_tgl_kembali=mysql_query("UPDATE trans_pinjam SET tgl_kembali='$hari_next' WHERE id='$id_transaksi'");

	if ($update_tgl_kembali) {
		echo "<script>alert('Peminjaman buku berhasil diperpanjang!'); window.location = 'transaksi.php'</script>";
	} else {
		echo "<script>alert('Peminjaman buku gagal diperpanjang!'); window.location = 'transaksi.php'</script>";
	}
}
?>