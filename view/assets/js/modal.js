var modal = document.getElementById('sign-up-modal');
var modal = document.getElementById('sign-in-modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
