<?php

$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";
$dapat			= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah			= explode ("-", $dapat);
$id				= $pecah[0];
$buku			= $pecah[1];
$nama			= isset($_POST['nama']) ? $_POST['nama'] : "";
$ket			= isset($_POST['keterangan']) ? $_POST['keterangan'] : "";


if($buku=="" || $dapat == "") {
	echo "<script>alert('Anda Belum Memilih Buku!'); window.location = 'input-transaksi.php'</script>";
} elseif ($nama=="") {
	echo "<script>alert('Anda Belum Memilih Peminjam!'); window.location = 'input-transaksi.php'</script>";
} else {
	include "../conn.php";
    $jum = 1;
	$query=mysql_query("SELECT * FROM data_buku WHERE id = '$id'");
	while ($hasil=mysql_fetch_array($query)) {
	       $sisa = $hasil['jum_temp'];
           $tot = $sisa * $jum;
 
	} 
	
	if ($tot == 0) {
		echo "<script>alert('Stock Buku Habis, Harap tunggu pengembalian buku!'); window.location = 'input-transaksi.php'</script>";
	} else {
		$qt			= mysql_query("INSERT INTO trans_pinjam VALUES (null, '$buku', '$id', '$nama', '$tgl_pinjam', '$tgl_kembali', 'pinjam', '$ket')") or die ("Gagal Masuk".mysql_error());

		$qu			= mysql_query("UPDATE data_buku SET jum_temp=(jum_temp-1) WHERE id=$id ");

		if ($qt&&$qu) {
			echo "<script>alert('Transaksi Peminjaman Berhasil!'); window.location = 'transaksi.php'</script>";
		} else {
			echo "<<script>alert('Transaksi Gagal!'); window.location = 'transaksi.php'</script>";
		}
	}
}

?>
