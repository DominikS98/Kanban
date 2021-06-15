<?php
// łaczenie z bazą 
require_once "connect.php";
$conn = @new mysqli($host, $db_user, $db_password, $db_name);
// sorawdzenie połącznie 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//zapisanie przesłanego id
$id = $_GET['id'];

// zapytanie usuwające rekord w bazy
$sql = mysqli_query($conn, "delete from tasks where id =$id");
// sprawdzenie czy można wykonać zapytanie 
if ($sql) {
    mysqli_close($conn);
    header('Location: index.php');
}
exit();
