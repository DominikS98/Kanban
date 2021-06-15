<?php
session_start();

//łaczenie z bazą 
require_once "connect.php";
$connection = @new mysqli($host, $db_user, $db_password, $db_name);
if ($connection->connect_errno != 0) {
  echo "Error: " . $connection->connect_errno;
} else {
  //Zapytanie do wydobycia danych
  $sql = "SELECT * FROM  tasks";

  $all_res = $connection->query($sql);
  $task_id1 = [];
  $task_id2 = [];
  $task_id3 = [];
  $task_id4 = [];

  foreach ($all_res as $item) {
    //sprawdzenie statusu  zadań 
    if ($item['state'] == "ToDo") {
      //przypisanie zadań do odpowiedznich tabllic
      array_push($task_id1, $item['id']);
    }
    if ($item['state'] == "During") {
      array_push($task_id2, $item['id']);
    }
    if ($item['state'] == "To-check") {
      array_push($task_id3, $item['id']);
    }
    if ($item['state'] == "Ready") {
      array_push($task_id4, $item['id']);
    }
  };
  //Close connection.
  $connection->close();
}
