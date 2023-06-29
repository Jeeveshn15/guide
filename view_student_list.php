<?php
    include './dbconnect.php';
    include './nav_bar_admin.php';
    // session_start();
    $guide_name=$count="";
    if(!(isset($_SESSION['logged_in']))){
        $message="LOGIN TO CONTINUE!!";
        echo "<script>alert('$message');</script>";
        header("Location: admin_login.php");
        exit();
    }
    $email=isset($_SESSION['email'])?$_SESSION['email']:'';
    if($_SESSION['email']=='gomssrm@gmail.com'){
        header("Location: main_admin_home.php");
        exit();
    }
    if($_SESSION['email']=='subhashini.it@sathyabama.ac.in'){
        $guide_name="Dr.R. Subhashini";
        $sql="SELECT * FROM guide_subhashini";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;  
    }
    if($_SESSION['email']=='gowri.it@sathyabama.ac.in'){
        $guide_name="Dr.S.Gowri";
        $sql="SELECT * FROM guide_gowri";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='jabezme@gmail.com'){
        $guide_name="Dr.Jabez";
        $sql="SELECT * FROM guide_jabez";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='nirmalrani.it@sathyabama.ac.in'){
        $guide_name="Dr.Nirmalrani V";
        $sql="SELECT * FROM guide_nirmalrani";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='revathy.it@sathyabama.ac.in'){
        $guide_name="Dr.S.Revathy";
        $sql="SELECT * FROM guide_revathy";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='marygladence.it@sathyabama.ac.in'){
        $guide_name="Dr.L.Mary Gladence";
        $sql="SELECT * FROM guide_marygladence";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='ajitha.it@sathyabama.ac.in'){
        $guide_name="Dr.P.Ajitha";
        $sql="SELECT * FROM guide_ajitha";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='bevishjinila.it@sathyabama.ac.in'){
        $guide_name="Dr.Y.Bevish Jinila";
        $sql="SELECT * FROM guide_bevish";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='jeyanthi.it@sathyabama.ac.in'){
        $guide_name="Dr.P.Jeyanthi";
        $sql="SELECT * FROM guide_jeyanthi";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='gomathi.it@sathyabama.ac.in'){
        $guide_name="Dr.R.M.Gomathi";
        $sql="SELECT * FROM guide_gomathi";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='sendurusrinivasulu.it@sathyabama.ac.in'){
        $guide_name="Dr.Senduru Srinivasulu";
        $sql="SELECT * FROM guide_marygladence";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='sivasangari.it@sathyabama.ac.in'){
        $guide_name="Dr.A.Sivasangari";
        $sql="SELECT * FROM guide_sivasangari";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='brumancia.it@sathyabama.ac.in'){
        $guide_name="Dr.Brumancia";
        $sql="SELECT * FROM guide_brumancia";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='mathivanan.it@sathyabama.ac.in'){
        $guide_name="Dr.G.Mathivanan";
        $sql="SELECT * FROM guide_mathivanan";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='jebersonretnaraj.it@sathyabama.ac.in'){
        $guide_name="Dr.R.Jeberson Retna Raj";
        $sql="SELECT * FROM guide_jeberson";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    if($_SESSION['email']=='veeramuthu.it@sathyabama.ac.in'){
        $guide_name="Dr.A.Veeramuthu";
        $sql="SELECT * FROM guide_veeramuthu";
        $result=mysqli_query($con,$sql);
        $count=$result->num_rows;   
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
            margin-right: 5%;
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
    </head>


    <body>
        <br>
        <!-- <button type="submit" name="downloadexcel" id="downloadexcel" class="open-button">Download Excel File</button> -->
        <h3> LIST OF STUDENTS</h3>
        <div style="overflow-x:auto;">
            <table class="table" id="table" width=70%>
                <thead>
                    <tr>
                        <th style="width:50%">S.No</th>
                        <th>STUDENT NAME</th>
                        <th>REGISTER NUMBER</th>
                        <th>PROJECT TITLE</th>
                        <th>PPT</th>
                        <th>REPORT</th>
                        <th>DEMO</th>
                        <th>APPROVE STATUS</th>
                        <th>APPROVE </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    while($count>0){
                        $row=mysqli_fetch_array($result);
                        $sql1="SELECT * FROM student_credentials WHERE reg_no=$row[student_1_reg_no]";
                        $result1=mysqli_query($con,$sql1);
                        if(!$result1){
                            echo "error";
                        }
                        else{
                        $row2=mysqli_fetch_array($result1);
                        $count1=$result1->num_rows;
                        while($count1>0){
                            $reg_no=$row2["reg_no"];
                            echo "<tr>
                            <td>".$i."</td>
                            <td>".$row2["name"]."</td>
                            <td>".$row2["reg_no"]."</td>
                            <td>".$row["project_title"]."</td>
                            <td>"."<a href='./uploads/ppt/".$row2["ppt"]."' target='_blank'>".$row2["ppt"]."</a>"."</td>
                            <td>"."<a href='./uploads/report/".$row2["report"]."' target='_blank'>".$row2["report"]."</a>"."</td>
                            <td>"."<a href='./uploads/demo/".$row2["demo"]."' target='_blank'>".$row2["demo"]."</a>"."</td>
                            <td>".$row2["approval_status"]."</td>
                             <td><button type='submit' name='submit_1' value='submit_1' class='approval'
                            id='approval'>Approve</button> </td></tr>";
                            $count1= $count1-1;
                            $i=$i+1;
                        }
                    }
                        $sql1="SELECT * FROM student_credentials WHERE reg_no=$row[student_2_reg_no]";
                        $result1=mysqli_query($con,$sql1);
                        if($result1){
                        $row2=mysqli_fetch_array($result1);
                        $count1=$result1->num_rows;
                        while($count1>0){
                             echo "<tr><td>".$i."</td><td>".$row2["name"]."</td><td class='reg_no'>".$row2["reg_no"]."</td><td>".$row["project_title"]."</td><td>"."<a href='./uploads/ppt/".$row2["ppt"]."' target='_blank'>".$row2["ppt"]."</a>"."</td><td>"."<a href='./uploads/report/".$row2["report"]." target='_blank'>".$row2["report"]."</td><td>"."<a href='./uploads/demo/".$row2["demo"]."' target='_blank'>".$row2["demo"]."</a>"."</td><td>".$row2["approval_status"]."</td><td> <button type='submit' name='submit' value='submit'
                             id='approval'
                             class='approval'>Approve</button> </td></tr>";
                            $count1= $count1-1;
                            $i=$i+1;
                            
                        }
                    }
                        $count=$count-1;
                        $i=$i+1;
                    
                    }?>

                </tbody>
            </table>
        </div>
</body>

</html>
<script>
    document.getElementById('downloadexcel').addEventListener('click',function(){
        var table2excel= new Table2Excel();
        table2excel.export(document.querySelectorAll("#table"));
    });
    // document.getElementById('approval').addEventListener('click',function(){
    //     var currentRow=$(this).closest("tr");
    //         var reg_no=currentRow.find("td:eq(0)").text();
    //         alert(reg_no);
    // });

    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
    $(document).ready(function(){
        $("#approval").on('click',function(){
            var currentRow=$(this).closest("tr");
            var reg_no=currentRow.find("td:eq(2)").text();
            var data={};
            data.reg_no=reg_no;
            alert(reg_no);
            $.ajax({
                url:"./approve.php",
                method:"post",
                data: data,
                success: function(data){
                    alert(data);
                },
                error:function(){
                    alert('Failed');
                }
            })

        });
    });
    
</script>