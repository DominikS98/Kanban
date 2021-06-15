
var currentbox;
var currentparent;

//ustawienie stref 
function allowDrop(ev) {
  ev.preventDefault();
  ev.returnValue = false;
}
//ustawnie elementów do przeciągania
function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
  currentbox = ev.target.id;
  console.log(currentbox);
}
//fukcja upuść
function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
  currentparent = $(document.getElementById(data)).parent().attr('id');
  //wysłanie z danych by zaktualiować danie w bazie 
  $.ajax({
    type: "POST",
    url: "update.php",
    data: {
      item: currentbox,
      parent: currentparent
    }
  })
  console.log(currentbox);
  console.log(currentparent);
}
//zbaespieczenie przed włożenie zadania w zadanie 
$(document).ready(function () {
  $('.easy').on('drop', function () {
    return false;
  });
  $('.normal').on('drop', function () {
    return false;
  });
  $('.hard').on('drop', function () {
    return false;
  });
  $('.veryDifficult').on('drop', function () {
    return false;
  });
});
