<?php
include '../config/koneksi.php';
?>
<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "mt-3 mb-3">
                <div class = "card">
                    <form action="" method = "post" enctype="multipart/form-data">
                        <!-- badan dari card -->
                        <div class = "card-body">
                            <!-- headline -->
                            <div class ="app-brand justify-content-center mt-3 mb-3">
                                <div class = "text-center">
                                    <h3 class="app-brand-text text-body fw-bolder">Forum Pengaduan</h3>
                                    <h6 class="card-subtitle text-muted">Kirimkan keluhan anda kepada kami dengan mengisi laporan singkat</h6>
                                </div>
                            </div>

                            <!-- forum daftar -->
                            <div class = "mt-3 mb-3">
                                <label for="judul" class = "form-label">Judul Laporan</label>
                                <input 
                                type="text"
                                class="form-control"
                                name="judul_laporan"
                                placeholder = "Masukan Judul laporan pengaduan"
                                id = "judul" required>
                            </div>
                            <div class = "mb-3">
                                <label for="addres" class = "form-label">Alamat Laporan</label>
                                <div id= "" class="form-text mt-0">Masukan Nama Daerah + Detail Lokasi</div>
                                <textarea class="form-control"
                                name="alamat_laporan"
                                id = "addres" required 
                                cols="5" 
                                rows="2"></textarea>
                            </div>
                            <div class = "mb-3">
                                <label for="isi" class = "form-label">Isi Laporan</label>
                                <textarea class="form-control"
                                name="isi_laporan"
                                id = "isi" required 
                                cols="5" 
                                rows="5"></textarea>
                            </div>
                            <div class = "mb-0">
                                <label for="pict" class ="form-label">Masukan Foto</label>
                                <input 
                                type="file" 
                                id = "pict" 
                                class = "form-control" 
                                name = "foto" required> 
                            </div>
                        </div>
                        
                        <!-- kaki card -->
                        <div class = "card-footer">
                            <?php
                                $tanggal = date("Y-m-d");
                                if (isset($_POST['kirim'])) {
                                    $nik = $_SESSION['nik'];
                                    $judul_laporan = $_POST['judul_laporan'];
                                    $isi_laporan = $_POST['isi_laporan'];
                                    $alamat_laporan = $_POST['alamat_laporan'];
                                    $status = 0;
                                    $foto = $_FILES ['foto']['name'];
                                    $tmp = $_FILES ['foto']['tmp_name'];
                                    $lokasi = '../assets/img_2/';
                                    $nama_foto = rand(0,999).'-'.$foto;

                                    move_uploaded_file($tmp, $lokasi.$nama_foto);
                                    $query_input = mysqli_query($koneksi,"INSERT INTO tbl_pengaduan VALUES ('','$tanggal','$nik','$judul_laporan','$alamat_laporan','$isi_laporan','$nama_foto', '$status')");

                                    // notifikasi sudah terkirim
                                    if($query_input){
                                        ?>
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                Laporan Anda Telah Terkirim
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                Laporan Anda Gagal Terkirim
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                            <div class = "mb-3">
                                <button type="submit" class="btn rounded-pill btn-primary " name = "kirim">Kirim</button>
                                <button type="reset" class="btn rounded-pill btn-outline-secondary">Reset</button>
                            </div>
                            <a href="index.php">Kembali Ke Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>