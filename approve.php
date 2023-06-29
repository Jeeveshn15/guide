<?php
include "./dbconnect.php";
$reg_no=$_POST["reg_no"];
if(isset($_POST["reg_no"])){
    $sql="UPDATE student_credentials SET approval_status='APPROVED' WHERE reg_no=$reg_no";
    $result=mysqli_query($con,$sql);
    if(!$result){
        print_r("ERROR");
    }
}?>