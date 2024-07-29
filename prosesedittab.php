<?php

include("config.php");
// cek apakah tombol daftar sudah berfungsi 
if (isset($_POST['enter'])) {
    if (isset($_GET['username'])) {
        $id = $_GET['username'];
        $tab = $_POST['nama_tabungan'];
        $nom = $_POST['nominal_tabungan'];
        $targ = $_POST['nominal_target'];

        // membuat query
        $q = "UPDATE tabungan SET nama_tabungan='$tab', nominal_tabungan='$nom' , nominal_target='$targ' WHERE username = '$id'";
        $query = pg_query($q);
        // apakah query sudah berhasil simpan
        if ($query == TRUE) {
            // jika sudah berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: home.php?status=sukses&action=edit');
        } else {
            // jika gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: home.php?status=gagal&action=edit');
        }
    }

    // ambil data dari formulir

} else {
    die("Akses dilarang...");
}
