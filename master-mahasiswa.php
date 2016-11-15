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

$sql = "SELECT * FROM mahasiswa ";
$result = mysqli_query($link, $sql);

if(!$result) {
    echo "SQL ERROR: ".$sql;
}


if(!isset($_COOKIE['login'])) {
    header('location: index.php');
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
                    <form class="form-signin" action="proses.php?cmd=inputM" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal">
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">NRP:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nrp" placeholder="NRP">
                                    </div>
                                  </div></br></br>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" placeholder="Nama">
                                    </div>
                                  </div></br></br>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Ponsel:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="ponsel" placeholder="08977xxx">
                                    </div>
                                  </div></br></br>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Judul:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="judul" placeholder="Judul Tugas Akhir">
                                    </div>
                                  </div></br></br>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">NPK 1:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="npk1" placeholder="NPK Dosen Pembimbing 1">
                                    </div>
                                  </div></br></br>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">NPK 2:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="npk2" placeholder="NPK Dosen Pembimbing 2">
                                    </div>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel-group">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Prasyarat</div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="1" checked>1. Buku TA Sebanyak 4 Eksemplar</label>
                                        </div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="2" checked>2. Proposal TA Berserata form TA 4 Eksemplar</label>
                                        </div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="3" checked>3. Karya Tulis TA Sebanyak 4 Eksemplar</label>
                                        </div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="4" checked>4. Fotokopi Kartu Studi</label>
                                        </div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="5" checked>5. Fotokopi Bimbingan TA</label>
                                        </div>
                                        <div class="checkbox">
                                          <label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="pers[]" value="6" checked>6. Fotokopi Sertifikat LSTA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-lg btn-primary" type="submit" value="Simpan">
                    </form>

                    </br></br>

                    <table class="table table-hover table-bordered">
                        <tr class="info">
                            <th rowspan="2"><center>No</th>
                            <th rowspan="2"><center>NRP</th>
                            <th rowspan="2"><center>Nama</th>
                            <th rowspan="2"><center>No. Ponsel</th>
                            <th rowspan="2"><center>Pembimbing 1</th>
                            <th rowspan="2"><center>Pembimbing 2</th>
                            <th colspan="6"><center>Prasyarat</th>
                        </tr>
                        <tr class="info">
                            <th><center>1</th>
                            <th><center>2</th>
                            <th><center>3</th>
                            <th><center>4</th>
                            <th><center>5</th>
                            <th><center>6</th>
                        </tr>
                        <?php
                        $hitung = 1;
                        while ($row = mysqli_fetch_object($result)) {
                            echo "<tr>";
                            echo "<td>" . $hitung. "</td>";
                            echo "<td>" . $row->nrp . "</td>";
                            echo "<td>" . $row->nama . "</td>";
                            echo "<td>" . $row->hp . "</td>";
                            $sqlDosen = "SELECT nama  from dosen WHERE dosen.npk=(SELECT npk1 FROM `mahasiswa` WHERE nrp= ".$row->nrp.")";
                            $resultDosen = mysqli_query($link, $sqlDosen);
                            if(!$resultDosen) {
                                echo "SQL ERROR: ".$sqlDosen;
                            }
                            while ($row1 = mysqli_fetch_object($resultDosen)) {
                                echo "<td>" . $row1->nama . "</td>";
                            }

                            $sqlDosen2 = "SELECT nama  from dosen WHERE dosen.npk=(SELECT npk2 FROM `mahasiswa` WHERE nrp= ".$row->nrp.")";
                            $resultDosen2 = mysqli_query($link, $sqlDosen2);
                            if(!$resultDosen2) {
                                echo "SQL ERROR: ".$sqlDosen2;
                            }
                            while ($row2 = mysqli_fetch_object($resultDosen2)) {
                                echo "<td>" . $row2->nama . "</td>";
                            }

                            echo "<td>" . $row->pra1 . "</td>";
                            echo "<td>" . $row->pra2 . "</td>";
                            echo "<td>" . $row->pra3 . "</td>";
                            echo "<td>" . $row->pra4 . "</td>";
                            echo "<td>" . $row->pra5 . "</td>";
                            echo "<td>" . $row->pra6 . "</td>";
                            echo "<tr>";
                            $hitung = $hitung +1;
                        } ?>
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
