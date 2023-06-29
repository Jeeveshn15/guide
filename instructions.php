<?php
    include './header.php';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        if(isset($_POST["submit"])){
            header('Location: student_registration.php');
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    </script>
    <style>
      body,
      html {
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
      }

      * {
        box-sizing: border-box;
      }

      .bg-img {
        /* The image used */
        background-image: url("./assets/img/homeimage1.jpg");
        width: 100%;
        min-height: 690px;
        padding: 0px;
        /* Center and scale the image nicely */
        /* background-position: center; */
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      /* Add styles to the form container */
      .container {
        position: absolute;
        right: 25%;
        margin: 20px;
        max-width: 700px;
        padding: 16px;
        background-color: white;
      }

      .column{
        width: 50%;
        padding: 10px 30px;
        float :left;
      }

      /* Full-width input fields */
      input[type="text"],
      input[type="email"],
      input[type="tel"],
      select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="tel"]:focus,
      select:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit button */
      .btn {
        background-color: rgba(131, 18, 56, 1);
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }

      .btn:hover {
        opacity: 1;
      }

      @media screen and (max-width:70em) {
        .column{
          width:100%;
        }
        .column:nth-child(3){
          width:100%;
        }
      }

      @media screen and (max-width: 48em){
        .column{
          widhth: 100%;
          padding: 10px;
        }
      }
      .mandatory{
        color:red;
      }
      #instructions{
        margin-top:140px;
      }
      .lines{
        line-height:1.8;
      }
    </style>
  </head>
  <body>
    <div class="bg-img">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="container" id="instructions" method="post">   
        
            <h3><u>INSTRUCTIONS:</u></h3>
            <div class="lines"> 
            1. Maximum of two students can enroll in a project.<br>
            2. If you are registering as a team, then only one person should register for the team.<br>
            3. Please visit VIEW GUIDE LIST before selecting the guide.<br>
            4. If you get Pop Up message "Guide Not Available" then choose another guide in the list.<br>
            5. After successful registration, a pop up message "Successfully Registered" will be received.<br>
            </div>
            <br><br>
            <input type="checkbox" id="agree" name="agree" value="agree" required>
            <label for="agree"> I have read all the instructions<label>
            <br><br>
            <button type="submit" value="submit" name="submit" class="btn">SUBMIT</button>
    </form>
    </div>
    </body>
    </html>