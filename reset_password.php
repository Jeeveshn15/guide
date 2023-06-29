<?php
    include "./dbconnect.php";
    include "./nav_bar_student.php";
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: student_login.php");
        exit();
    }

    $reg_no=$current_pwd=$new_pwd=$confirm_pwd=$message=
    $uppercase=$lowercase=$number=$specialChars="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $reg_no=$_SESSION["reg_no"];
        $current_pwd=test_input($_POST["current_pwd"]);
        $new_pwd=test_input($_POST["new_pwd"]);
        $result= mysqli_query($con, "SELECT * FROM student_credentials WHERE reg_no='$reg_no'");
        if(!$result){
          echo mysqli_error($con);
          exit;
        }
        $row= mysqli_fetch_array($result);
        $current_pwd=md5($current_pwd);
        if(isset($row)){
          if($current_pwd!==$row["password"]){
            $message="The current password which you have entered is wrong!";
            echo "<script>alert('$message');</script>";
          }
            else{
              $new_pwd=md5($new_pwd);
              $sql_query1="UPDATE student_credentials 
              SET password='$new_pwd' WHERE reg_no=$reg_no";
              if((mysqli_query($con,$sql_query1)) ){
                $message='PASSWORD CHANGED SUCCESSFULLY!!';
                echo "<script>alert('$message');</script>";
              }
              else{
                echo 'connect error';
              }
            }
        }
    }
  function test_input($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
    }
    ?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/student_style.css" />
  </head>
<body>

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
       <input type="password" id="new_pwd" name="new_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).\S{8,32}" title="Must contain at least one number and one uppercase and lowercase letter, and between 8-32 characters - No space inbetween" maxlength="32" required >
        <i class="far fa-eye" id="togglePassword" style="z-index:100, margin-left:-30px, cursor:pointer;"></i>
      </div>
    </div>
    <div class="row">
      <div id="message">
        <p>Password must contain the following:</p>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>

</div>
    <!-- <div class="row">
      <div class="col-25">
        <label for="confirm_pwd">Confirm password</label>
      </div>
      <div class="col-75">
        <input type="password" id="confirm_pwd" name="confirm_pwd" onChange="checkPasswordMatch();">
      </div>
    <div class="registrationFormAlert" id="divCheckPasswordMatch">
    </div>
      </div><br> -->
    

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