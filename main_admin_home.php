<?php
    include './dbconnect.php';
    // include './nav_bar_admin.php';
    session_start();
    $guide_name=$count="";
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: admin_login.php");
        exit();
    }
    $email=isset($_SESSION['email'])?$_SESSION['email']:'';
    // $record=mysqli_query($con,"SELECT * FROM registrations ");
    // $sql="SELECT * FROM registrations ORDER BY guide_name";
    $sql="SELECT * FROM student_credentials ORDER BY guide_name";
    $result=mysqli_query($con,$sql);
    $count=$result->num_rows;  
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./assets/js/table2excel.js" type="text/javascript">
    </script>

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
        }

        .header a.active{
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
    <div class="header">
        <img class="logo" src="./assets/img/sistlogo.jpg" alt="logo" />
        <div class="header-right">
            <a class="active" href="./logout.php">LOGOUT </a>

        </div>
    </div>


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
            /* width:50%; */
            padding:10px;
        }
        table{
            border-collapse: collapse;
            margin-left: auto; 
            margin-right: auto;
            border:3px solid black;
            text-align: center;
            width:40%;
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
    </head>


    <body>
        <br>
        <button type="submit" name="downloadexcel" id="downloadexcel" class="open-button">Download Excel File</button>
        <h2> PROJECT ADMIN </h2><br><br>
        <h3> LIST OF ALL REGISTERED STUDENTS</h3>
        <div style="overflow-x:auto;">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>STUDENT NAME</th>
                        <th>REGISTER NUMBER</th>
                        <th>GUIDE NAME</th>
                        <th>PROJECT TITLE</th>
                        <th>PPT</th>
                        <th>REPORT</th>
                        <th>DEMO</th>
                        <th>APPROVAL STATUS</th>
                        <!-- <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>TEAM MATE</th>
                        <th>STUDENT NAME</th>
                        <th>REGISTER NUMBER</th> -->
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    while($count>0){
                        $row=mysqli_fetch_array($result);
                        echo "<tr>
                            <td>".$i."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["reg_no"]."</td>
                            <td>".$row["guide_name"]."</td>
                            <td>".$row["project_title"]."</td>
                            <td>"."<a href='./uploads/ppt/".$row["ppt"]."' target='_blank'>".$row["ppt"]."</a>"."</td>
                            <td>"."<a href='./uploads/report/".$row["report"]."' target='_blank'>".$row["report"]."</a>"."</td>
                            <td>"."<a href='./uploads/demo/".$row["demo"]."' target='_blank'>".$row["demo"]."</a>"."</td>
                            <td>".$row["approval_status"]."</tr>";
                        $count=$count-1;
                        $i=$i+1;
                    }
                
                ?>

                </tbody>
            </table>
        </div>

    </body>

</body>
</body>

</html>
<script>
    document.getElementById('downloadexcel').addEventListener('click',function(){
        var table2excel= new Table2Excel();
        table2excel.export(document.querySelectorAll("#table"));
    });

    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>