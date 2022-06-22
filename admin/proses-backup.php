<?php
include "../conn.php";

$date=date('d-m-Y-g-i-s');
$file="backup@".$date.".sql";

$command = "mysqldump -u root db_perpus > backup/$file";

$backup=exec($command);



// header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=$file");
 
    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: $file ");
 
    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type:$file ");
 
   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("backup/".$file, 'r');
   $content = fread($fp, filesize('backup/'.$file));
   fclose($fp);
 
   // menampilkan isi file yang akan didownload
   echo $content;

if ($backup) {
echo "<script>alert('Berhasil Backup Database.Nama File = $file');</script>";
} else {
echo "<script>alert('Gagal Backup !');</script>";
}  


exit;



?>