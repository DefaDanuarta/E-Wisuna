<?php
include '../config/koneksi.php';
if (!empty($_GET['id_pengaduan'])) {
    $id = $_GET['id_pengaduan'];
    $query_ambil_tanggapan = mysqli_query($koneksi, "SELECT a.*, b.* FROM tbl_pengaduan a INNER JOIN tbl_tanggapan b ON a.id_pengaduan=b.id_pengaduan WHERE b.id_pengaduan=$id");
    $data= mysqli_fetch_array($query_ambil_tanggapan);

?>

<div class = "container">
    <div class = "row">
        <div class = "col-md-12 mt-4 mb-4"> 
            <!-- card buka -->
            <div class = "card">
                <!-- forum -->
                <form action="" method ="post">
                    <div class = "card-body">
                            <!-- headline -->
                        <div class ="app-brand justify-content-center mt-4 mb-4">
                            <div class = "text-center">
                                <h3 class="app-brand-text text-body fw-bolder">Tanggapan</h3>
                                <h6 class="card-subtitle text-muted">Tanggapan Dari Admin / Petugas Tentang Laporan Anda</h6>
                            </div>
                        </div>
                        

                        <!-- forum input -->
                        <div class = "mb-3">
                            <label for="judul" class ="form-label">Judul Laporan</label>
                            <input type="text" id = "judul" class = "form-control" value = "<?php echo $data ['judul_laporan'] ?>" readonly> 
                        </div>
                        <div class = "mb-3">
                            <label for="isi" class ="form-label">Isi Laporan</label>
                            <textarea class = "form-control" id="isi" readonly><?php echo $data ['isi_laporan'] ?></textarea>
                        </div>
                        <div class = "row mb-3">
                            <label for="foto" class ="form-label">Foto</label>
                            <img src="../assets/img_2/<?php echo $data ['foto'] ?>" style = "width : 400px;" alt="">
                        </div>
                        <div class = "mb-3">
                            <label for="tanggapan" class ="form-label">Tanggapan</label>
                            <textarea class = "form-control" id="tanggapan" readonly><?php echo $data ['tanggapan'] ?></textarea>
                        </div>
                    </div>
                    <div class = "card-footer">
                        <!-- button -->
                        <div class="d-grid mx-auto mb-2"> 
                            <a href="index.php" class = "btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </form>
                <!-- forum -->
            </div>
            <!-- card tutup -->
        </div>
    </div>
</div>
<?php } else {
    include '../errors/not_found.php';
}?>