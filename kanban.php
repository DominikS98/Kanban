<?php
//owłowanie sie do pliku data.php by uzyskać tablice z danycmi 
require_once "data.php";
//sprawdzenie czy uzytkownik jest zalogowany 
if (!isset($_SESSION['zalogowany'])) {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="KanbanStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="app.js" defer></script>
  <title>Kanban</title>
</head>

<body>
  <header>
    <div class="title">
      <h1>Kanban</h1>
      <?php echo '<p><a class="logout"href="logout.php">Wyloguj się!</a></p>';  ?>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="To-do box" id="task_id1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <p class='p1'>Do zrobienia</p>
        <?php
        //wyswietlenie danych z statusem ToDo
        foreach ($all_res as $item) {
          foreach ($task_id1 as $ver) {
            if ($item['id'] == $ver) {
              
              echo "<div class=" . $item['difficulty'] . " id=" . $ver . ' drag' . $ver . '" draggable="true" ondragstart="drag(event)">';
              echo "<h2>" . $item["title"];
              echo "</h2>" .  $item["description"];
              //przesłanie w linku który element ma zostać usunięty 
              echo '<br><a class="delete" href="delete.php?id=' . $item['id'] . '"><i class="material-icons">delete</i></a>';
              echo "</div>";
            }
          }
        }
        ?>
      </div>
      <div class="During box " id="task_id2" ondrop="drop(event)" ondragover="allowDrop(event)">
        <p class='p2'>W trakcie</p>
        <?php
        //wyswietlenie danych z statusem During
        foreach ($all_res as $item) {
          foreach ($task_id2 as $ver) {
            if ($item['id'] == $ver) {
              echo "<div class=" . $item['difficulty'] . " id=" . $ver . ' drag' . $ver . '" draggable="true" ondragstart="drag(event)">';
              echo "<h2>" . $item["title"];
              echo "</h2>" .  $item["description"];
              //przesłanie w linku który element ma zostać usunięty 
              echo '<br><a class="delete" href="delete.php?id=' . $item['id'] . '"><i class="material-icons">delete</i></a>';
              echo "</div>";
            }
          }
        }
        ?>
      </div>
      <div class="box To-check" id="task_id3" ondrop="drop(event)" ondragover="allowDrop(event)">
        <p class='p3'>Do sprawdzenia</p>
        <?php
        //wyswietlenie danych z statusem to-chcek
        foreach ($all_res as $item) {
          foreach ($task_id3 as $ver) {
            if ($item['id'] == $ver) {
              echo "<div class=" . $item['difficulty'] . " id=" . $ver . ' drag' . $ver . '" draggable="true" ondragstart="drag(event)">';
              echo "<h2>" . $item["title"];
              echo "</h2>" .  $item["description"];
              //przesłanie w linku który element ma zostać usunięty 
              echo '<br><a class="delete" href="delete.php?id=' . $item['id'] . '"><i class="material-icons">delete</i></a>';
              echo "</div>";
            }
          }
        }
        ?>
      </div>
      <div class="box Ready" id="task_id4" ondrop="drop(event)" ondragover="allowDrop(event)">
        <p class='p4'>Gotowe</p>
        <?php
        //wyswietlenie danych z statusem Redy
        foreach ($all_res as $item) {
          foreach ($task_id4 as $ver) {
            if ($item['id'] == $ver) {
              echo "<div class=" . $item['difficulty'] . " id=" . $ver . ' drag' . $ver . '" draggable="true" ondragstart="drag(event)">';
              echo "<h2>" . $item["title"];
              echo "</h2>" .  $item["description"];
              //przesłanie w linku który element ma zostać usunięty 
              echo '<br><a class="delete" href="delete.php?id=' . $item['id'] . '"><i class="material-icons">delete</i></a>';
              echo "</div>";
            }
          }
        }
        ?>
      </div>
    </div>
    <div class="container2">
      <div class="dodaj__zadanie">
        <h2>Dodaj Zadanie</h2>
        <form action="dodaj.php" method="post">
          Tytuł zadania
          <input type="text" id="title" name="title" required />
          Opis zadania
          <input type="text" id="description" name="description" required />
          Trudnosc zadania
          <select id="difficulty" name="difficulty">
            <option value="easy">łatwe</option>
            <option value="normal">normalne</option>
            <option value="hard">trudne</option>
            <option value="veryDifficult">bardzo trunde</option>
          </select>
          <input type="submit" value="Dodaj" id="add">
        </form>
      </div>
    </div>
  </main>

</body>

</html>