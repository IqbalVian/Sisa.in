<?php
	include("config.php");
	session_start();
	$id = $_SESSION['id'];
	if(is_null($id)){header('location: login.php');}
	$query = pg_query("SELECT * FROM users where username = '$id'");
	
	$home = pg_fetch_array($query, NULL, PGSQL_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sisa.in</title>
    <link rel="icon" href="./aset/sisaa.jpeg">
    <link rel="stylesheet" href="home.css">
</head>

<body>
	<nav>
		<label>Sisa.in</label>
		<ul>
			<li><a href="tambahpemasukan.php?username=<?= $home['username']?>">Tambah Pemasukan</a></li>
			<li><a href="tambahtabungan.php?username=<?= $home['username']?>">Tambah Tabungan</a></li>
			<li><a href="home2.php"> Home dua :)</a></li>
		</ul>
	</nav>

	<div class="isi">
		<h3 class="box2"><?=date("F");?></h3>

		<table border="1">
		<thead>
			<tr>
				<p> Pemasukan 		: Rp <?= number_format($sapa['sum'] ,2,",",".") ?> </p>
				<p> Pengeluaran  	: Rp <?= number_format($apa['sum'] ,2,",",".") ?> </p>
				
				<p> --------------------- </p>
				<p> Sisah duit		: Rp <?= number_format($apah,2,",",".") ?></p>
			</tr>
		</thead>
	</div>
	<table>
        <tr>
            TABEL PEMASUKAN
        </tr>
    </table>
    <table border="1" class="content-table">
	<thead>
		<tr>
			<th>Kategori</th>
			<th>Tanggal</th>
            <th>Nominal</th>
			<th> Edit </th>
		</tr>
	</thead>
	
	<tbody>
		<?php
		$query2 = pg_query("SELECT * FROM pemasukan where username = '$id'");
		// $query = mysqli_query($db, $sql);

		while($pus = pg_fetch_array($query2)){
			echo "<tr>";

			echo "<td>".$pus['kategori_pemasukan']."</td>";
			echo "<td>".$pus['tanggal']."</td>";
			echo "<td>".$pus['nominal_pemasukan']."</td>";
			
			echo "<td>";
			echo "<a href='formeditpem.php?username=".$pus['username']."'> Edit</a> | ";
            echo "</td>";
			
			echo "</tr>";
			
			}
		?>
	</tbody>
	
	<br> </br>
	<table>
        <tr>
            TABEL TABUNGAN
        </tr>
    </table>
	<table border="1" class="content-table">
	<thead>
		<tr>
			<th>Nama tabungan</th>
			<th>tanggal</th>
			<th>Nominal Tabungan</th>
            <th>Nominal Target</th>
			<th> Edit </th>
		</tr>
	</thead>
	<br> </br>
	
	
	<tbody>
		<?php
		$query3 = pg_query("SELECT * FROM tabungan where username = '$id'");
		// $query = mysqli_query($db, $sql);

		while($puss = pg_fetch_array($query3)){
			echo "<tr>";

			echo "<td>".$puss['nama_tabungan']."</td>";
			echo "<td>".$puss['tanggal']."</td>";
			echo "<td>".$puss['nominal_tabungan']."</td>";
			echo "<td>".$puss['nominal_target']."</td>";

			echo "<td>";
			echo "<a href='formedittab.php?username=".$puss['username']."'> Edit</a> | ";
            echo "</td>";

			echo "</tr>";

			}
		?>
	</tbody>
</body>
</html>