<?php
	include("config.php");
	session_start();
	$id = $_SESSION['id'];

    if(is_null($id)){header('location: index.php');}
	$query = pg_query("SELECT * FROM users where username = '$id'");
    $helga = pg_query("SELECT * FROM pemasukan where username = '$id'");
	$quer2y = pg_query("SELECT sum(nominal_pemasukan) FROM pemasukan where username = '$id'");
	$asu = pg_query($db, "SELECT sum(nominal_pengeluaran) FROM pengeluaran WHERE username = '$id'");
	$home = pg_fetch_array($query, NULL, PGSQL_ASSOC);
	$apa = pg_fetch_array($asu, NULL, PGSQL_ASSOC);
	$sapa = pg_fetch_array($quer2y, NULL, PGSQL_ASSOC);
    $amel = pg_fetch_array($helga, NULL, PGSQL_ASSOC);
	$apah = $sapa['sum'] - $apa['sum'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir edit Pemasukan</title>
</head>

<body>
    <header>
        <h3>Edit Pemasukan</h3>
    </header>

    <form action="proseseditpem.php?username=<?=$home['username']?>" method="POST">
        <fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="kategori_pemasukan">Kategori </label>
			<input type="text" name="kategori_pemasukan" placeholder="kategori" value="<?= $amel['kategori_pemasukan']?>" />
		</p>

		<p>
			<label for="nominal_pemasukan">Nominal</label>
			<input type="number" name="nominal_pemasukan" placeholder="nominal" value="<?= $amel['nominal_pemasukan']?>"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
    </form>

</body>

</html>