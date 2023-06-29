<?php
  include './dbconnect.php';
  include './header.php';
  $message=$password="";
  if(count($_POST)>0){
    // $result= mysqli_query($con, "SELECT * FROM admin_credentials WHERE email='".$_POST["email"]."' and password='".$_POST["password"]."'");
    $result= mysqli_query($con, "SELECT * FROM student_credentials WHERE reg_no='".$_POST["reg_no"]."'");
    if(!$result){
      echo mysqli_error($con);
      exit;
    }
    $row= mysqli_fetch_array($result);
    $password=test_input($_POST["password"]);
    $password=md5($password);
    if(isset($row)){
    if(is_array($row) & ($password===$row["password"])){
      $_SESSION["id"]=$row["id"];
      $_SESSION["reg_no"]= $row["reg_no"];
      $_SESSION["password"]=$row["password"];
    }
    else{
      $message= "Invalid Password";
      echo "<script>alert('$message');</script>";
    }
    }
    else{
      $message= "Invalid Register Number";
      echo "<script>alert('$message');</script>";
    }
  }
  if(isset($_SESSION["id"])){
    session_start();
    $_SESSION["logged_in"]=TRUE;
    $_SESSION["unique_id"]=1;
    $_SESSION["reg_no"]=$row["reg_no"];
    header("Location:student_home.php");
    
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;

        }
        .header {
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            overflow: hidden;
            padding: 20px 10px;
            background-color: rgba(131, 18, 56, 1);
        }
        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 17px;
            line-height: 40px;
            border-radius: 4px;
        }
        .header img.logo {
            height: 75px;
            padding-left: 20px;
            /* font-size: 23px;
        font-weight: bold; */
        }

        .header a.active {
            color: white;
        }

        .header a.active:hover {
            background-color: #ddd;
            color: black;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>
</head>

<body>
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
            background-image: url("image/image.jpg");
            min-height: 650px;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Add styles to the form container */
        .container {
            position: absolute;
            right: 20px;
            top:100px;
            margin: 20px;
            max-width: 300px;
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
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

        .btn:hover {
            opacity: 1;
        }
    </style>
    </head>

    <body>
        <div class="bg-img">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" class="container">
                <h1>Student Login</h1>

                <label for="Register Number"><b>Register Number</b></label>
                <input type="text" placeholder="Enter register number" name="reg_no" autocomplete="off" maxlength="8" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter password" name="password" automcomplete="off" required>

                <button type="submit" class="btn" name="submit" value="submit">Login</button>
            </form>
        </div>


    </body>

</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>