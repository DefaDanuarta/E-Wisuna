<?php
include '../config/koneksi.php';

//YUTUP
if (isset($_POST['hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan WHERE id_pengaduan = '$id_pengaduan'");
    $data = mysqli_fetch_array($query);

    switch ($query) {
        case is_file('../assets/img_2/' . $data['foto']):
            unlink('../assets/img_2/' . $data['foto']);
            mysqli_query($koneksi, "DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id_pengaduan'");
            header('location:index.php');
            echo "<script> alert ('Data Berhasil di Hapus') </script>";
            break;

        default:
            mysqli_query($koneksi, "DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id_pengaduan'");
            header('location:index.php?page=pengaduan');
            break;
    }
}

//YUTUP
if (isset($_POST['hapus_tanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    $query = mysqli_query($koneksi, "DELETE  FROM tbl_tanggapan WHERE id_tanggapan = '$id_tanggapan'");
    if ($query) {
        header('location:index.php?page=tanggapan');
    }
}


//YUTUP
if (isset($_POST['hapus_masyarakat'])) {
    $nik = $_POST['nik'];
    $query = mysqli_query($koneksi, "DELETE  FROM tbl_masyarakat WHERE nik = '$nik'");
    if ($query) {
        header('location:index.php?page=masyarakat');
    }
}


//YUTUP
if (isset($_POST['hapus_petugas'])) {
    $id = $_POST['id_petugas'];
    $query = mysqli_query($koneksi, "DELETE  FROM tbl_petugas WHERE id_petugas = '$id'");
    if ($query) {
        header('location:index.php?page=petugas');
    }
}
?>