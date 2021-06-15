<?php

require_once "connect.php";
$conn = @new mysqli($host, $db_user, $db_password, $db_name);
// sorawdzenie połącznie 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//zapisanie  przesłanych w formularzu  danych 
error_reporting(E_ERROR | E_PARSE);
$title = $_POST['title'];
$description = $_POST['description'];
$difficulty = $_POST['difficulty'];


//sprawdzenie czy dane nie są puste
if ($title != '' && $description != '' && $difficulty != '') {
    //zapisanie do bazy
    $sql = ("INSERT INTO tasks(`title`, `description`, `difficulty`, `state`) VALUES ('$title', '$description', '$difficulty', 'ToDo')");
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    //odesłanie na strone
    header('Location: index.php');
    exit();
}
else{
    header('Location: index.php');
    exit();
}
