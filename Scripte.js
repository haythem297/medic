// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
// Function to open the update modal with patient ID
function openUpdateModal(patientId) {
  // Get the modal and set its display style to block
  var modal = document.getElementById("updatePatientModal");
  modal.style.display = "block";

  // Set the value of the hidden input field in the form
  document.getElementById("updatePatientId").value = patientId;
}