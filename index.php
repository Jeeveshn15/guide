<?php
  include './header.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    </style>
  </head>
  <body>
    <!-- <h2>GUIDE SELECTION</h2> -->
    <div class="bg-img"></div>
    
  </body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
