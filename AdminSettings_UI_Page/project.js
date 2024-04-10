// Function to display a pop-up message
function showSuccessMessage() {
    alert("Details saved successfully!");
  }
  
  // Function to save details and display them
  function saveDetails() {
    const numQuestions = document.getElementById("numQuestions").value;
    const timeLimit = document.getElementById("timeLimit").value;
    const numOptions = document.getElementById("numOptions").value;
    const dateTime = document.getElementById("dateTime").value;
    const marksPerQuestion = document.getElementById("marksPerQuestion").value;
    const language = document.getElementById("language").value;
    const proctoringOn = document.getElementById("proctoringOn").checked;
    const negativeMarksYes = document.getElementById("negativeMarksYes").checked;
    const marksPerNegativeQuestion = document.getElementById("marksPerNegativeQuestion").value;
  
    // Create an object to store the details
    const details = {
      numQuestions,
      timeLimit,
      numOptions,
      dateTime,
      marksPerQuestion,
      language,
      proctoringOn,
      negativeMarksYes,
      marksPerNegativeQuestion,
    };
  
    // Save the details to your server (simulated here)
    // You would replace this with actual server communication
    // Display the saved details
    displaySavedDetails(details);
    // Show a success message
    showSuccessMessage();
  }
  
  // Function to display the saved details
  function displaySavedDetails(details) {
    // Here, you can display the saved details as you like
    const detailsContainer = document.getElementById("savedDetails");
    detailsContainer.innerHTML = JSON.stringify(details, null, 2);
  }
  
  // Attach an event listener to the "Save Settings" button
  const saveButton = document.getElementById("saveButton");
  saveButton.addEventListener("click", saveDetails);
  