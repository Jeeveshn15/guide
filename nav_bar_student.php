<?php
    include "./home_header.php";
    session_start();
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: student_login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  font-family: "Roboto", sans-serif;
  margin: 0;
  padding-top: 60;
  width: 200px;
  background-color: rgba(131, 18, 56, 1);
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #ddd;
  color: black;
}

.sidebar a:hover:not(.active) {
  background-color: #ddd;
  color: black;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <a href="./student_home.php">Home</a>
  <a href="./upload_ppt.php">Upload PPT</a>
  <a href="./upload_report.php">Upload Report</a>
  <a href="./upload_demo.php">Upload Demo</a>
  <a href="./reset_password.php">Reset Password</a>
</div>
</body>
</html>