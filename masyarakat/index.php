<?php
    session_start();
    if (empty($_SESSION['login']=='masyarakat')) {
        header("location:../errors/not_found.php");
    }

    
    if(isset($_GET['page'])){
        $page = $_GET['page'];

        switch ($page) {
            case 'tanggapan':
                include '../layouts/header.php';
                include 'tanggapan.php';
                break;

            case 'pengaduan':
                include '../layouts/header.php';
                include 'pengaduan.php';
                break;
            
            default:
                echo "tak da";
                break;
        }
    } else {
        include 'home.php'; 
    }
    include '../layouts/footer_stick.php';
    ?>