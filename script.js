function val() {
  document.getElementById("nameError").textContent = "";
  document.getElementById("emailError").textContent = "";
  document.getElementById("password1Error").textContent = "";
  document.getElementById("password2Error").textContent = "";
  document.getElementById("zipError").textContent = "";
  document.getElementById("checkBoxError").textContent = "";
  document.getElementById("dobError").textContent = "";

 
  const fullName = document.getElementById("fullName").value.trim();
  const email = document.getElementById("email").value.trim();
  const password1 = document.getElementById("password1").value;
  const password2 = document.getElementById("password2").value;
  const zip = document.getElementById("zipCode").value.trim();
  const checkBox = document.getElementById("checkBox");
  const dob = document.getElementById("dob").value;

  let isVal = true;

  
  const specialCharPattern = /[^a-zA-Z. ]/;
  const multipleDotPattern = /\..*\./;
  if (specialCharPattern.test(fullName)) {
    document.getElementById("nameError").textContent = "Special character detected in full name!";
    isVal = false;
  } else if (multipleDotPattern.test(fullName)) {
    document.getElementById("nameError").textContent = "More than one dot is not allowed in full name.";
    isVal = false;
  } else if (fullName === "") {
    document.getElementById("nameError").textContent = "Full name is required.";
    isVal = false;
  }

  
  const emailPattern = /^\d{2}-\d{5}-\d@student\.aiub\.edu$/;
  if (!emailPattern.test(email)) {
    document.getElementById("emailError").textContent = "Email must be in the format: xx-xxxxx-x@student.aiub.edu";
    isVal = false;
  }

  
  if (password1.length < 8) {
    document.getElementById("password1Error").textContent = "Password must be at least 8 characters long.";
    isVal = false;
  }

  if (password1 !== password2) {
    document.getElementById("password2Error").textContent = "Passwords do not match.";
    isVal = false;
  }

  
  if (zip.length < 4) {
    document.getElementById("zipError").textContent = "Zip code must be at least 4 characters long.";
    isVal = false;
  }

  
  if (!dob) {
    document.getElementById("dobError").textContent = "Date of Birth is required.";
    isVal = false;
  } else {
    const birthDate = new Date(dob);
    if (isNaN(birthDate.getTime())) {
      document.getElementById("dobError").textContent = "Invalid Date of Birth.";
      isVal = false;
    } else {
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      const m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }

      if (age < 18) {
        document.getElementById("dobError").textContent = "You must be at least 18 years old.";
        isVal = false;
      }
    }
  }

  
  if (!checkBox.checked) {
    document.getElementById("checkBoxError").textContent = "You must agree to the Terms and Conditions.";
    isVal = false;
  }

  return isVal; 
}