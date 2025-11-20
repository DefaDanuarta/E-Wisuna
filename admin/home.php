<?php
include '../config/koneksi.php';

$masyarakat = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat");
$jmlh_masyarakat = mysqli_num_rows($masyarakat);

$pengaduan = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan");
$jmlh_pengaduan = mysqli_num_rows($pengaduan);

$petugas = mysqli_query($koneksi, "SELECT * FROM tbl_petugas");
$jmlh_petugas = mysqli_num_rows($petugas);

$tanggapan = mysqli_query($koneksi, "SELECT * FROM tbl_tanggapan");
$jmlh_tanggapan = mysqli_num_rows($tanggapan);
?>

<!-- container -->
<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col my-auto">
            <div class="mt-4 mb-4">
                <div class="justify">
                    <h2 class="app-brand-text text-body fw-bolder">Dashboard <?php echo "$_SESSION[login]" ?></h2>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg   order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary display-6 fw-bold mb-0">Selamat datang <?php echo "$_SESSION[login] $_SESSION[nama_petugas]" ?></h5>
                                <p class="text-subtitle text-muted">Selamat Bekerja sampe elek <?php echo "$_SESSION[nama_petugas]" ?></p>

                                <figure class="mt-4">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">Stop losing your mind over peope that don't mind losing you</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Kanye's Diary <cite title="Source Title">Instagram post</cite>
                                    </figcaption>
                                </figure>

                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <?php
            if ($_SESSION['login'] == 'admin') { ?>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">MASYARAKAT</h5>
                            <p class="card-text"><?php echo $jmlh_masyarakat; ?> Orang</p>
                            <a href="index.php?page=masyarakat" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">PETUGAS</h5>
                            <p class="card-text"><?php echo $jmlh_petugas; ?> Petugas</p>
                            <a href="index.php?page=petugas" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">PENGADUAN</h5>
                            <p class="card-text"><?php echo $jmlh_pengaduan; ?> Laporan</p>
                            <a href="index.php?page=pengaduan" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">TANGGAPAN</h5>
                            <p class="card-text"><?php echo $jmlh_tanggapan; ?> Tanggapan</p>
                            <a href="index.php?page=tanggapan" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-muted">MASYARAKAT</h5>
                            <p class="card-text text-muted" ><?php echo $jmlh_masyarakat; ?> Orang</p>
                            <a href="index.php?page=masyarakat" class="btn btn-primary w-100 disabled">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-muted">PETUGAS</h5>
                            <p class="card-text text-muted"><?php echo $jmlh_petugas; ?> Petugas</p>
                            <a href="index.php?page=petugas" class="btn btn-primary w-100 disabled">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">PENGADUAN</h5>
                            <p class="card-text"><?php echo $jmlh_pengaduan; ?> Laporan</p>
                            <a href="index.php?page=pengaduan" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold ">TANGGAPAN</h5>
                            <p class="card-text"><?php echo $jmlh_tanggapan; ?> Tanggapan</p>
                            <a href="index.php?page=tanggapan" class="btn btn-primary w-100">Lihat Data</a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>

        </div>
    </div>
</div>
<!-- //container// -->