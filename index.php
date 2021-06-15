<?php
//start sesji 
session_start();

// sprawdzenie czy jest aktywan sesja
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
	header('Location: kanban.php');
	exit();
}

?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>kanban logowanie</title>
	<link rel="stylesheet" href="IndexStyle.css">
	<script src="appIndex.js" defer></script>
</head>

<body>
	<div class="box">
		<div class="wybor">
			<button class="logowanie" id="log">logowanie</button>
			<button class="rejestracja" id="rej">rejestracja</button>
		</div>
		<div class="zal" id="logowanie">
			<h2>Logowanie do Kanban</h2>
			<form action="zaloguj.php" method="post">
				<p>Login:</p> <input type="text" name="login" /> <br />
				<p>Hasło:</p> <input type="password" name="haslo" /> <br />
				<input type="submit" value="dalej" />
			</form>
		</div>
		<div class="niewidzocz" id="rejestracja">
			<h2>Rejestruj do Kanban</h2>
			<form action="rejestracja.php" method="post">
				<p>Login:</p> <input type="text" name="login" /> <br />
				<p>Hasło:</p> <input type="password" name="haslo" /> <br />
				<p>Powtórz Hasło:</p> <input type="password" name="phaslo" /> <br />
				<input type="submit" value="dalej" />
			</form>
		</div>
		<?php
		//wyswietlenie informacji jeżeli wystepuje bład 
		if (isset($_SESSION['blad']))	echo $_SESSION['blad'];
		?>
	</div>
</body>

</html>