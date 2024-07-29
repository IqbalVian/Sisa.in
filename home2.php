<?php
	include("config.php");
	session_start();
	$id = $_SESSION['id'];
	if(is_null($id)){header('location: login.php');}
	$query = pg_query("SELECT * FROM users where username = '$id'");
	$quer2y = pg_query("SELECT sum(nominal_pemasukan) FROM pemasukan where username = '$id'");
	$asu = pg_query($db, "SELECT sum(nominal_pengeluaran) FROM pengeluaran WHERE username = '$id'");
	$home = pg_fetch_array($query, NULL, PGSQL_ASSOC);
	$apa = pg_fetch_array($asu, NULL, PGSQL_ASSOC);
	$sapa = pg_fetch_array($quer2y, NULL, PGSQL_ASSOC);
	$apah = $sapa['sum'] - $apa['sum'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>halooogais</title>
</head>

<body>
	<header>
		<h3>Sisa.in</h3>
	</header>

	<h3><?=date("F");?></h3>


	<p> Pemasukan 		: Rp <?= number_format($sapa['sum'] ,2,",",".") ?> </p>
	<p> Pengeluaran  	: Rp <?= number_format($apa['sum'] ,2,",",".") ?> </p>
			
	<p> --------------------- </p>
	<p> Sisah duit		: Rp <?= number_format($apah,2,",",".") ?></p>


	
 <table border="1">
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Kategori</th>
            <th>Nama Pengeluaran</th>
			<th>Nominal Pengeluaran</th>
			<th>Kuantitas Pengeluaran</th>
			<th> Edit </th>
		</tr>
	</thead>
	
	<tbody>

	<?php
	$query3 = pg_query("SELECT * FROM pengeluaran where username = '$id'");


	while($pussy = pg_fetch_array($query3)){
	echo "<tr>";
	
	echo "<td>".$pussy['tanggal']."</td>";
	echo "<td>".$pussy['kategori_pengeluaran']."</td>";
	echo "<td>".$pussy['item_pengeluaran']."</td>";
	echo "<td>".$pussy['nominal_pengeluaran']."</td>";
	echo "<td>".$pussy['kuantitas_pengeluaran']."</td>";
	echo "<td>";
	echo "<a href='formeditpeng.php?username=".$pussy['username']."'> Edit</a> | ";
	echo "</td>";
	echo "</tr>";
	}
?>
</tbody>
</tabble>

<table border="1">
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Kategori</th>
            <th>Nama Rencana</th>
			<th>Nominal Rencana</th>
			<th> Edit </th>
		</tr>
	</thead>

<tbody>
	<?php
	$query4 = pg_query("SELECT * FROM rencana where username = '$id'");


	while($pussync = pg_fetch_array($query4)){
	echo "<tr>";
	
	echo "<td>".$pussync['tanggal']."</td>";
	echo "<td>".$pussync['kategori_rencana']."</td>";
	echo "<td>".$pussync['item_rencana']."</td>";
	echo "<td>".$pussync['nominal_rencana']."</td>";
	echo "<td>";
	echo "<a href='formeditrenc.php?username=".$pussync['username']."'> Edit</a> | ";
	echo "</td>";
	echo "</tr>";
	}
?>
</tbody>
</tabble>

	<li><a href="tambahpengeluaran.php?username=<?= $home['username']?>">Tambah Pengeluaran</a></li>
	<li><a href="tambahrencana.php?username=<?= $home['username']?>">Tambah rencana</a></li>
	<tr>
	<p><a href="home.php"> Home satu :)</a> </p>
	</tr>
	


</body>
</html>