<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

	// ambil data dari formulir
    $nama = $_POST['nama'];
    $username = strtolower($_POST['username']);
    $telpon = $_POST['telpon'];
    $email = $_POST['email'];
	$pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    if ($pass !== $pass2)
    {
        header('Location: index.php?status=gagal');
        return false;
    }
	
	// buat query
    $query = pg_query("INSERT INTO users(nama, username, telpon, email, pass ) VALUEs ('$nama', '$username', '$telpon', '$email', '$pass')");

    if($query == TRUE){
	header('Location: index.php?status=sukses');
    }
	// apakah query simpan berhasil
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
	else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}

} else {
	die("Akses dilarang...");
}
?>
