<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Tugas Akhir</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
session_start();
require './db.php';

$sqlM = "SELECT * FROM mahasiswa ";
$resultM = mysqli_query($link, $sqlM);
if(!$resultM) {
    echo "SQL ERROR: ".$sqlM;
}
$sqlD = "SELECT * FROM dosen ";
$resultD = mysqli_query($link, $sqlD);
if(!$resultD) {
    echo "SQL ERROR: ".$sqlD;
}
$sqlJ = "SELECT * FROM jadwal_sidang_tugas_akhir ";
$resultJ = mysqli_query($link, $sqlJ);
if(!$resultJ) {
    echo "SQL ERROR: ".$sqlJ;
}

if(!isset($_COOKIE['login'])) {
    header('location: jadwal-kegiatan.php');
}
if(!isset($_SESSION['notif'])) {
            echo "";
}
else { ?>
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php
    echo $_SESSION['notif']."</br>";
    unset($_SESSION['notif']); ?>
    </div>
    <?php
} 

$sqlM = "SELECT * FROM admin WHERE nama='".$_COOKIE['nomer']."'";
$resultM = mysqli_query($link, $sqlM);
$rowM = mysqli_fetch_array($resultM);
?>

<body>

    <div class="brand">Sistem Tugas Akhir</div>
    <div class="address-bar">Universitas Surabaya</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./master-mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li>
                        <a href="./master-periode.php">Periode</a>
                    </li>
                    <li>
                        <a href="./master-sidang.php">Jadwal Sidang</a>
                    </li>
                    <li>
                        <a href="./proses.php?cmd=logout">Logout, <?php echo $rowM['nama']; ?> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <form class="form-signin" action="proses.php?cmd=filter" method="POST">
                        <div class="row">
                            <form class="form-inline">
                              <div class="form-group">
                                <p class="col-sm-2 control-label">Nama: </p>
                              </div>
                              <div class="form-group col-sm-4">
                                <input type="text" class="form-control" id="nama" placeholder="Nama">
                              </div>
                              <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                    </form>

                    </br></br>

                    <table class="table table-hover table-bordered">
                        <tr class="info">
                            <th><center>Hari/Tanggal</th>
                            <th><center>Ruang</th>
                            <th><center>Jam</th>
                            <th><center>NRP</th>
                            <th><center>Nama</th>
                            <th><center>No. Ponsel</th>
                            <th><center>Judul TA</th>
                            <th><center>Penguji 1</th>
                            <th><center>Penguji 2</th>
                            <th><center>Ketua</th>
                            <th><center>Sekertaris</th>
                        </tr>
                        <!--<?php
                        $hitung = 1;
                        while ($row = mysqli_fetch_object($result)) {
                            echo "<tr>";
                            echo "<td>" . $row->tanggal. "</td>";   //AMBIL DARI JADWAL SIDANG
                            echo "<td>" . $row->ruang . "</td>";    //AMBIL DARI JADWAL SIDANG
                            echo "<td>" . $row->jam . "</td>";      //AMBIL DARI JADWAL SIDANG
                            echo "<td>" . $row->nrp . "</td>";      //AMBIL DARI JADWAL SIDANG
                            echo "<td>" . $row->nama . "</td>";     //AMBIL DARI MAHASISWA (LINK DARI NRP JADWAL SIDANG)
                            echo "<td>" . $row->hp . "</td>";       //AMBIL DARI MAHASISWA (LINK DARI NRP JADWAL SIDANG)
                            echo "<td>" . $row->judul_ta . "</td>"; //AMBIL DARI MAHASISWA (LINK DARI NRP JADWAL SIDANG)
                            echo "<td>" . $row->anggota . "</td>";  //BELON ADA PENGUJI 1
                            echo "<td>" . $row->anggota . "</td>";  //BELOM ADA PENGUJI 2
                            echo "<td>" . $row->namaK . "</td>";    //BELOM ADA KETUA (DIAMBIL DARI DOSEN)
                            echo "<td>" . $row->namaS . "</td>";    //BELOM ADA SEKERTARIS (DIAMBIL DARI DOSEN)
                            echo "<tr>";
                            $hitung = $hitung +1;
                        } ?>-->
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="pull-right">Faishal Hendaryawan | Fadhil Amadan | Lucas Leonard | Putu Aditya</p>
                    <p class="pull-left">&copy; 2016 | Desain dan Implementasi Sistem</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
