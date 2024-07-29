<?php
    session_start();
    include("config.php");
    // cek apakah tombol login sudah diklik atau blum?
    if(isset($_POST['login'])){

	// ambil data dari formulir
	$username = strtolower($_POST['username']);
	$pass = $_POST['pass'];

    $hasil = pg_query("select * from users where username = '$username' AND pass ='$pass'");
    $row = pg_num_rows($hasil);
    if($row == 1) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $username;
    
        header('location: home.php');
    }
    else header('location: index.php?ket=gagal');
    }
?>