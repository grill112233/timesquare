var displayAdd = document.getElementById("displayAdd");
var displayDelete = document.getElementById("displayDelete");
var btnAdd = document.getElementById("btnAdd");
var closeAdd = document.getElementById("closeAdd");
var btnDelete = document.getElementById("btnDelete");
var closeDelete = document.getElementById("closeDelete");

btnAdd.onclick = function() {
  displayAdd.style.display = "block";
}

closeAdd.onclick = function() {
  displayAdd.style.display = "none";
}

btnDelete.onclick = function() {
  displayDelete.style.display = "block";
}

closeDelete.onclick = function() {
  displayDelete.style.display = "none";
}
