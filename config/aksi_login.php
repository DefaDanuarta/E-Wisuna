<?php
session_start();
include 'koneksi.php';


$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

if ($level == 'masyarakat') {
    $login = mysqli_query($koneksi, "SELECT * FROM  tbl_masyarakat WHERE username = '$username' and password= '$password'");
} else {
    $login = mysqli_query($koneksi, "SELECT*FROM  tbl_petugas WHERE username = '$username' AND password= '$password'");
}

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == 'admin') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "admin";
        header('location:../admin/');
    } else if ($data['level'] == 'petugas') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "petugas";
        header('location:../admin/');
    } else if ($data['level'] == 'masyarakat') {
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['login'] = "masyarakat";
        header('location:../masyarakat/');
    } 
}
else {
	echo "<script>
		alert('username / password anda tidak terdaftar');
		window.location='../index.php?page=login';
	</script>";
}
?>