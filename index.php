<<?php 
 require 'dbConnection.php';

 $sql = "select * from blog";

 $objData = mysqli_query($con,$sql);


?>







<!DOCTYPE html>
<html>

<head>
    <title> Read Data</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <div class="container">
 

        <div class="page-header">
            <h1>Read Users </h1> 
            <br>

          <?php 
          

           if(isset($_SESSION['Message'])){
             echo $_SESSION['Message'];
             unset($_SESSION['Message']);
           }

          ?>


        </div>



        <table class='table table-hover table-responsive table-bordered'>
           
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th> 
                <th>Action</th>         
        
            </tr>

       <?php 
       
            while($data = mysqli_fetch_assoc( $objData) ){
       ?>
           <tr>
                 <td><?php echo $data['ID'];?></td>
                 <td><?php echo $data['Title'];?></td>
                 <td><?php echo $data['Content'];?></td>
                 <td><?php echo $data['Image'];?></td>

                 <td>
                 <a href='Delete.php?id=<?php echo $data['ID'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='Edit.php?id=<?php echo $data['ID'];?>' class='btn btn-primary m-r-1em'>Edit</a>           
                </td> 
           </tr> 
    
       <?php } ?>
           
        </table>

    </div>
    

</body>

</html>