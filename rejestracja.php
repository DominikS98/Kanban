<?php
//start sesji
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
}
//połączenie z baza
require_once "connect.php";
$conn = @new mysqli($host, $db_user, $db_password, $db_name);

// zapisanie i spraedzenie przesłanych danych
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$phaslo = $_POST['phaslo'];
//konwersja na stringa
$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
$phaslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

//sprawdzenie czy dane nie są puste 
if ($login != "" && $haslo != "") {
    //sprawdzenie czy hasła są takie same
    if ($_POST['haslo'] == $_POST['phaslo']) {
        //zapisanie do bazy
        $sql = mysqli_query($conn, "INSERT INTO users ( `login`, `password`) VALUES ('$login','$haslo')");
        if ($sql) {
            //ustawiennie zmiennej sesyjnej
            $_SESSION['zalogowany'] = true;
            mysqli_close($conn);
            //wyłączenie błendu
            unset($_SESSION['blad']);
            //odesłanie do dalszej strony
            header('Location: kanban.php');
        }
        //wyświetlenie jeżeli wystąpi bład
    } else $_SESSION['blad'] =  '<p style="color:red">podane hasła sie różnią</p>';
    header('Location: index.php');
    //wyświetlenie jeżeli wystąpi bład
} else {
    $_SESSION['blad'] =  '<p style="color:red"> Nie podano loginu lub hasła</p>';
    header('Location: index.php');
}
