<?php
session_start();
//3ashan aft7 connection beni w ben l database lazm ykon 3andi 4 7agat

$server="localhost";
$dbName="session7";
$dbUser="root";
$dbPassword="";
 
  $con= mysqli_connect($server,$dbUser,$dbPassword,$dbName);
   if($con){
       echo 'Connected';
   }
   else{
       die();
   }
   
?>