<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
    body
    { 
       background-image: url("images/66.jpg");

    }
    
    .wrapper
    {
      padding: 10px;
      margin: auto;
      width:900px;
      height:600px;
      background-color:black;
      opacity: 0.8;
      color:white;
      margin-right:225px;
    }
    .form-control
    {
      height:70px;
      width:58%;
      
    }
    .scroll
    {
      width:100%;
      height:300px;
      overflow:auto;
    }

</style>

</head>
<body>

<div class="wrapper">
    <h4>IF you have any suggestion or question please comment below.</h4>
<form  style="text"  action="" method="post">
    <input class="form-control"  type="text" name="comment" placeholder="Write something..."><br>
    <input  class="btn btn-default" type="submit" name="submit" value="Comment" style="width:100px; height:35px;">
</form>
<br><br>


    <div class="scroll">
    <?php
    if(isset($_POST['submit']))
    {
      $sql=" INSERT INTO `comments`VALUES('','$_POST[comment]','Admin') ;";
      if(mysqli_query($db,$sql))
      {
        $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
        $res=mysqli_query($db,$q);
        
        echo "<table class='table table-bordered'>";
        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
              echo "<td>"; echo $row['username'] ;echo"</td>";
              echo "<td>"; echo $row['comment'] ;echo"</td>";
         echo "</tr>";

        }
      }
    }
    else
    {
      $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
      $res=mysqli_query($db,$q);
      
      echo "<table class='table table-bordered'>";
      while($row=mysqli_fetch_assoc($res))
      {
          echo "<tr>";
          echo "<td>"; echo $row['username'] ;echo"</td>";
            echo "<td>"; echo $row['comment'] ;echo"</td>";
            echo "</tr>";
    
      }
    }
    ?>
    </div>
</div>

</body>
</html>