<!-- koneksi php -->
<?php include './config/koneksi.php'; ?>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="authentication-inner">
                <div class="card">
                    <form action="" method="post">
                        <!-- badan dari card -->
                        <div class="card-body">
                            <!-- headline -->
                            <div class="app-brand justify-content-center mt-3 mb-3">
                                <h3 class="app-brand-text text-body fw-bolder mt-3">Daftar Akun</h3>
                            </div>

                            <!-- forum daftar -->
                            <div class="mt-3 mb-3">
                                <label for="nik" class="form-label">Masukan NIK Anda</label>
                                <input type="number" class="form-control" name="nik" placeholder="Masuka NIK Anda" id="nik" required>
                                <label for="nik" class="text-muted form-text">Data Ini Tidak Akan Disebarluaskan</label>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Masukan Nama Anda</label>
                                <input type="text" class="form-control" name="nama" id="name" placeholder="Masuka Nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <!-- baru -->
                                <label for="uname" class="form-label">Masukan Username Anda</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">@</span>
                                    <input type="text" class="form-control" placeholder="Username"  name="username" id="uname" aria-label="Username" aria-describedby="basic-addon11" required>
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
                            <div class="mt-3 mb-3">
                                <!-- baru -->
                                <label for="nomor" class="form-label">Masukan Nomor Telfon Anda</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">+ 62</span>
                                    <input type="number" class="form-control" placeholder="..." name="nomor" id="nomor" aria-label="nomor" aria-describedby="basic-addon11" required>
                                    
                                </div>
                                <label for="nomor" class="text-muted form-text">Data Ini Tidak Akan Disebarluaskan</label>
                            </div>
                            <!-- php + label -->
                            <?php
                            if (isset($_POST['kirim'])) {
                                $nik = $_POST['nik'];
                                $nama_lengkap = $_POST['nama'];
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);
                                $username = $_POST['username'];
                                $no_telp = $_POST['nomor'];
                                $level = 'masyarakat';

                                // query untuk memasukan data dari form ke data base
                                $query = mysqli_query($koneksi, "INSERT INTO tbl_masyarakat VALUES ('$nik','$nama_lengkap','$username','$password','$no_telp','$level')");

                                // alert
                                if ($query) {
                            ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        Data Anda Sudah Berhasil Terdaftar <br> <a href="index.php?page=login"> Ke Halaman Login</a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- kaki card -->
                        <div class="card-footer">
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" name="kirim">Daftar</button>
                            </div>
                            <p class="text-center mb-0 ">
                                <span>Sudah Memiliki Akun?</span>
                                <a href="index.php?page=login">Login Disini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>