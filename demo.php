<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
<style>
/* #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
} */

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>   

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" name="mentorform" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="current_pwd">Current password</label>
      </div>
      <div class="col-75">
        <input type="password" id="current_pwd" name="current_pwd" requied>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="new_pwd">New password</label>
      </div>
      <div class="col-75">
       <input type="password" id="new_pwd" name="new_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <i class="far fa-eye" id="togglePassword" style="z-index:100, margin-left:-30px, cursor:pointer;"></i>
      </div>
      <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="confirm_pwd">Confirm password</label>
      </div>
      <div class="col-75">
        <input type="password" id="confirm_pwd" name="confirm_pwd" onChange="checkPasswordMatch();">
      </div>
    <div class="registrationFormAlert" id="divCheckPasswordMatch">
    </div>
      </div><br>
    

    <div class="row">
      <div class="col-75">
      <input type="submit" value="Submit"></div>
    </div>
    </div>
  </form>
</div>
<script>
var myInput = document.getElementById("new_pwd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#new_pwd');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = new_pwd.getAttribute('type') === 'password' ? 'text' : 'password';
    new_pwd.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

function checkPasswordMatch() {
    var password = $("#new_pwd").val();
    var confirmPassword = $("#confirm_pwd").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Passwords match.");
}
$(document).ready(function () {
   $("#confirm_pwd").keyup(checkPasswordMatch);
});
</script>

</body>
</html>




/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
   
input[type=password], input[type=text],select, textarea {
  width: 90%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
/* #message {
  display:none;
} */

#message p {
  padding: 10px 35px;
  font-size: 14px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  /*border-radius: 5px;*/
  /* background-color: #f2f2f2; */
  padding: 20px;
  /* padding-left: 0%; */
  margin-top: 6%;
  margin-right:15%;
  margin-left: 25%;
  /* padding-top:30%; */
  width:40%;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other  */
@media screen and (max-width: 800px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
  .container{
    /* background-color: #f2f2f2; */
    padding: 20px;
    margin-top: 15%;
    margin-right:15%;
    margin-left: 35%;
    width:40%;
  }
}