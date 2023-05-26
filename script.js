function addRow() {
  var container = document.getElementById("container");
  var row = document.createElement("div");
  row.classList.add("row");
  row.innerHTML =
    '<input type="text" name="data[]" placeholder="Data ' +
    (container.children.length + 1) +
    '">';
  container.appendChild(row);
}

// insert multiple data to sql  use html files and php and in html there is Add copy from is there
// html files incressing sql row shoud be incresing after click the button use foreign key in sql
