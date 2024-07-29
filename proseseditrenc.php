<?php

include("config.php");
// cek apakah tombol daftar sudah berfungsi 
if (isset($_POST['enter'])) {
    if (isset($_GET['username'])) {
        $id = $_GET['username'];
        $tab = $_POST['kategori_rencana'];
        $nom = $_POST['item_rencana'];
        $targ = $_POST['nominal_rencana'];
    

        // membuat query
        $q = "UPDATE rencana SET kategori_rencana='$tab', item_rencana='$nom' , nominal_rencana='$targ'  WHERE username = '$id'";
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
