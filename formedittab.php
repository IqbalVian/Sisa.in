<?php
	include("config.php");
	session_start();
	$id = $_SESSION['id'];

    if(is_null($id)){header('location: index.php');}
	$query = pg_query("SELECT * FROM users where username = '$id'");
    $helga = pg_query("SELECT * FROM pemasukan where username = '$id'");
    $ameli = pg_query("SELECT * FROM tabungan where username = '$id'");
	$quer2y = pg_query("SELECT sum(nominal_pemasukan) FROM pemasukan where username = '$id'");
	$asu = pg_query($db, "SELECT sum(nominal_pengeluaran) FROM pengeluaran WHERE username = '$id'");
	$home = pg_fetch_array($query, NULL, PGSQL_ASSOC);
	$apa = pg_fetch_array($asu, NULL, PGSQL_ASSOC);
	$sapa = pg_fetch_array($quer2y, NULL, PGSQL_ASSOC);
    $amel = pg_fetch_array($helga, NULL, PGSQL_ASSOC);
    $helya = pg_fetch_array($ameli, NULL, PGSQL_ASSOC);
	$apah = $sapa['sum'] - $apa['sum'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir edit Tabungan</title>
</head>

<body>
    <header>
        <h3>Edit Tabungan</h3>
    </header>

    <form action="prosesedittab.php?username=<?=$home['username']?>" method="POST">
        <fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="nama_tabungan">jenis tabungan </label>
			<input type="text" name="nama_tabungan" placeholder="jenis tabungan" value="<?= $helya['nama_tabungan']?>"/>
		</p>
		<p>
			<label for="nominal_tabungan">Nominal</label>
			<input type="number" name="nominal_tabungan" placeholder="nominal"  value="<?= $helya['nominal_tabungan']?>"/>
		</p>
        <p>
			<label for="nominal_target">Target nominal</label>
			<input type="number" name="nominal_target" placeholder="Target"  value="<?= $helya['nominal_target']?>" />
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
		
    </form>

</body>

</html>