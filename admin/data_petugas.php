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
                        <h5 class="app-brand-text text-body fw-medium mb-1">Anda login sebagai <?php echo "$_SESSION[login]" ?> bernama <?php echo "$_SESSION[nama_petugas]" ?></h5>
                        <h2 class="app-brand-text text-body fw-bolder ">Tabel Data Petugas</h2>
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
                            <h3 class="app-brand-text text-body fw-bolder">Data Petugas</h3>
                            <h6 class="card-subtitle text-muted">Berikut adalah data konco yang terdaftar</h6>
                        </div>
                    </div>

                    <div class="position-relative">
                        <p class="text-muted mb-2">Opsi Lainnya : </p>
                        <div class="d-flex justify-content-between mb-2">
                            <!-- form search -->
                            <form action="data_petugas.php" method="GET">
                                <input type="text" name="cari" class="form-control" value="<?php if (isset($_GET['cari'])) {
                                                                                                echo $_GET['cari'];
                                                                                            } ?>">
                                <button type="submit" class="btn  btn-icon btn-outline-info" fdprocessedid="uv3qr4" style="position: absolute; left: 220px; top: 30px;"><span class="bx bx-search-alt-2" target="_blank"></span></button>
                            </form>
                            <!-- // form search // -->
                            <div>
                                <!-- export -->
                                <a href="export_petugas.php" type="button" class="btn rounded-pill btn-icon btn-outline-info" fdprocessedid="uv3qr4"><span class="tf-icons bx bx-printer" target="_blank"></span></a>
                                <!-- trigger Tambah Petugas -->
                                <button type="button" class="btn rounded-pill btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahdata"> Tambah Data </button>
                                <!-- modal tambah petugas -->
                                <div class="modal fade" id="tambahdata" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Tambah Data Petugas</strong></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <!-- forum daftar -->
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Masukan Nama Anda</label>
                                                        <input type="text" class="form-control" name="nama" id="name" placeholder="Masuka Nama Anda" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <!-- baru -->
                                                        <label for="uname" class="form-label">Masukan Username Anda</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon11">@</span>
                                                            <input type="text" class="form-control" placeholder="Username" name="username" id="uname" aria-label="Username" aria-describedby="basic-addon11" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 position-relative">
                                                        <label for="password-input" class="form-label">Masukan Password Anda</label>
                                                        <!-- baru -->
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" id="password-input" name="password" placeholder="············" aria-describedby="toggle-password" required>
                                                            <span id="toggle-password" class="input-group-text cursor-pointer btn-sm">Show</span>
                                                        </div>
                                                        <!-- script untuk hide dan show password -->
                                                        <script>
                                                            const passwordInput = document.getElementById('password-input');
                                                            const togglePasswordButton = document.getElementById('toggle-password');

                                                            togglePasswordButton.addEventListener('click', function() {
                                                                if (passwordInput.type === 'password') {
                                                                    passwordInput.type = 'text';
                                                                    togglePasswordButton.textContent = 'Hide';
                                                                } else {
                                                                    passwordInput.type = 'password';
                                                                    togglePasswordButton.textContent = 'Show';
                                                                }
                                                            });
                                                        </script>
                                                    </div>
                                                    <label for="nomor" class="form-label">Masukan Nomor Telfon Anda</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon11">+ 62</span>
                                                        <input type="number" class="form-control" placeholder="..." name="nomor" id="nomor" aria-label="nomor" aria-describedby="basic-addon11" required>

                                                    </div>
                                                    <label for="nomor" class="text-muted form-text">Data Ini Tidak Akan Disebarluaskan</label>
                                                    <div class="mt-3 mb-3">
                                                        <label for="status" class="form-label">Daftar Sebagai :</label>
                                                        <select id="status" class="form-control" name="level" required>
                                                            <option value="petugas">Petugas</option>
                                                            <option value="admin">Admin</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn rounded-pill btn-primary" name="kirim" href="index.php?page=petugas">Daftar</button>
                                                </div>
                                            </form>
                                            <?php
                                            include '../config/koneksi.php';
                                            if (isset($_POST['kirim'])) {
                                                $nama = $_POST['nama'];
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);
                                                $username = $_POST['username'];
                                                $no_telp = $_POST['nomor'];
                                                $level = $_POST['level'];

                                                // query untuk memasukan data dari form ke data base
                                                $query = mysqli_query($koneksi, "INSERT INTO tbl_petugas VALUES ('','$nama','$username','$password','$no_telp','$level')");
                                                if ($query) {
                                                    header('location:index.php?page=petugas');
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- style table -->
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID PETUGAS</th>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>TELFON</th>
                                    <th>JABATAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                if (isset($_GET['cari'])) {
                                    $pencarian = $_GET['cari'];
                                    $query_cari = "SELECT * FROM tbl_petugas WHERE id_petugas LIKE '%" . $pencarian . "%' or nama_petugas LIKE '%" . $pencarian . "%' or username LIKE '%" . $pencarian . "%' or telpon LIKE '%" . $pencarian . "%' or level LIKE '%" . $pencarian . "%'";
                                } else {
                                    $query_cari = "SELECT * FROM tbl_petugas";
                                }

                                // $sql = $_GET [$query_cari];
                                $tampil = mysqli_query($koneksi, $query_cari);
                                $query = mysqli_query($koneksi, "SELECT * FROM tbl_petugas ");
                                while ($data = mysqli_fetch_array($tampil)) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['id_petugas'] ?></td>
                                        <td><?php echo $data['nama_petugas'] ?></td>
                                        <td><?php echo $data['username'] ?></td>
                                        <td><?php echo $data['telpon'] ?></td>
                                        <td><?php echo $data['level'] ?></td>
                                        <td>
                                            <!-- triger hapus -->
                                            <button type="button" class="btn btn-sm rounded-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $data['id_petugas'] ?>"><span class="tf-icons bx bx-trash"></span></button>

                                            <!-- hapus modal -->
                                            <div class="modal fade" id="hapusModal<?php echo $data['id_petugas'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold" id="modalCenterTitle">WARNING!!!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- forum untuk menghapus data -->
                                                        <form action="edit_data.php" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_petugas" value="<?php echo $data['id_petugas'] ?>">

                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>Apakah anda yakin akan <strong>MENGHAPUS : </strong></p>
                                                                        <strong><?php echo $data['nama_petugas'] ?> </strong>dengan jabatan <strong><?php echo $data['level'] ?></strong> secara <b>PERMANEN ?</b>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn rounded-pill btn-outline-secondary" data-bs-dismiss="modal"> Cancel </button>
                                                                <button type="submit" class="btn rounded-pill btn-outline-danger" name="hapus_petugas">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
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