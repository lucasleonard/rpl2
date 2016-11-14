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

if(!isset($_COOKIE['loginD'])) { // YG BENER loginD
    header('location: index.php');
}

$sqlD = "SELECT * FROM dosen WHERE nama ='".$_COOKIE['nomerD']."'";
$resultD = mysqli_query($link, $sqlD);
$rowD= mysqli_fetch_array($resultD);
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
                        <a href="./jadwal-kegiatan.php">Jadwal Kegiatan</a>
                    </li>
                    <li>
                        <a href="./jadwal-sidang.php">Jadwal Sidang</a>
                    </li>
                    <li>
                        <a href="./proses.php?cmd=logout">Logout, <?php echo $rowD['nama']; ?> </a>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>BIODATA DOSEN</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-6 col-lg-2">
                                <img src="./img/default.jpg" width='156px' height='209px'>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <strong>
                                NPK : <?php echo $rowD['npk']; ?><br>
                                Nama : <?php echo $rowD['nama']; ?><br>
                                </strong>
                            </div>
                            <div class="col-xs-6 col-lg-7">
                                <div class="alert alert-success">
                                    <h3 class="text-center"><br/><br/><strong>PERIODE: <!--<?php echo $rowP['nama']; ?>--> </strong><br/><br/><br/></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    </br>

                    <form class="form-signin" action="proses.php?cmd=login" method="POST">
                        <table class="table table-hover table-bordered">
                          <tr class="info">
                            <th><center>Hari</th>
                            <th><center>Senin</th>
                            <th><center>Selasa</th>
                            <th><center>Rabu</th>
                            <th><center>Kamis</th>
                            <th><center>Jumat</th>
                            <th><center>Sabtu</th>
                          </tr>
                          <tr>
                            <td><center>Tanggal</td>
                            <td><center>DD-MM</td>
                            <td><center>DD-MM</td>
                            <td><center>DD-MM</td>
                            <td><center>DD-MM</td>
                            <td><center>DD-MM</td>
                            <td><center>DD-MM</td>
                          </tr>
                          <tr>
                            <td><center>07.00 - 08.30</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>08.30 - 10.00</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>10.00 - 11.30</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>11.30 - 13.00</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>13.00 - 14.30</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>14.30 - 16.00</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                          <tr>
                            <td><center>16.00 - 17.30</td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                            <td><center><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                          </tr>
                        </table>
                        <button class="btn btn-lg btn-primary" type="submit">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

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