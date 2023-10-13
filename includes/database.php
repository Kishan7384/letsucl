<?php 
 $hostname = "localhost";
 $username = "u721884507_ucluser";
 $password = "Anuraj@123";
 $database = "u721884507_ucldb";

 $conn = mysqli_connect($hostname,$username,$password,$database);
 if(!$conn){
    echo "database Not Connected ";
 }
//  else{
//     echo "Database Connected";
//  }

?>