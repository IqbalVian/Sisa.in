<?php
include("config.php");

if(isset($_POST['enter'])){

	$id = strtolower($_POST['username']);
	$kategori_pemasukan = $_POST['kategori_pemasukan'];
	$nominal_pemasukan = $_POST['nominal_pemasukan'];

	
  $query = pg_query("INSERT INTO pemasukan(username, kategori_pemasukan, nominal_pemasukan) VALUEs ('$id','$kategori_pemasukan','$nominal_pemasukan')");

	
	if( $query==TRUE ) {
		
		header('Location: home.php?status=sukses');
	} else {
		
		header('Location: home.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>