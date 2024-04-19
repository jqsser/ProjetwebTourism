
function submitId() {
    // Get the value of the ID input field
    var enteredId = document.getElementById("idInput").value;
  
    // Check if the entered ID is a number
    if (!isNaN(parseFloat(enteredId)) && isFinite(enteredId)) {
      // Redirect to the empty page if the entered ID is a valid number
      window.location.href = "empty.html";
    } else {
      // Display an error message if the entered ID is not a valid number
      alert("Please enter a valid ID (numeric value).");
    }
  }