<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><h3>PerPusWeb</h3></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
              
                <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
            <td width="200"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></td>
            </div>
          </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="<?php echo $_SESSION['gambar']; ?>" alt="profile"/>
             
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item"  href="admin.php">
                        <span><?=$_SESSION['fullname'] ?> </i></span>
                            </a>   
                        <a class="dropdown-item"  href="admin.php">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="ti-email"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
              <section class="panel">
                                            <header class="panel-heading">
                                                Pemberitahuan
                                            </header>
                                                <div class="panel-body" id="noti-box">
                                                <?php
                                                $tampil=mysql_query("select * from data_anggota order by id desc limit 1");
                                                while($data2=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data2['nama'];?></strong>, Telah terdaftar menjadi anggota perpustakaan.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                <?php
                                                $tampil=mysql_query("select * from user order by user_id desc limit 1");
                                                while($data3=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data3['fullname']; ?></strong>, Telah ditambahkan menjadi admin PerPusWeb yang baru. 
                                                    </div>
                                                <?php } ?>
                                                    
                                                <?php
                                                $tampil=mysql_query("select * from data_buku order by id desc limit 1");
                                                while($data4=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data4['judul']; ?></strong>, Buku bacaan baru yang ada di PerPusWeb.
                                                    </div>
                                                <?php } ?>
                                                   
                                                <?php
                                                $tampil=mysql_query("select * from pengunjung order by id desc limit 1");
                                                while($data5=mysql_fetch_array($tampil)){
                                                ?>   
                                                    <div class="alert alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data5['nama']; ?> </strong> Pengunjung baru di PerPusWeb.
                                                    </div>
                                                <?php } ?>
                                                </div>
                                        </section>
              </form>
            </div>
            
          </div>
          <!-- To do section tab ends -->
          <!-- chat tab ends -->
        </div>
      </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="ti-user mr-3"></i>
              <span class="menu-title">Anggota</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="anggota.php">Anggota</a></li>
                <li class="nav-item"> <a class="nav-link" href="input-anggota.php">Tambah Anggota</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="ti-book mr-3"></i>
              <span class="menu-title">Buku</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="buku.php">Data Buku</a></li>
                <li class="nav-item"><a class="nav-link"  href="input-buku.php">Tambah Buku</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="ti-id-badge mr-3  "></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="admin.php"> Admin</a></li>
                <li class="nav-item"> <a class="nav-link" href="input-admin.php"> Tambah Admin</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="transaksi.php"> Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="transaksi-kembali.php"> Pengembalian</a></li>
                <li class="nav-item"> <a class="nav-link"href="input-transaksi.php">Input  Pinjam</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="ti-file mr-3"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="laporan-anggota.php"> Anggota</a></li>
                <li class="nav-item"> <a class="nav-link" href="laporan-buku.php"> Buku</a></a></li>
                <li class="nav-item"> <a class="nav-link" href="laporan-pinjam.php">Pinjam</a></li>
                <li class="nav-item"> <a class="nav-link" href="laporan-kembali.php">kembali</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="backup.php">
            <i class="ti-server mr-3"></i>
              <span class="menu-title">Backup</span>
            </a>
          </li>
                                                </ul>
                                                </nav>


            <div class="main-panel">
                <div class="content-wrapper">
                    <form action="insert-buku.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                              <div class="col-sm-8">
                                  <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" placeholder="Judul Buku" required="" />
                              </div>
                              </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                              <div class="col-sm-8">
                                  <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off" placeholder="Pengarang" required="" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                              <div class="col-sm-8">
                                  <input name="th_terbit" type="text" id="th_terbit" class="form-control" autocomplete="off" placeholder="Tahun Terbit" required="" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                              <div class="col-sm-8">
                                  <input name="penerbit" type="text" id="penerbit" class="form-control" autocomplete="off" placeholder="Penerbit" required="" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
                              <div class="col-sm-8">
                                  <input name="isbn" type="text" id="isbn" class="form-control" autocomplete="off" placeholder="ISBN" required="" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-8">
                                  <input name="kategori" type="text" id="Kategori" class="form-control" autocomplete="off" placeholder="Kategori" required="" />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kode Kelas</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="kode_klas" id="kode_klas" >
                                  <option value=""> -- Pilih Salah Satu --</option>
                                  <option value="X"> X</option>
                                  <option value="XI"> XI</option>
                                  <option value="XII"> XII</option>
                                  </select>
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                              <div class="col-sm-8">
                                  <input name="jumlah_buku" type="text" id="jumlah_buku" class="form-control" autocomplete="off" placeholder="Jumlah Buku" required />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                              <div class="col-sm-8">
                                  <input name="lokasi" type="text" id="lokasi" class="form-control" autocomplete="off" placeholder="Lokasi Buku" required />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="asal" id="asal" required >
                                  <option value=""> -- Pilih Salah Satu --</option>
                                  <option value="Pembelian"> Pembelian</option>
                                  <option value="Sumbangan"> Sumbangan</option>
                                  <option value="Denda"> Denda</option>
                                  </select>
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Per Rak</label>
                              <div class="col-sm-8">
                                  <input name="jum_temp" type="text" id="jum_temp" class="form-control" autocomplete="off" placeholder="Jumlah Per Rak" required />
                              </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Input</label>
                              <div class="col-sm-8">
                                  <input name="tgl_input" type="text" id="tgl_input" class="form-control" autocomplete="off" value="<?php echo "".date("Y/m/d").""; ?>" readonly="readonly" />
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-8">
                                  <input name="nama_file" id="nama_file" type="file" />
                              </div>
                          </div>
                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-anggota.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                        </div>

                        
                    </form>
                </div>
            </div>

            <!-- plugins:js -->
            <script src="vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="vendors/chart.js/Chart.min.js"></script>
            <script src="vendors/datatables.net/jquery.dataTables.js"></script>
            <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
            <script src="js/dataTables.select.min.js"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="js/off-canvas.js"></script>
            <script src="js/hoverable-collapse.js"></script>
            <script src="js/template.js"></script>
            <script src="js/settings.js"></script>
            <script src="js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="js/dashboard.js"></script>
            <script src="js/Chart.roundedBarCharts.js"></script>
            <!-- End custom js for this page-->
            <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
            </script>
</body>

</html>
<?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>