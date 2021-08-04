// Get the modall
var modall = document.getElementById('myModal');

// Get the button that opens the modall
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modall
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modall 
btn.onclick = function() {
    modall.style.display = "block";
}

// When the user clicks on <span> (x), close the modall
span.onclick = function() {
    modall.style.display = "none";
}

// When the user clicks anywhere outside of the modall, close it
window.onclick = function(event) {
    if (event.target == modall) {
        modall.style.display = "none";
    }
}