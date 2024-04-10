// Function to display a pop-up message
function showSuccessMessage() {
    alert("Details saved successfully!");
  }
  
  // Function to save details and display them
  function saveDetails() {
    const email = document.getElementById("emailaddress").value;
    const username = document.getElementById("Username").value;
    const password1 = document.getElementById("password1").value;
    const password2 = document.getElementById("password2").value;
  
    if (email === "" || username === "" || password1 === "" || password2 === "") {
      alert("All fields must be filled out");
      return;
    }
  
    if (password1 !== password2) {
      alert("Passwords do not match");
      return;
    }
  
    // Display the "Registration Successful" message
    showSuccessMessage();
  }
  
  // Attach an event listener to the "Register" button
  const registerButton = document.querySelector(".register-wrapper");
  registerButton.addEventListener("click", saveDetails);
  
  // Function to handle the "Login" link
  function handleLoginLink() {
    window.location.href = "./login.html";
  }
  
  // Attach an event listener to the "Login" link
  const youCanLogin = document.getElementById("youCanLogin");
  youCanLogin.addEventListener("click", handleLoginLink);