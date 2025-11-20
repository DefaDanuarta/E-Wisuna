<?php
    error_reporting(0);
    session_start();
    if (empty($_SESSION['login']=='admin' || $_SESSION['login']=='petugas') ) {
        header("location:../errors/not_found.php");
    }
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        switch ($page) {
            case 'tanggapan':
                include '../layouts/header.php';
                include 'data_tanggapan.php';
                include '../layouts/footer_stick.php';
                break;

            case 'pengaduan':
                include 'data_pengaduan.php';
                break;

            case 'petugas':
                include 'data_petugas.php';
                break;
            
            case 'masyarakat':
                include 'data_masyarakat.php';
                break;

            default:
                echo "tak da";
                break;
        }
    } else {
        include '../layouts/header.php';
        include 'home.php';
        include '../layouts/footer_fix.php';
    }
?>