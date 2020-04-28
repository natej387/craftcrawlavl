$(document).ready(function(){
  progress();
  crawlComplete();
  });

// tests for crawl completion
function crawlComplete() {
  var brew, brewli, brewdiv, brewText;
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];
  brew = document.getElementById('breweries');
  brewli = brew.getElementsByClassName('brewery');
  var count = 0;
  for (i = 0; i < brewli.length; i++) {
    brewdiv = brewli[i].getElementsByClassName("visit")[0];
    brewText = brewdiv.innerText;
    if (brewText == "Visited") {
      count++;
    }
  }
  
  if (count == 8) {
    modal.style.display = "block";
  }
  span.onclick = function() {
  modal.style.display = "none";
  }

// When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}

//checks current your progress
function progress() {
  var brew, brewli, brewdiv, brewText;
  
  brew = document.getElementById('breweries');
  brewli = brew.getElementsByClassName('brewery');
  
  for (i = 0; i < brewli.length; i++) {
    brewdiv = brewli[i].getElementsByClassName("visit")[0];
    brewText = brewdiv.innerText;
      if (brewText == "Visited") {
        brewdiv.style.backgroundColor = "green";
      } else {
        brewdiv.style.backgroundColor = "#c70000";
      }
    } 
}
