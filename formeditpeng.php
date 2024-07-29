<?php
	include("config.php");
	session_start();
	$id = $_SESSION['id'];

    if(is_null($id)){header('location: index.php');}
	$query = pg_query("SELECT * FROM users where username = '$id'");
    $helga = pg_query("SELECT * FROM pemasukan where username = '$id'");
    $ameli = pg_query("SELECT * FROM tabungan where username = '$id'");
    $iqbale =  pg_query("SELECT * FROM pengeluaran where username = '$id'");
	$quer2y = pg_query("SELECT sum(nominal_pemasukan) FROM pemasukan where username = '$id'");
	$asu = pg_query($db, "SELECT sum(nominal_pengeluaran) FROM pengeluaran WHERE username = '$id'");
	$home = pg_fetch_array($query, NULL, PGSQL_ASSOC);
	$apa = pg_fetch_array($asu, NULL, PGSQL_ASSOC);
	$sapa = pg_fetch_array($quer2y, NULL, PGSQL_ASSOC);
    $amel = pg_fetch_array($helga, NULL, PGSQL_ASSOC);
    $helya = pg_fetch_array($ameli, NULL, PGSQL_ASSOC);
    $iqbal =  pg_fetch_array($iqbale, NULL, PGSQL_ASSOC);
	$apah = $sapa['sum'] - $apa['sum'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir edit Pengeluaran</title>
</head>

<body>
    <header>
        <h3>Edit Pengeluaran</h3>
    </header>

    <form action="proseseditpeng.php?username=<?=$home['username']?>" method="POST">
        <fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="kategori_pengeluaran">Kategori </label>
			<input type="text" name="kategori_pengeluaran" placeholder="kategori" value="<?= $iqbal['kategori_pengeluaran']?>" />
		</p>
        <p>
			<label for="item_pengeluaran">Nama Item</label>
			<input type="text" name="item_pengeluaran" placeholder="item"  value="<?= $iqbal['item_pengeluaran']?>"/>
		</p>
		<p>
			<label for="nominal_pengeluaran">Nominal</label>
			<input type="number" name="nominal_pengeluaran" placeholder="nominal" value="<?= $iqbal['nominal_pengeluaran']?>" />
		</p>
        <p>
			<label for="kuantitas_pengeluaran">Kuantitas</label>
			<input type="number" name="kuantitas_pengeluaran" placeholder="SITU MAU BERAPA BIJI!" value="<?= $iqbal['kuantitas_pengeluaran']?>"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>

    </form>

</body>

</html>