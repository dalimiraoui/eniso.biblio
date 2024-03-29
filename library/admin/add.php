<?php
include "navbar.php";
include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
             background-color:#23a3d0;
        font-family: "Lato", sans-serif;
        }

        .sidenav {
        height: 100%;
        margin-top:50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        opacity: 0.7;
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        .img-circle{
          margin-left:40px;

        }
        .h:hover
        {
          color:white;
          width:250px;
          height:50px;
          background-color:#00544c;
        }
        .book
        {
          width:400px;
          margin:0px auto;
        }
        .form-control
        {
          background-color:#080707;
          color:white;
        }


    </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color:white; font-size:25px; margin-left:30px;"> 

                              <?php
                                if(isset($_SESSION['login_user']))
                                {
                                     echo "<img  class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                                     echo"</br>";
                                     echo"Welcome ".$_SESSION['login_user'] ;
                                }
                                ?>
   </div>
  
  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delate.php"> Delete Books</a></div>
  <div class="h"><a href="#">Book Request</a></div>
  <div class="h"><a href="#">Book Information</a></div>
  <div class="h"><a href="#">Issue Information</a></div>

</div>
<div id="main">
    
  <span style="font-size:30px;cursor:pointer ;color:black;" onclick="openNav()">&#9776; open</span>
<div  class="container" style="text-align:center;"> 
        <h2 style="color:black;font-family:Lucida Consol ;text-align:center;"><b>Add New Books</b></h2><br>
        <form  class="book" action="" method="post">
              <input type="text" name="bid"class="form-control"placeholder="Book ID" required=""><br>

              <input type="text" name="name"class="form-control" placeholder="Book Name" required=""><br>
              
              <input type="text" name="authors"class="form-control"placeholder="Authors" required=""><br>
              <input type="text" name="edition"class="form-control"placeholder="Edition" required=""> <br>
              <input type="text" name="status"class="form-control"placeholder="Status" required=""><br>
              <input type="text" name="quantity"class="form-control"placeholder="Quantity" required=""><br>
              <input type="text" name="department"class="form-control"placeholder="Department" required=""><br>
          <button   class="btn btn-default" type="submit"name="submit">ADD</button>           
        </form>

 </div>

 <?php
      if (isset($_POST['submit']))
      {
        if(isset($_SESSION['login_user']))
        {
          mysqli_query($db,"INSERT INTO  `books` VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]'); ");
          //mysqli_query($db,"INSERT INTO `books`(`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]''$_POST[department]';");
          
          
          ?>
          <script type="text/javascript">
          alert("Book added successfully .");
          
          
          </script>


          <?php
        }else
        {
          ?>
          <script type="text/javascript">
          alert("You need to login first.");
          
          
          </script>


          <?php

        }

      }
 ?>



</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


</body>
</html>