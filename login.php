<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="authentication-inner">
                <div class="card">
                    <form action="./config/aksi_login.php" method="post">
                        <!-- badan dari card -->
                        <div class="card-body">
                            <!-- headline -->
                            <div class="app-brand justify-content-center mt-3 mb-3">
                                <h3 class="app-brand-text text-body fw-bolder mt-3">Log In</h3>
                            </div>

                            <!-- forum login -->
                            <div class="mb-3">
                                <!-- baru -->
                                <label for="username" class="form-label">Masukan Username Anda</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">@</span>
                                    <input type="text" class="form-control" placeholder="Username"  name="username" id="username" aria-label="Username" aria-describedby="basic-addon11" required>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <div class="d-flex justify-content-between">
                                    <label for="password-input" class="form-label">Masukan Password Anda</label>
                                    <a href="errors/under_maintenance.php" class="card-text justify-content-end"><small>Lupa Password ?</small></a>
                                </div>

                                <div class="input-group">
                                    <input type="password" class="form-control" id="password-input" name="password" placeholder="············" aria-describedby="toggle-password" required>
                                    <span id="toggle-password" class="input-group-text cursor-pointer btn-sm">Show</span>
                                </div>

                                <script>
                                    const passwordInput = document.getElementById('password-input');
                                    const togglePasswordButton = document.getElementById('toggle-password');

                                    togglePasswordButton.addEventListener('click', function() {
                                        if (passwordInput.type === 'password') {
                                            passwordInput.type = 'text';
                                            togglePasswordButton.textContent = "Hide";
                                        } else {
                                            passwordInput.type = 'password';
                                            togglePasswordButton.textContent = "Show";
                                        }
                                    });
                                </script>
                            </div>
                            <div class="mb-0">
                                <label for="level" class="form-label">Login Sebagai</label>
                                <select id="level" class="form-control" name="level" required>
                                    <option value="masyarakat">Masyarakat</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                        </div>
                        <!-- kaki card -->
                        <div class="card-footer">
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="sumbit" name="login">Login</button>
                            </div>
                            <p class="text-center mb-0 ">
                                <span>Belum Memiliki Akun?</span>
                                <a href="index.php?page=registrasi">Daftar Disini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>