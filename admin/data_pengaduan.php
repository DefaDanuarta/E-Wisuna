<?php
session_start();
include '../layouts/header.php';
include '../config/koneksi.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="col-md-6 my-auto">
                <div class="mt-4 mb-4">
                    <div class="justify">
                        <h5 class="app-brand-text text-body fw-medium mb-1">Selamat datang <?php echo "$_SESSION[login] $_SESSION[nama_petugas]" ?></h5>
                        <h2 class="app-brand-text text-body fw-bolder ">Tabel Data Pengaduan</h2>
                        <h6 class="card-subtitle text-muted">Selamat Bekerja Sampe Elek <?php echo "$_SESSION[nama_petugas]" ?></h6>
                    </div>
                </div>
            </div>
            <!-- card tabel buka -->
            <div class="card">
                <!-- card body buka -->
                <div class="card-body">
                    <!-- headline -->
                    <div class="app-brand justify-content-center mt-3 mb-3">
                        <div class="text-center">
                            <h3 class="app-brand-text text-body fw-bolder">Data Pengaduan</h3>
                            <h6 class="card-subtitle text-muted">Laporan yang telah dikirim oleh masyarakat</h6>
                        </div>
                    </div>

                    <div class="position-relative">
                        <p class="text-muted mb-2">Opsi Lainnya : </p>
                        <div class="d-flex justify-content-between mb-2">
                            <!-- form search -->
                            <form action="data_pengaduan.php" method="GET">
                                <input type="text" name="cari" class="form-control" value="<?php if (isset($_GET['cari'])) {
                                                                                                echo $_GET['cari'];
                                                                                            } ?>">
                                <button type="submit" class="btn  btn-icon btn-outline-info" fdprocessedid="uv3qr4" style="position: absolute; left: 220px; top: 30px;"><span class="bx bx-search-alt-2" target="_blank"></span></button>
                            </form>
                        </div>

                        <!-- style table -->
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>NAMA</th>
                                        <th>JUDUL</th>
                                        <th>ALAMAT</th>
                                        <th>LAPORAN</th>
                                        <th>FOTO</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    if (isset($_GET['cari'])) {

                                        $pencarian = $_GET['cari'];
                                        $query_cari = "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_masyarakat b ON a.nik=b.nik WHERE judul_laporan LIKE '%" . $pencarian . "%' or nama LIKE '%" . $pencarian . "%' or tgl_pengaduan LIKE '%" . $pencarian . "%' or alamat_laporan LIKE '%" . $pencarian . "%' ";
                                    } else {
                                        $query_cari = "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan asc";
                                    }

                                    // $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan asc");
                                    $tampil = mysqli_query($koneksi, $query_cari);
                                    while ($data = mysqli_fetch_array($tampil)) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['tgl_pengaduan'] ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['judul_laporan'] ?></td>
                                            <td><?php echo $data['alamat_laporan'] ?></td>
                                            <td><?php echo $data['isi_laporan'] ?></td>
                                            <td><img src="../assets/img_2/<?php echo $data['foto'] ?>" alt="" width="50px"></td>
                                            <td>
                                                <?php
                                                if ($data['status'] == 'proses') {
                                                    echo "<span class = 'badge rounded-pill bg-label-warning'>Proses</span>";
                                                } else if ($data['status'] == 'selesai') {
                                                    echo "<span class = 'badge rounded-pill bg-label-success'>Selesai</span>";
                                                } else {
                                                    echo "<span class = 'badge rounded-pill bg-label-danger'>Menunggu</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($data['status'] != 'selesai') { ?>
                                                    <!-- trigger verifikasi -->
                                                    <button type="button" class="btn btn-sm rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi<?php echo $data['id_pengaduan'] ?>"> Verifikasi </button>
                                                    <!-- modal verifikasi -->
                                                    <div class="modal fade" id="verifikasi<?php echo $data['id_pengaduan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel2">Verifikasi <strong><?php echo $data['judul_laporan'] ?></strong></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="" method="post">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>">
                                                                        <div class="row g-2">
                                                                            <div class="col my-auto">
                                                                                <p class="text-muted mb-0 ">Status : </p>
                                                                                <select name="status" id="" class="form-control">
                                                                                    <option value="proses">Proses</option>
                                                                                    <option value="selesai">Selesai</option>
                                                                                    <option value="0">Tolak</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn rounded-pill btn-primary" name="update">Update</button>
                                                                    </div>
                                                                </form>
                                                                <?php
                                                                if (isset($_POST['update'])) {
                                                                    $id_pengaduan = $_POST['id_pengaduan'];
                                                                    $status = $_POST['status'];

                                                                    $query = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status='$status' WHERE id_pengaduan = '$id_pengaduan'");
                                                                    echo "<script> alert ('Data Berhasil di Verifikasi');
                                                            window.location = 'index.php?page=pengaduan'; </script>";
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>


                                                <?php
                                                if ($data['status'] == 'proses') { ?>
                                                    <!-- trigger beri tanggapan -->
                                                    <button type="button" class="btn btn-sm rounded-pill btn-outline-dark" data-bs-toggle="modal" data-bs-target="#tanggapan<?php echo $data['id_pengaduan'] ?>"> Beri tanggapan </button>
                                                    <!-- modal tanggapan -->
                                                    <div class="modal fade" id="tanggapan<?php echo $data['id_pengaduan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel2">Tanggapan Untuk <strong><?php echo $data['judul_laporan'] ?></strong></h5><br>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>" readonly>
                                                                        <div class="row mb-3">
                                                                            <label for="" class="col-md-4 modal-text">Tanggal</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" name="tgl_pengaduan" class="form-control" value="<?php echo $data['tgl_pengaduan'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="" class="col-md-4 modal-text">Judul Laporan</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="" class="col-md-4 modal-text">Alamat Laporan</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['alamat_laporan'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="" class="col-md-4 modal-text">Isi Laporan</label>
                                                                            <div class="col-md-8">
                                                                                <textarea name="isi_laporan" class="form-control" value="<?php echo $data['isi_laporan'] ?>" cols="10" rows="5" readonly><?php echo $data['isi_laporan'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="" class="col-md-4 modal-text">Foto</label>
                                                                            <div class="col-md-8">
                                                                                <img src="../assets/img_2/<?php echo $data['foto'] ?>" alt="" width="400px">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="edit_tanggapan" class="col-md-4 modal-text">Tanggapan</label>
                                                                            <div class="col-md-8">
                                                                                <textarea name="tanggapan" id="edit_tanggapan" class="form-control" cols="10" rows="5" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn rounded-pill btn-primary" name="kirim_tanggapan">Kirim Tanggapan</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <!-- triger detail -->
                                                <button type="button" class="btn btn-sm rounded-pill btn-outline-info" data-bs-toggle="modal" data-bs-target="#lihatModal<?php echo $data['id_pengaduan'] ?>"> Lihat Detail </button>
                                                <!-- modal detail -->
                                                <div class="modal fade" id="lihatModal<?php echo $data['id_pengaduan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="modalCenterTitle">DETAILS</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- forum untuk menampilkan data -->
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $data['id_pengaduan'] ?>" readonly>
                                                                <div class="row mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Tanggal</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="tgl_pengaduan" class="form-control" value="<?php echo $data['tgl_pengaduan'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Judul Laporan</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['judul_laporan'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Alamat Laporan</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" name="judul_laporan" class="form-control" value="<?php echo $data['alamat_laporan'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Isi Laporan</label>
                                                                    <div class="col-md-8">
                                                                        <textarea name="isi_laporan" class="form-control" value="<?php echo $data['isi_laporan'] ?>" cols="10" rows="5" readonly><?php echo $data['isi_laporan'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Foto</label>
                                                                    <div class="col-md-8">
                                                                        <img src="../assets/img_2/<?php echo $data['foto'] ?>" alt="" width="300px">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="col-md-4 modal-text">Proses</label>
                                                                    <?php
                                                                    if ($data['status'] == 'proses') {
                                                                        echo "<span class = 'badge rounded-pill bg-label-warning'>Proses</span>";
                                                                    } else if ($data['status'] == 'selesai') {
                                                                        echo "<span class = 'badge rounded-pill bg-label-success'>Selesai</span>";
                                                                    } else {
                                                                        echo "<span class = 'badge rounded-pill bg-label-danger'>Menunggu</span>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- triger hapus -->
                                                <button type="button" class="btn btn-sm rounded-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $data['id_pengaduan'] ?>"><span class="tf-icons bx bx-trash"></span></button>
                                                <!-- hapus modal -->
                                                <div class="modal fade" id="hapusModal<?php echo $data['id_pengaduan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="modalCenterTitle">WARNING!!!</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- forum untuk menghapus data -->
                                                            <form action="edit_data.php" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_pengaduan" value="<?php echo $data['id_pengaduan'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            Apakah anda yakin akan <strong>MENGHAPUS : </strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <strong><?php echo $data['judul_laporan'] ?></strong> secara <strong>PERMANEN</strong> ?
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn rounded-pill btn-outline-secondary" data-bs-dismiss="modal"> Cancel </button>
                                                                    <button type="submit" class="btn rounded-pill btn-outline-danger" name="hapus">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    //proses input tanggapan dari modal tanggapan
                                    if (isset($_POST['kirim_tanggapan'])) {
                                        $id_pengaduan = $_POST['id_pengaduan'];
                                        $id_petugas = $_SESSION['id_petugas'];
                                        $judul_laporan = $_POST['judul_laporan'];
                                        $tanggal = date("Y-m-d");
                                        $tanggapan = $_POST['tanggapan'];

                                        $query = mysqli_query($koneksi, "INSERT INTO tbl_tanggapan VALUES ('','$id_pengaduan','$tanggal','$judul_laporan','$tanggapan','$id_petugas') ");
                                        if ($tanggapan != NULL) {
                                            $update = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan' ");
                                        } else {
                                            $update = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status='proses' WHERE id_pengaduan='$id_pengaduan' ");
                                        }

                                        echo "<script>
															alert('Data telah ditanggapi');
															window.location='index.php?page=pengaduan';
														</script>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- style table -->
                    </div>
                    <!-- card body tutup -->
                </div>
                <!-- card tabel tutup -->
            </div>
        </div>
    </div>
    <?php
    include '../layouts/footer_stick.php';
    ?>