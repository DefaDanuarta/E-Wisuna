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
            break;

        default:
            mysqli_query($koneksi, "DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id_pengaduan'");
            header('location:index.php');
            break;
    }
}

// TIMOT aokwaokwoaw
// if(isset($_POST['hapus'])){
//     $id_pengaduan = $_POST['id_pengaduan'];

//    $q_1="DELETE FROM tbl_pengaduan WHERE id_pengaduan='$id_pengaduan'";
//     $query_hapus = mysqli_query($koneksi, $q_1);


//     if (is_file('../assets/img_2/'.$data['foto'])) {
//         unlink('../assets/img_2/'.$data['foto']);
//         header('location:index.php');
//     } else if ($query_hapus){
//         unlink('../assets/img_2/'.$data['foto']);
//         header('location:index.php');
//     }
// } 
?>