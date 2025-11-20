<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wisuna</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- style dari template -->

    <!-- LOGO UNTUK TABS -->
    <link rel="shortcut icon" href="../assets/img_2/e-wisuna.svg"></link>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="../assets/js/config.js"></script>
</head>

<body>
    <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- logo + tulisan -->
            <a href="index.php" class="navbar-brand d-flex align-items-center gap-2">
                <!-- logo -->
                <img src="../assets/img_2/e-wisuna.svg" alt="Logoh" class="brand-image" style="opacity: .8" width="30px">
                <h5 class="app-brand-text text-body fw-bold mb-0">E-Wisuna.</h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2" aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-ex-2">
                <div class="navbar-nav gap-2">
                    <?php
                    // session_start();
                    if ($_SESSION['login'] == 'admin') { ?>
                        <a class="nav-link" href="../config/aksi_logout.php">Log out</a>

                    <?php } else if ($_SESSION['login'] == 'petugas') { ?>
                        <a class="nav-link" href="../config/aksi_logout.php">Log out</a>

                    <?php } else if ($_SESSION['login'] == 'masyarakat') { ?>
                        <a class="nav-link" href="../config/aksi_logout.php">Log out</a>

                    <?php } else { ?>
                        <a class="nav-link" href="index.php?page=home">Home</a>
                        <a class="nav-link" href="index.php?page=login">Login</a>
                        <a class="nav-link" href="index.php?page=registrasi">Daftar Akun</a>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </nav>