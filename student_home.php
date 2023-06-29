<?php
    include "./nav_bar_student.php";
    include "./dbconnect.php";
    $reg_no=$count="";
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: student_login.php");
        exit();
    }
    $reg_no=$_SESSION["reg_no"];
    // $sql="SELECT * FROM student_credentials WHERE reg_no='$reg_no'";
    $sql1="SELECT * FROM registrations WHERE student_1_reg_no='$reg_no' or student_2_reg_no='$reg_no'";
    // $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_array($result1);
    if(isset($row1)){
        $guide_name=$row1["guide_name"];
        if($row1["student_1_reg_no"]===$reg_no){
            $name=$row1["student_1_name"];
            $email=$row1["student_1_email"];
            $ph_no=$row1["student_1_ph_no"];
            $team_mate=$row1["student_2_name"];
        }
        else{
            $name=$row1["student_2_name"];
            $email=$row1["student_2_email"];
            $ph_no=$row1["student_2_ph_no"];
            $team_mate=$row1["student_1_name"];
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        th,td{
            border-collapse: collapse;
            margin-left: auto; 
            margin-right: auto;
            border:3px solid black;
            text-align: center;
            width:50%;
            padding:20px;
        }
        table{
            border-collapse: collapse;
            margin-left: auto; 
            margin-right: auto;
            margin-top: 6%;
            border:3px solid black;
            text-align: center;
            width:50%;
        }
        th{
            padding:10px;
        }
        h2{
            margin-left:40px;
        }
        h3{
            text-align: center;
        }
        .open-button {
            background-color: rgba(131, 18, 56, 1);
            font-weight:bold;
            color: white;
            padding: 16px 20px;
            margin: 8px;
            width: 140px;
            right: 20px;
            opacity: 0.9;
            float: right;
            margin-right: 45px;
        }
    </style>
        
        <div style="overflow-x:auto;">
            <table class="table" id="table" width=80% >
                <tbody>
                    <tr>
                        <td> Name </td>
                        <td><?php echo $name; ?>
                    </tr>
                    <tr>
                        <td> Register Number </td>
                        <td><?php echo $reg_no; ?></td>
                    </tr>
                    <tr>
                        <td> Guide Name </td>
                        <td><?php echo $guide_name; ?></td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td> Phone Number </td>
                        <td><?php echo $ph_no; ?></td>
                    <tr>
                    <tr>
                        <td> Team member </td>
                        <td><?php echo $team_mate; ?></td>
                    <tr>


                </tbody>
            </table>
        </div>

    </body>

</html>
