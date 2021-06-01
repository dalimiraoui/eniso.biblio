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
    <title>Change Password </title>
    <style type="text/css">
    body
    {
        
        background-image : url("images/12.jpg");
        
    }
    .wrapper{
        width:400px;
        height:400px;
        margin:150px auto;
        background-color:black;
        opacity:.7;
        color:white;
        padding:17px;
        margin-left:580px;
    }
    .form-control 
    {
        width:300px;
        
    }
    
    
    </style>
</head>
<body>
    <div class="wrapper">
         <div style="text-align: center;">
             <h1 style="text-align: center; font-size: 45px;font-family: Lucida Console; "> Change Your Password</h1><br>
     
         </div>
      <div style="padding-left:30px;">
         <form action="" method="post">
                     <input class="form-control" type="text" name="username" placeholder="Username" required=" "><br>
                     <input class="form-control" type="text " name="email" placeholder="Email " required=" "><br> 
                     <input class="form-control" type="password" name="password" placeholder="New Password" required=" "><br>
                     <input class="btn btn-default" type="submit" name="submit" value="Update" style="color:black; width: 70px;height:30px; ">


        
        
          </form>
      </div>
    
    
    </div>

    <?php
    if( isset($_POST['submit']))
    {

       if( $sql=mysqli_query($db,"UPDATE `admin` SET password='$_POST[password]' where username='$_POST[username]' AND email='$_POST[email]';"))
        {
            ?>
        
               <script type="text/javascript">
                  alert("The password updated successfully");
               </script>
            <?php
        }
    }




    ?>
    
</body>
</html>













