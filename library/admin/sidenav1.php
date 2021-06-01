<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
         
        
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
  <div class="h"><a href="delete.php"> Delete Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="">Book Information</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>

    </div>
    
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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