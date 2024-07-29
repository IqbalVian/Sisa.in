<?php

include("config.php");
// cek apakah tombol daftar sudah berfungsi 
if (isset($_POST['enter'])) {
    if (isset($_GET['username'])) {
        $id = $_GET['username'];
        $tab = $_POST['kategori_pengeluaran'];
        $nom = $_POST['item_pengeluaran'];
        $targ = $_POST['nominal_pengeluaran'];
        $cuan= $_POST['kuantitas_pengeluaran'];

        // membuat query
        $q = "UPDATE pengeluaran SET kategori_pengeluaran='$tab', item_pengeluaran='$nom' , nominal_pengeluaran='$targ' , kuantitas_pengeluaran= $cuan WHERE username = '$id'";
        $query = pg_query($q);
        // apakah query sudah berhasil simpan
        if ($query == TRUE) {
            // jika sudah berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: home2.php?status=sukses&action=edit');
        } else {
            // jika gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: home2.php?status=gagal&action=edit');
        }
    }

    // ambil data dari formulir

} else {
    die("Akses dilarang...");
}
