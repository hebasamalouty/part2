<?php

require 'dbConnection.php';
$id = $_GET['id'];

$sql = "select * from blog where ID = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    
    $Blogdata = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: index.php');
}

 function Clean($input){

    return  trim(strip_tags(stripslashes($input)));
  }

if($_SERVER['REQUEST_METHOD'] == "POST"){

$Title    = Clean($_POST['Title']);
$Content   = Clean($_POST['Content']);



 $errors = [];

 if(empty($Title)){
    $errors['Title'] = "Field Required";
}

if(empty($Content)){
    $errors['Content'] = "Field Required";
}



 if(count($errors) > 0){
     foreach ($errors as $key => $value) {
      
         echo '* '.$key.' : '.$value.'<br>';
     }
 }else{

    $sql = "update blog set Title='$Title' , Content = '$Content' where ID  = $id"; 

    $op  = mysqli_query($con,$sql);

    if($op){
        $Message = "Raw Updated";
    }else{
        $Message = "Error Try Again ".mysqli_error($con) ;
    }

    $_SESSION['Message'] = $Message;
    header("Location: index.php");

}

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update</h2>


        <form action="Edit.php?id=<?php echo $Blogdata['ID']; ?>" method="post" >

            
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" id="id" name="Title" value="<?php echo $Blogdata['Title']; ?>"
                    aria-describedby="" >
            </div>


            <div class="form-group">
                <label for="Content">Content</label>
                <input type="text" class="form-control" id="id" name="Content"
                    value="<?php echo $Blogdata['Content']; ?>"  >
            </div>



            <button type="submit" class="btn btn-primary">Edit</button>
        </form>



</body>

</html>