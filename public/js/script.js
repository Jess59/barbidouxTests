document.addEventListener("DOMContentLoaded", function() {
  function monProfil() {
    document.getElementById("modifUser").style.display = "block";
    document.getElementById("modifUser").style.display = "flex";
    document.getElementById("mesRandos").style.display = "none";
    document.getElementById("Objectifs").style.display = "none";
    document.getElementById("bMesObj").style.backgroundColor = "#C68D5E";
    document.getElementById("bMesRandos").style.backgroundColor = "#C68D5E";
    document.getElementById("bProfil").style.backgroundColor = "#DC5527";
}
document.getElementById("bProfil").addEventListener("click", monProfil);

function mesObj() {
    document.getElementById("Objectifs").style.display = "block";
    document.getElementById("bMesRandos").style.backgroundColor = "#C68D5E";
    document.getElementById("mesRandos").style.display = "none";
    document.getElementById("bProfil").style.backgroundColor = "#C68D5E";
    document.getElementById("modifUser").style.display = "none";
    document.getElementById("bMesObj").style.backgroundColor = "#DC5527";
}
document.getElementById("bMesObj").addEventListener("click", mesObj);

function mesRando() {
  document.getElementById("mesRandos").style.display = "block";
  document.getElementById("bMesObj").style.backgroundColor = "#C68D5E";
  document.getElementById("Objectifs").style.display = "none";
  document.getElementById("bProfil").style.backgroundColor = "#C68D5E";
  document.getElementById("modifUser").style.display = "none";
  document.getElementById("bMesRandos").style.backgroundColor = "#DC5527";
}
document.getElementById("bMesRandos").addEventListener("click", mesRando);
});


// JS RandoDetail
document.addEventListener("DOMContentLoaded", function() {
  let acc = document.getElementsByClassName("accordion");
  let i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      /* Toggle between adding and removing the "active" class,
      to highlight the button that controls the panel */
      this.classList.toggle("active");
  
      /* Toggle between hiding and showing the active panel */
      let panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  } 
});


// JS PAGE CONSEIL 
document.addEventListener("DOMContentLoaded", function() {
  function conseils() {
    document.getElementById("focusConseils_1").style.display = "block";
    document.getElementById("focusConseils_2").style.display = "none";
    document.getElementById("focusConseils_3").style.display = "none";
  }
  document.getElementById("buttonEquipements").addEventListener("click", conseils);
  
  function conseils_2() {
    document.getElementById("focusConseils_2").style.display = "block";
    document.getElementById("focusConseils_1").style.display = "none";
    document.getElementById("focusConseils_3").style.display = "none";
  }
  
  document.getElementById("buttonSante").addEventListener("click", conseils_2);
  
  function conseils_3() {
    document.getElementById("focusConseils_3").style.display = "block";
    document.getElementById("focusConseils_2").style.display = "none";
    document.getElementById("focusConseils_1").style.display = "none";
  }
  document .getElementById("buttonTousNosConseils").addEventListener("click", conseils_3);
});

/*********************************meentions legales*****************************************************/
document.addEventListener("DOMContentLoaded", function() {
  document.addEventListener('keydown', function(event) {
    if (event.key === "ArrowDown") {
        scrollDown();
    }
  });
  
  function scrollDown() {
    var scrollSection = document.getElementById('scrollSection');
    scrollSection.scrollTop += 70; // 
  }
});

/***************************************fin mentions legales********************************************/

//  Create a "close" button and append it to each list item
var myNodelist = document.getElementById("myUL").getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
} 