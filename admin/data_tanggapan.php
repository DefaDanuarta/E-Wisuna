<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <div class="col-md-6 my-auto">
                <div class="mt-4 mb-4">
                    <div class="justify">
                        <h5 class="app-brand-text text-body fw-medium mb-1">Selamat datang <?php echo "$_SESSION[login] $_SESSION[nama_petugas]" ?></h5>
                        <h2 class="app-brand-text text-body fw-bolder ">Tabel Data Tanggapan</h2>
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
                            <h3 class="app-brand-text text-body fw-bolder">Data Tanggapan</h3>
                            <h6 class="card-subtitle text-muted">Berikut adalah tanggapan dari petugas</h6>
                        </div>
                    </div>
                    <p class="text-muted mb-2">Opsi Lainnya : </p>
                    <div>
                        <!-- export -->
                        <a href="export_tanggapan.php" type="button" class="btn rounded-pill btn-outline-info" fdprocessedid="uv3qr4"><span class="tf-icons bx bx-printer" target="_blank"></span>&nbsp; Print</a>
                    </div>
                    <!-- style table -->
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>NIK</th>
                                    <th>JUDUL</th>
                                    <th>TANGGAPAN</th>
                                    <th>ID PENANGGAP</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include '../config/koneksi.php';
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_tanggapan a INNER JOIN tbl_pengaduan b ON a.id_pengaduan=b.id_pengaduan ORDER BY tgl_tanggapan asc");
                                while ($data = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['tgl_tanggapan'] ?></td>
                                        <td><?php echo $data['nik'] ?></td>
                                        <td><?php echo $data['judul_laporan'] ?></td>
                                        <td><?php echo $data['tanggapan'] ?></td>
                                        <td><?php echo $data['id_petugas'] ?></td>
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
                                            <!-- triger hapus -->
                                            <button type="button" class="btn btn-sm rounded-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $data['id_tanggapan'] ?>"><span class="tf-icons bx bx-trash"></span></button>

                                            <!-- hapus modal -->
                                            <div class="modal fade" id="hapusModal<?php echo $data['id_tanggapan'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold" id="modalCenterTitle">WARNING!!!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- forum untuk menghapus data -->
                                                        <form action="edit_data.php" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_tanggapan" value="<?php echo $data['id_tanggapan'] ?>">
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
                                                                <button type="submit" class="btn rounded-pill btn-outline-danger" name="hapus_tanggapan">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
            <!-- card tabel tutup -->
        </div>
    </div>
</div>