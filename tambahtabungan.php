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
	<title>Input Tabungan</title>
</head>

<body>
	<header>
		<h3>Input Tabungan</h3>
	</header>

	<form action="prosesinputtabungan.php" method="POST">
		<fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="nama_tabungan">jenis tabungan </label>
			<input type="text" name="nama_tabungan" placeholder="jenis tabungan" />
		</p>
		<p>
			<label for="nominal_tabungan">Nominal</label>
			<input type="number" name="nominal_tabungan" placeholder="nominal"/>
		</p>
        <p>
			<label for="nominal_target">Target nominal</label>
			<input type="number" name="nominal_target" placeholder="Target"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
	</form>

	</body>
</html>