<?php
session_start();
require './db.php';
$cmd = $_GET['cmd'];

switch ($cmd) {
    case "login":
        $id = $_POST['ID'];
        $pswd = $_POST['pswd'];
        $jabatan = $_POST['jabatan'];

        /*---------- ADMIN ----------*/
        if($jabatan == 'admin'){
            $sql = "SELECT * FROM admin WHERE nama ='" . $id . "' "; //TABEL ADMIN
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) > 0) {
                if($pswd == $row['password']){
                    setcookie("nomer", $id, time() + 600);
                    setcookie("login", TRUE, time() + 600);
                    header("location: master-mahasiswa.php"); //HALAMAN ADMIN
                }
                else {
                    $_SESSION['notif'] = "<strong>MAAF!</strong> PASSWORD SALAH.";
                    header("location: index.php");
                }
            }
            else {
                $_SESSION['notif'] = "<strong>MAAF!</strong> USER TIDAK DITEMUKAN.";
                header("location: index.php");
            }
        }

        /*---------- DOSEN ----------*/
        if($jabatan == 'dosen'){
            $sqlD = "SELECT * FROM dosen WHERE nama ='" . $id . "' "; //TABEL DOSEN
            $resultD = mysqli_query($link, $sqlD);
            $rowD=  mysqli_fetch_array($resultD);
            if(mysqli_num_rows($resultD) > 0) {
                if($pswd == $rowD['password']){
                    setcookie("nomerD", $id, time() +600);
                    setcookie("loginD", TRUE, time() +600);
                    header("location: jadwal-kegiatan.php"); //HALAMAN DOSEN
                }
                else {
                    $_SESSION['notif'] = "<strong>MAAF!</strong> PASSWORD SALAH.";
                    header("location: index.php");
                }
            }
            else {
                $_SESSION['notif'] = "<strong>MAAF!</strong> USER TIDAK DITEMUKAN.";
                header("location: index.php");
            }
        }

        /*---------- KALEB ----------*/
        /*if($jabatan == 'kaleb'){
            $sqlK = "SELECT * FROM mahasiswa WHERE nrp ='" . $id . "' "; //TABEL KALEB
            $resultK = mysqli_query($link, $sqlK);
            $rowK =  mysqli_fetch_array($resultK);
            if(mysqli_num_rows($resultK) > 0) {
                if($pswd == $rowK['password']){
                    setcookie("nomerK", $id, time() +600);
                    setcookie("loginK", TRUE, time() +600);
                    header("location: jadwal-kegiatan.php"); //HALAMAN STAFF
                }
                else {
                    $_SESSION['notif'] = "<strong>MAAF!</strong> PASSWORD SALAH.";
                    header("location: index.php");
                }
            }
            else {
                $_SESSION['notif'] = "<strong>MAAF!</strong> USER TIDAK DITEMUKAN.";
                header("location: index.php");
            }
        }*/

        break;

    case "logoutM":
        setcookie("nomerM", $id, time() -1);
        setcookie("loginM", FALSE, time() -1);
        header('location: index.php');
        break;

    case "logoutD":
        setcookie("nomerD", $id, time() -1);
        setcookie("loginD", FALSE, time() -1);
        header('location: index.php');
        break;

    case "logout":
        setcookie("nomer", $id, time() -1);
        setcookie("login", FALSE, time() -1);
        header('location: index.php');
        break;

    case "inputM":
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $ponsel = $_POST['ponsel'];
        $judul = $_POST['judul'];
        $pers = $_POST['pers'];
        $npk1 = $_POST['npk1'];
        $npk2 = $_POST['npk2'];

        $per1 = 0;
        $per2 = 0;
        $per3 = 0;
        $per4 = 0;
        $per5 = 0;
        $per6 = 0;

        if(!empty($_POST['pers']))
        {
            foreach($_POST['pers'] as $chkval)
            {
                if($chkval == '1')
                {
                    $per1 = 1;
                }
                if($chkval == '2')
                {
                    $per2 = 1;
                }
                if($chkval == '3')
                {
                    $per3 = 1;
                }
                if($chkval == '4')
                {
                    $per4 = 1;
                }
                if($chkval == '5')
                {
                    $per5 = 1;
                }
                if($chkval == '6')
                {
                    $per6 = 1;
                }
            }
        }
        //echo $per1 .", ". $per2 .", ". $per3 .", ". $per4 .", ". $per5 .", ". $per6 .", ";

        $sql = "INSERT INTO mahasiswa (nrp, nama, hp, judul_ta, npk1, npk2, pra1, pra2, pra3, pra4, pra5, pra6)" . "VALUE ('" . $nrp . "', '" . $nama . "', '" . $ponsel . "', '".$judul."',  '". $npk1."', '". $npk2."','". $per1 ."', '". $per2 ."', '". $per3 ."', '". $per4 ."', '". $per5 ."', '". $per6 ."')";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            $_SESSION['notifSQL'] = "SQL ERROR.";
            header("Location: master-mahasiswa.php");
        }
        else {
            $_SESSION['notif'] = "DATA BERHASIL DI MASUKKAN.";
            header("Location: master-mahasiswa.php");
        }
        break;

    case "filter":  //BELOM SELESAI
        $nama = $_POST['nama'];
        break;

    case "periode": //BELOM SELESAI
        $buka = $_POST['buka'];
        $tutup = $_POST['tutup'];
        $nama = $_POST['nama'];
        $status = $_POST['status'];

        $cBuka = strtotime($buka);
        $cTutup = strtotime($tutup);

        $year = substr($buka, 0,4);
        $month=substr($buka,5,2);
        $day=substr($buka,8,2);
        echo $year ."</br>";
        echo $month ."</br>";
        echo $day ."</br>";

        $hBuka = date("l", $cBuka);     //NUNJUKIN HARI SENIN-MINGGU
        $hTutup = date("l", $cTutup);    //NUNJUKIN HARI SENIN-MINGGU
/*
        $sql = "INSERT INTO periode (tanggal_mulai, tanggal_akhir)" . "VALUE ('".$hBuka."', '".$cBuka."', '".$cTutup."')";
        $sql = "INSERT INTO periode (nama, buka, tutup, status)" . "VALUE ('".$nama."','".$cBuka."', '".$cTutup."', '".$status."')";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            $_SESSION['notifSQL'] = "SQL ERROR.";
            header("Location: master-periode.php");
        }
        else {
            $_SESSION['notif'] = "DATA BERHASIL DI MASUKKAN.";
            header("Location: master-periode.php");
        }
*/
        if($aktif == 1) {
            $sqlP = "SELECT * FROM periode WHERE status = 1";
            $resultP = mysqli_query($link, $sqlP);
            if (!$resultP) {
                $_SESSION['notifSQL'] = "SQL ERROR.";
                die(header('location: master-periode.php'));
            }
            else {
                $rowP = mysqli_fetch_array($resultP);
            }

            if(mysqli_num_rows($resultP) > 0) {
                $sqlEDIT = "UPDATE periode SET status = 0 WHERE id = ".$rowP['id'];
                $resultEDIT = mysqli_query($link, $sqlEDIT);
                if (!$resultEDIT) {
                    $_SESSION['notifSQL'] = "SQL ERROR.";
                    die(header('location: master-periode.php'));
                }
            }

            $sqlAKTIF = "INSERT INTO periode (nama, buka, tutup, status) " . "VALUE ('".$nama."','".$buka."', '".$tutup.", 1)";
            $resultAKTIF = mysqli_query($link, $sqlAKTIF);
            if (!$resultAKTIF) {
                $_SESSION['notifSQL'] = "SQL ERROR.";
                die(header('location: masterperiode.php'));
            }
            else {
                $_SESSION['notif'] = "DATA BERHASIL DI MASUKKAN.";
                header('location: master-periode.php');
            }
        }
        else {
            $sqlNONAKTIF = "INSERT INTO periode (nama, buka, tutup) " . "VALUE ('".$nama."','".$buka."', '".$tutup."')";
            $resultNONAKTIF  = mysqli_query($link, $sqlNONAKTIF );

            if (!$resultNONAKTIF ) {
                $_SESSION['notifSQL'] = "SQL ERROR.";
                die(header('location: master-periode.php'));
            }
            else {
                $_SESSION['notif'] = "DATA BERHASIL DI MASUKKAN.";
                header('location: master-periode.php');
            }
        }
        break;

    case "jamDosen":
        $jam = $_POST['jam'];
        $hitung = count($jam);
        $jamm ="";
        $sqlD = "SELECT * FROM dosen WHERE nama ='".$_COOKIE['nomerD']."'";
        $resultD = mysqli_query($link, $sqlD);
        $rowD= mysqli_fetch_array($resultD);
        for($i=0 ;$i < $hitung; $i++ ){
            $jamm= substr($jam[$i], 0,11);
            $tgl= substr($jam[$i], 12,10);

            $sql = "INSERT INTO jadwal_kegiatan_dosen (tgl, jam, npk) " . "VALUE ('".$tgl."', '".$jamm."', '".$rowD['npk']."')";
            $result = mysqli_query($link, $sql);
        }
        if (!$result ) {
            $_SESSION['notifSQL'] = "SQL ERROR.";
            die(header('location: jadwal-kegiatan.php'));
        }
        else {
            $_SESSION['notif'] = "DATA BERHASIL DI MASUKKAN.";
            header('location: jadwal-kegiatan.php');
        }
        break;

    default;
        die("UNKNOWN");
} ?>