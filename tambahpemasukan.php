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
	<title>Input Pemasukan</title>
</head>

<body>
	<header>
		<h3>Input pemasukan</h3>
	</header>

	<form action="prosesinputpemasukan.php" method="POST">
		<fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="kategori_pemasukan">Kategori </label>
			<input type="text" name="kategori_pemasukan" placeholder="kategori" />
		</p>

		<p>
			<label for="nominal_pemasukan">Nominal</label>
			<input type="number" name="nominal_pemasukan" placeholder="nominal"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
