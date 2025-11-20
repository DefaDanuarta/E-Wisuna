<?php
error_reporting(0);
session_start();
include '../layouts/header.php';
include '../config/koneksi.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- sambutan -->
            <div class="col-md-6 mx-auto">
                <div class="mt-4 mb-4">
                    <div class=" text-center">
                        <h5 class="app-brand-text text-body fw-medium mb-0">Selamat datang <?php echo "$_SESSION[nama]" ?></h5>
                        <h2 class="app-brand-text text-body fw-bolder ">Ayo Mulai Melapor</h2>
                        <h6 class="card-subtitle text-muted">Laporkan keluhan anda pada kami dengan mengisi laporan singkat</h6>
                        <div class="content-center mt-3">
                            <a href="index.php?page=pengaduan" class="btn rounded-pill btn-primary w-100">Laporkan Keluhanmu</a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- card tabel buka -->
            <div class="mt-4 mb-4">
                <div class="card">
                    <!-- card body buka -->
                    <div class="card-body">
                        <!-- headline -->
                        <div class="app-brand justify-content-center mt-3 mb-3">
                            <div class="text-center">
                                <h3 class="app-brand-text text-body fw-bolder">Riwayat Laporan</h3>
                                <h6 class="card-subtitle text-muted">Laporan yang telah anda kirimkan ke admin</h6>
                            </div>
                        </div>

                        <p class="text-muted mb-2">Opsi Lainnya : </p>
                        <div class="d-flex justify-content-between mb-2">
                            <!-- form search -->
                            <form action="home.php" method="GET">
                                <input type="text" name="cari" class="form-control" value="<?php if (isset($_GET['cari'])) {echo $_GET['cari'];} ?>">
                                <button type="submit" class="btn  btn-icon btn-outline-info" fdprocessedid="uv3qr4" style="position: absolute; left: 245px; top: 141px;"><span class="bx bx-search-alt-2" target="_blank"></span></button>
                            </form>
                        </div>
                        <!-- style table -->
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JUDUL</th>
                                        <th>Alamat</th>
                                        <th>ISI LAPORAN</th>
                                        <th>FOTO</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nik = $_SESSION['nik'];
                                    $no = 1;
                                    if (isset($_GET['cari'])) {
                                        $pencarian = $_GET['cari'];
                                        $query_cari = "SELECT * FROM tbl_pengaduan  WHERE judul_laporan LIKE '%" . $pencarian . "%' or alamat_laporan LIKE '%" . $pencarian . "%' ";
                                    } else {
                                        $query_cari = "SELECT * FROM tbl_pengaduan WHERE nik = '$nik' ORDER BY id_pengaduan ASC";
                                    }

                                                                      
                                    // $query_input = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan WHERE nik = '$nik' ORDER BY id_pengaduan ASC");
                                    $tampil = mysqli_query($koneksi,$query_cari);
                                    while ($data = mysqli_fetch_array($tampil)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul_laporan'] ?></td>
                                            <td><?php echo $data['alamat_laporan'] ?><br></td>
                                            <td width="100px"><?php echo $data['isi_laporan'] ?></td>
                                            <td><img src="../assets/img_2/<?php echo $data['foto'] ?>" width="50px"></td>
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
                                                <!-- triger detail -->
                                                <button type="button" class="btn btn-sm rounded-pill btn-outline-info" data-bs-toggle="modal" data-bs-target="#lihatModal<?php echo $data['id_pengaduan'] ?>"> Lihat Detail </button>

                                                <!-- memunculkan lihat tanggapan saat ditanggapi -->
                                                <?php
                                                if ($data['status'] == 'selesai') {
                                                    echo "<a href='index.php?page=tanggapan&id_pengaduan=$data[id_pengaduan]' class='btn btn-sm rounded-pill btn-primary'>Lihat Tanggapan</a>";
                                                }
                                                ?>

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
                                                <!-- modal detail -->
                                                <div class="modal fade" id="lihatModal<?php echo $data['id_pengaduan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="modalCenterTitle">DETAILS</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- forum untuk menampilkan data -->
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
                                                                            <img src="../assets/img_2/<?php echo $data['foto'] ?>" alt="" width="300px">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="col-md-4 modal-text">Status</label>
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
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- modal hapus -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- style table -->
                    </div>
                    <!-- card body tutup -->
                </div>
            </div>
            <!-- card tabel tutup -->
        </div>
    </div>
</div>