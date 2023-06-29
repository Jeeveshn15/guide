<?php
    include "./dbconnect.php";
    include "./nav_bar_student.php";
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: student_login.php");
        exit();
    }
    $reg_no=$message=$file=$file_loc=$final_file="";
    $reg_no=$_SESSION["reg_no"];
    $query= "SELECT * FROM student_credentials WHERE reg_no='$reg_no'";
    $result=mysqli_query($con,$query);
    $count=$result->num_rows;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $reg_no=$_SESSION["reg_no"];
        if(isset($_FILES['submit'])){}
        $file=$_FILES['file']['name'];
        $file_loc=$_FILES['file']['tmp_name'];
        $folder="./uploads/report/";
        // making file name in lowercase
        $new_file_name=strtolower($reg_no."-report");
        $final_file=str_replace(' ','-',$new_file_name);
        if(move_uploaded_file($file_loc,$folder.$final_file)){ 
            $sql="UPDATE student_credentials SET report='$final_file' WHERE reg_no='$reg_no'";
            if(mysqli_query($con,$sql)){
                $message='SUCCESSFULLY REGISTERED!!';
                echo "<script>alert('$message');</script>";
            }
            else{
                echo "error";
            }
        }
    }
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    ?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="./assets/css/student_style.css" />
  </head>
<body>
<div class="container">
    <p>FILE AVAILABLE:</p>
    <?php 
        if($count==0){
            echo "No file exists";
        }
        else{
            while($count>0){
                    $row=mysqli_fetch_array($result);
                    if($row["report"]==NULL){
                        echo "No file exists";
                    }
                    else{
                        echo "<a href='./uploads/report/".$row["report"]."' target='_blank'>".$row["report"]."</a>";
                    }
                    $count=$count-1;
                }
        }
        ?>
</div>
<div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" name="upload_ppt" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="file">Upload Report</label>
                </div>
                <div class="col-75">
                    <input type="file" id="file" name="file" required>
                </div>
            </div><br>
        <div class="row">
            <div class="col-75">
            <input type="submit" value="submit" name="submit"></div>
        </div>

        </form>
    </div>
</body>
<html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>