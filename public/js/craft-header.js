$(document).ready(function(){
  
  var brew, brewli, brewdiv, brewText;
  
  brew = document.getElementById('breweries');
  brewli = brew.getElementsByClassName('brewery');
  
  for (i = 0; i < brewli.length; i++) {
    brewdiv = brewli[i].getElementsByClassName("visit")[0];
    brewText = brewdiv.innerText;
      if (brewText == "visited") {
        brewdiv.style.backgroundColor = "green";
      } else {
        brewdiv.style.backgroundColor = "red";
      }
    }
  
  myFunction();
  
  });

function myFunction() {
    var input, filter, div, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementsByClassName("Rtable-cell");
    li = document.getElementsByClassName("srch");
  
    for (i = 0; i < li.length; i++) {
        a = li[i];
      
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            div[i].style.display = "";
        } else {
            div[i].style.display = "none";
        }
    }
}