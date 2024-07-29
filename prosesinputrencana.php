<?php
include("config.php");

if(isset($_POST['enter'])){

	$id = strtolower($_POST['username']);
	$kategori_rencana = $_POST['kategori_rencana'];
	$item_rencana = $_POST['item_rencana'];
    $nominal_rencana = $_POST['nominal_rencana'];

	
  $query = pg_query("INSERT INTO rencana (username, kategori_rencana, item_rencana, nominal_rencana) VALUEs ('$id', '$kategori_rencana','$item_rencana','$nominal_rencana')");

	
	if( $query==TRUE ) {
		
		header('Location: home2.php?status=sukses');
	} else {
		
		header('Location: home2.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>