<?php
include("config.php");

if(isset($_POST['enter'])){

	$id = strtolower($_POST['username']);
	$nama_tabungan = $_POST['nama_tabungan'];
	$nominal_tabungan = $_POST['nominal_tabungan'];
    $nominal_target = $_POST['nominal_target'];

	
  $query = pg_query("INSERT INTO tabungan (username, nama_tabungan, nominal_tabungan, nominal_target) VALUEs ('$id','$nama_tabungan','$nominal_tabungan','$nominal_target')");

	
	if( $query==TRUE ) {
		
		header('Location: home.php?status=sukses');
	} else {
		
		header('Location: home.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>