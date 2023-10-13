<?php 
 $hostname = "localhost";
 $username = "u937101075_kpsucl";
 $password = "Anuraj@123";
 $database = "u937101075_kpsucl";

 $conn = mysqli_connect($hostname,$username,$password,$database);
 if(!$conn){
    echo "database Not Connected ";
 }
//  else{
//     echo "Database Connected";
//  }

?>