<?php
    include './header.php';
    include './dbconnect.php';
    
    $member1_name=$member1_regno=$member1_email=$member1_phno="";
    $member2_name=$member2_regno=$member2_email=$member2_phno="";
    $message=$sql_query1=$sql_query2=$sql_query3=$flag=$project_title="";
    if($_SERVER["REQUEST_METHOD"]== "POST"){
      #validating member-1 name
      $member1_name= test_input($_POST["member1_name"]);
      $checkname=str_replace(" ","",$member1_name);
      if(!preg_match("/^[a-zA-Z.]*$/",$checkname)){
        $message="Only letters and white spaces are allowed";
        echo "<script>alert('$message');</script>";
        mysqli_close($con);
      }
      else{
        #validating member-1 register number
        $member1_regno=test_input($_POST["member1_regno"]);      
        $member1_phno=test_input($_POST["member1_phno"]);
        $member1_email=test_input($_POST["member1_email"]);
        $guide_name=test_input($_POST["guide"]);
        $project_title=test_input($_POST["project_title"]);

        $member2_name=test_input($_POST["member2_name"]);
        if(!(empty($member2_name))){
          $checkname=str_replace(" ","",$member2_name);
          if(!preg_match("/^[a-zA-Z.]*$/",$checkname)){
            $message="Only letters and white spaces are allowed";
            echo "<script>alert('$message');</script>";
          }
          $member2_regno=test_input($_POST["member2_regno"]);
          $member2_email=test_input($_POST["member2_email"]);
          $member2_phno=test_input($_POST["member2_phno"]);
        }
        else{
          $member2_name=NULL;
          $member2_email=NULL;
          $member2_phno=NULL;
          $member2_regno=NULL;
        }
        
        if(isset($_POST["submit"])){
          #guide subhashini
          if($guide_name==='Dr.R.Subhashini'){
            $records=mysqli_query($con,"SELECT * FROM guide_subhashini");
            if(mysqli_num_rows($records)=='5'){              
              echo "<script>alert('Guide Dr.R.Subhashini NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_subhashini(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide gowri
          if($guide_name=='Dr.S.Gowri'){
            $records=mysqli_query($con,"SELECT * FROM guide_gowri");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.S.Gowri NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_gowri(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide jabez
          if($guide_name=='Dr.Jabez'){
            $records=mysqli_query($con,"SELECT * FROM guide_jabez");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.Jabez NOT AVAILABLE, Choose another guide!');</script>";}
            else{
              $flag="TRUE"; 
              $sql_query2="INSERT INTO guide_jabez(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide nirmalrani
          if($guide_name=='Dr.Nirmalrani V'){
            $records=mysqli_query($con,"SELECT * FROM guide_nirmalrani");
            if(mysqli_num_rows($records)=='4'){              
              echo "<script>alert('Guide Dr.Nirmalrani V NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_nirmalrani(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide revathy
          if($guide_name=='Dr.S.Revathy'){
            $records=mysqli_query($con,"SELECT * FROM guide_revathy");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.S.Revathy NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_revathy(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide mary gladence
          if($guide_name==='Dr.L.Mary Gladence'){
            $records=mysqli_query($con,"SELECT * FROM guide_marygladence");
            if(mysqli_num_rows($records)=='4'){
             
              echo "<script>alert('Guide Dr.L.Mary Gladence NOT AVAILABLE, Choose another guide');</script>";}
            else{
               $flag="TRUE";
              $sql_query2="INSERT INTO guide_marygladence(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide ajitha
          if($guide_name==='Dr.P.Ajitha'){
            $records=mysqli_query($con,"SELECT * FROM guide_ajitha");
            if(mysqli_num_rows($records)=='5'){
              echo "<script>alert('Guide Dr.P.Ajitha NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_ajitha(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide bevish
          if($guide_name==='Dr.Y.Bevish Jinila'){
            $records=mysqli_query($con,"SELECT * FROM guide_bevish");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.Y.Bevish Jinila NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_bevish(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide ajitha
          if($guide_name==='Dr.P.Jeyanthi'){
            $records=mysqli_query($con,"SELECT * FROM guide_jeyanthi");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.P.Jeyanthi NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_jeyanthi(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide gomathi
          if($guide_name==='Dr.R.M.Gomathi'){
            $records=mysqli_query($con,"SELECT * FROM guide_gomathi");
            if(mysqli_num_rows($records)=='5'){              
              echo "<script>alert('Guide Dr.R.M.Gomathi NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_gomathi(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          // #guide senduru srinivasulu
          #guide gomathi
          if($guide_name==='Dr.Senduru Srinivasulu'){
            $records=mysqli_query($con,"SELECT * FROM guide_sendurusrinivasulu");
            if(mysqli_num_rows($records)=='4'){              
              echo "<script>alert('Guide Dr.Senduru Srinivasulu NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_sendurusrinivasulu(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          
          #guide sivasangari
          if($guide_name==='Dr.A.Sivasangari'){
            $records=mysqli_query($con,"SELECT * FROM guide_sivasangari");
            if(mysqli_num_rows($records)=='5'){
              echo "<script>alert('Guide Dr.A.Sivasangari NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_sivasangari(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide brumancia
          if($guide_name==='Dr.Brumancia'){
            $records=mysqli_query($con,"SELECT * FROM guide_brumancia");
            if(mysqli_num_rows($records)=='5'){
              echo "<script>alert('Guide Dr.Brumancia NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_brumancia(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide mathivanan
          if($guide_name==='Dr.G.Mathivanan'){
            $records=mysqli_query($con,"SELECT * FROM guide_mathivanan");
            if(mysqli_num_rows($records)=='4'){
              echo "<script>alert('Guide Dr.G.Mathivanan NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_mathivanan(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }         
          #guide jeberson
          if($guide_name==='Dr.R.Jeberson Retna Raj'){
            $records=mysqli_query($con,"SELECT * FROM guide_jeberson");
            if(mysqli_num_rows($records)=='5m  '){
              echo "<script>alert('Guide Dr.R.Jeberson Retna Raj NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag="TRUE";
              $sql_query2="INSERT INTO guide_jeberson(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          #guide veeramuthu
          if($guide_name==='Dr.A.Veeramuthu'){
            $records=mysqli_query($con,"SELECT * FROM guide_veeramuthu");
            if(mysqli_num_rows($records)=='2'){
              echo "<script>alert('Guide Dr.A.Veeramuthu NOT AVAILABLE, Choose another guide');</script>";}
            else{
              $flag='TRUE';
              $sql_query2="INSERT INTO guide_veeramuthu(id,project_title,student_1_name,student_1_reg_no,student_1_email,student_1_ph_no,student_2_name,student_2_reg_no,student_2_email,student_2_ph_no) VALUES (NULL,'$project_title','$member1_name','$member1_regno','$member1_email','$member1_phno','$member2_name','$member2_regno','$member2_email','$member2_phno')";
            }
          }
          if($flag==='TRUE'){
            if(empty($member2_name)){
              $duplicate=mysqli_query($con,"select * from registrations where student_1_reg_no='$member1_regno' or student_2_reg_no='$member1_regno'");
            }
            else{
              $duplicate=mysqli_query($con,"select * from registrations where student_1_reg_no='$member1_regno' or student_1_reg_no='$member2_regno' or student_2_reg_no='$member2_regno' or student_2_reg_no='$member1_regno'");
            }
            
            if(mysqli_num_rows($duplicate)>0){
              $message='TEAM REGISTERED ALREADY!!';
              echo "<script>alert('$message');</script>";
            }
            else{
              $sql_query1="INSERT INTO registrations(id,guide_name,project_title,student_1_name,student_1_reg_no,student_1_ph_no,student_1_email,student_2_name,student_2_reg_no,student_2_ph_no,student_2_email) VALUES (NULL,'$guide_name','$project_title','$member1_name','$member1_regno','$member1_phno','$member1_email','$member2_name','$member2_regno','$member2_phno','$member2_email')";

            
              if((!(empty($sql_query2)))){
              if((mysqli_query($con,$sql_query1)) & (mysqli_query($con,$sql_query2))){
                $message='SUCCESSFULLY REGISTERED!!';
                echo "<script>alert('$message');</script>";
              }
              else{
                $message='connect error';
                echo "<script>alert('$message');</script>";
              }
              }   
            }
          }}
        }
      }
    function test_input($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
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
          width: 100%;
          padding: 10px;
        }
      }
      .mandatory{
        color:red;
      }
    </style>
  </head>
  <body>
    <div class="bg-img">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="container" method="post">
        <h2>Guide Selection</h2>
        <div class="column">
          <label for="member1_name"><b>Team Member-1 Name <span class="mandatory">*</span></b></label>
          <input type="text" placeholder="Enter name" name="member1_name" autocomplete="off" required />

          <label for="member1_regno"><b>Register Number <span class="mandatory">*</span></b></label>
          <input type="text" placeholder="Enter register number" name="member1_regno" minlength="8" maxlength="8" autocomplete="off" required />

          <label for="member1_phno"><b>Phone Number <span class="mandatory">*</span></b></label>
          <input type="text" placeholder="Enter phone number" name="member1_phno" minlength="10" maxlength="10" autocomplete="off" required />

          <label for="member1_email"><b>Mail ID <span class="mandatory">*</span></b></label>
          <input type="email" placeholder="Enter email" name="member1_email" autocomplete="off" required />    

          <label for="guide"><b>Select Guide <span class="mandatory">*</span></b></label>
          <select name="guide" id="guide" required>
            <option value="" disabled selected>Select Guide</option>
            <option value="Dr.R.Subhashini" disabled selected>Dr.R.Subhashini</option>
            <option value="Dr.S.Gowri" disabled selected>Dr.S.Gowri</option>
            <option value="Dr.Jabez" disabled selected>Dr Jabez J</option>
            <option value="Dr.Nirmalrani V" disabled selected>Dr.Nirmalrani V</option>
            <option value="Dr.S.Revathy">Dr.S.Revathy</option>
            <option value="Dr.L.Mary Gladence">Dr.L.Mary Gladence</option>
            <option value="Dr.P.Ajitha" disabled selected>Dr P Ajitha</option>
            <option value="Dr.Y.Bevish Jinila" disabled selected>Dr.Y.Bevish jinila</option>
            <option value="Dr.P.Jeyanthi">Dr.P.Jeyanthi</option>
            <option value="Dr.R.M.Gomathi" disabled selected>Dr.R.M.Gomathi</option>
            <option value="Dr.Senduru Srinivasulu" disabled selected>Dr.Senduru Srinivasulu</option>
            <option value="Dr.A.Sivasangari" disabled selected>Dr.A.Sivasangari</option>
            <option value="Dr.Brumancia">Dr. Brumancia</option>
            <option value="Dr.G.Mathivanan" disabled selected>Dr.G.Mathivanan</option>
            <option value="Dr.R.Jeberson Retna Raj">
              Dr.R.Jeberson Retna Raj
            </option>
            <option value="Dr.A.Veeramuthu">Dr.A.Veeramuthu</option>
          </select>
        </div>

        <div class="column">
          <label for="member2_name"><b>Team Member-2 Name</b></label>
          <input type="text" placeholder="Enter name" name="member2_name" autocomplete="off"/>

          <label for="member2_regno"><b>Register Number</b></label>
          <input type="text" placeholder="Enter register number" name="member2_regno" minlength="8" maxlength="8" autocomplete="off"/>

          <label for="member2_phno"><b>Phone Number</b></label>
          <input type="text" placeholder="Enter phone number" name="member2_phno" minlength="10" maxlength="10" autocomplete="off"/>

          <label for="member2_email"><b>Mail ID</b></label>
          <input type="email" placeholder="Enter email" name="member2_email" autocomplete="off"/>
          
          <label for="project_title"><b>Project Title <span class="mandatory">*</span></b></label>
          <input type="text" placeholder="Enter project title" name="project_title" autocomplete="off" required/>

        </div>
        <button type="submit" value="submit" name="submit" class="btn">REGISTER</button>
      </form>
    </div>
  </body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
