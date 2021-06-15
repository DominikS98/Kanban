<?php
session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
	header('Location: /index.php');
	exit();
}
//połacznie z baza
require_once "connect.php";
$connection = @new mysqli($host, $db_user, $db_password, $db_name);
if ($connection->connect_errno != 0) {
	echo "Error: " . $connection->connect_errno;
} else {
	//zapisanie przesłąnych danych
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	//konwersja zmiennych do stringa
	$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

	//wsyłanie zapytania do sprawdzenia poprwaności
	if ($rezultat = $connection->query(
		sprintf(
			"SELECT * FROM users WHERE login='%s' AND password='%s'",
			mysqli_real_escape_string($connection, $login),
			mysqli_real_escape_string($connection, $haslo)))) {
		$ilu_userow = $rezultat->num_rows;
		//sprawdzenie czy znalazło
		if ($ilu_userow > 0) {
			//ustawiennie zmiennej sesyjnej
			$_SESSION['zalogowany'] = true;
			//zapisanie danych dla sesji
			$wiersz = $rezultat->fetch_assoc();
			$_SESSION['user'] = $wiersz['login'];
			$_SESSION['password'] = $wiersz['haslo'];

			//wyłączenie błendu
			unset($_SESSION['blad']);
			$rezultat->free_result();
			//odesłanie do dalszej strony
			header('Location: /kanban.php');
		} else {
			//wyświetlenie jeżeli wystąpi bład
			$_SESSION['blad'] = '<p style="color:red">Nieprawidłowy login lub hasło!</p>';
			header('Location: /index.php');
		}
	}

	$connection->close();
}
