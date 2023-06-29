<?php
    $servername='localhost';
    $username='root';
    $password='MySQL#password';
    $dbname='guide_selection';
    $con=mysqli_connect($servername,$username,$password,$dbname);
    if(!$con){
        die('Could not Connect to MySql'.mysql_error());
    }
    return $con;
?>