<?php
// star sesji
session_start();

//połączenie z baza
require_once "connect.php";
$connection = @new mysqli($host, $db_user, $db_password, $db_name);
if ($connection->connect_errno!=0){
  echo "Error: ".$connection->connect_errno;
}
else{
  //zpisanie  przesłanych danych 
  $item = $_POST["item"];
  $parent = $_POST["parent"];
  
  //ustawienie odpowiedniego stanu zadania
  if($parent == "task_id1"){
    $state = "ToDo";
  }
  if($parent == "task_id2"){
    $state = "During";
  }
  if($parent == "task_id3"){
    $state = "To-check";
  }
  if($parent == "task_id4"){
    $state = "Ready";
  }
  
  //zapytanie aktualizujące dane w bazie
  $sql ="UPDATE tasks SET state='$state' WHERE id=$item;";
  
  //sprawdznie czy można wykonać zapytanie
  if ($connection->query($sql) === TRUE) {
  }

  $connection->close();
}
?>