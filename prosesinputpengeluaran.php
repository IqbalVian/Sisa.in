<?php
include("config.php");

if(isset($_POST['enter'])){

	$id = strtolower($_POST['username']);
	$kategori_pengeluaran = $_POST['kategori_pengeluaran'];
	$item_pengeluaran = $_POST['item_pengeluaran'];
    $nominal_pengeluaran = $_POST['nominal_pengeluaran'];
    $kuantitas_pengeluaran = $_POST['kuantitas_pengeluaran'];

	
  $query = pg_query("INSERT INTO pengeluaran (username ,kategori_pengeluaran, item_pengeluaran, nominal_pengeluaran, kuantitas_pengeluaran) VALUEs ('$id','$kategori_pengeluaran','$item_pengeluaran','$nominal_pengeluaran','$kuantitas_pengeluaran')");

	
	if( $query==TRUE ) {
		
		header('Location: home2.php?status=sukses');
	} else {
		
		header('Location: home2.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>