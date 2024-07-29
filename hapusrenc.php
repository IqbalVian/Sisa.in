<?php

include("config.php");
// cek apakah tombol daftar sudah berfungsi 
    if (isset($_GET['username'])) {
        $id= $_GET['username'];
        $ERPEEL =  pg_query("SELECT * FROM rencana where username = '$id'");
        $rpl  =  pg_fetch_array($ERPEEL, NULL, PGSQL_ASSOC);
        $lock = $rpl['item_rencana'];
        $query = pg_query("DELETE FROM rencana WHERE item_rencana = '$lock' ");

        if ($query == TRUE) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: home2.php?status=sukses&action=delete');
        } else {
            // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
            header('Location: home2.php?status=gagal&action=delete');
        }
    
    }else{
        header('Location: home2.php');
    }
    ?>