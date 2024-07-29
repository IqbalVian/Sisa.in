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
	<title>Input rencana</title>
</head>

<body>
	<header>
		<h3>Input rencana</h3>
	</header>

	<form action="prosesinputrencana.php" method="POST">
		<fieldset>
		<p>
            <input type="hidden" name="username" value="<?= $id?>"   /> 
        </p>
		<p>
			<label for="kategori_rencana">Kategori </label>
			<input type="text" name="kategori_rencana" placeholder="kategori" />
		</p>
        <p>
			<label for="item_rencana">Item</label>
			<input type="text" name="item_rencana" placeholder="item"/>
		</p>
		<p>
			<label for="nominal_rencana">Nominal</label>
			<input type="number" name="nominal_rencana" placeholder="nominal"/>
		</p>

		<p>
			<input type="submit" value="enter" name="enter" />
		</p>
		</fieldset>
	</form>

	</body>
</html>