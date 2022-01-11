<?php 
require 'dbConnection.php';
  
$id = $_GET['id'];

 $sql = "select * from blog where ID = $id ";
 $data = mysqli_query($con,$sql);

  if( mysqli_num_rows($data) == 1){
     
     
     $sql = "delete from blog where ID = $id";
     $op  = mysqli_query($con,$sql);
     if($op){
        $Message =  "Raw Deleted";
     }else{
        $Message =  'Error try Again';
     }


  }else{
       $Message =  "Invalid Id ";
  }


   $_SESSION['Message'] = $Message;

   header("location: index.php");


?>