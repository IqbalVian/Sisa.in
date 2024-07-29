<?php
include("config.php");
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}

if (isset($_GET['username'])) {
    $id = $_GET['username'];
	$query = pg_query("SELECT * FROM users where username = '$id'");
	$saldo = pg_fetch_array($query, NULL, PGSQL_ASSOC);
} else {
    header('Location: home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Input pengeluaran</title>
</head>

<body>
	<header>
		<h3>Input pengeluaran</h3>
	</header>

	<form action="prosesinputpengeluaran.php" method="POST">
		<fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="kategori_pengeluaran">Kategori </label>
			<input type="text" name="kategori_pengeluaran" placeholder="kategori" />
		</p>
        <p>
			<label for="item_pengeluaran">Nama Item</label>
			<input type="text" name="item_pengeluaran" placeholder="item"/>
		</p>
		<p>
			<label for="nominal_pengeluaran">Nominal</label>
			<input type="number" name="nominal_pengeluaran" placeholder="nominal"/>
		</p>
        <p>
			<label for="kuantitas_pengeluaran">Kuantitas</label>
			<input type="number" name="kuantitas_pengeluaran" placeholder="SITU MAU BERAPA BIJI!"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
	</form>

	</body>
</html>