<?php
    include "connection.php";
    session_start();
    
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin  Login </title>
    <link rel="stylesheet" type="text/css" href="style.css ">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
     .log_img {
                                   height: 630px;
                                   margin-top: 0px;
                                   background-image: url("images/3.jpg");
                               }
                               
    </style>

</head>

<body>


 <!--  
   <nav class="Navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">biblio.ENISO </a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href=" index.php">HOME</a></li>
                <li><a href="books.php ">BOOKS</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="student_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a>
                </li>
                <li><a href="student_login.php "><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
               <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
            </ul>
        </div>
    </nav>
-->
<header>
    <div class="logo ">
            <h1 style="color:white;font-size:30px;line-height:50px;margin-top:20px; ">&nbsp &nbsp &nbsp biblio.ENISO
            </h1>
        </div>
        <nav>
           
            <ul style="padding-right:1000px; margin:-105px auto;">
                <li><a href="index.php "> HOME</a></li>
                <li><a href="books.php "> BOOKS</a></li>
                <li><a href="feedback.php "> FEEDBACK</a></li>
               
            </ul>
         </nav>
         <nav>
            <ul class="navbar-right" style="margin:-147px auto; ">

                <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-out" style="word-spacing:0px;"> LOGOUT </span></a></li>
                <li><a href="admin_login.php "><span class="glyphicon glyphicon-log-in" style="word-spacing:0px;"> LOGIN  </span></a></li>
               <li><a href="registration.php" ><span class="glyphicon glyphicon-user" style="word-spacing:0px;"> SIGN UP</span></a></li>
            </ul>
         </nav>
        

    </header>

   
 <section>
        <div class="log_img">
            <br><br><br>
            <div class="box1 ">
                <h1 style="text-align: center; font-size: 45px;font-family: Lucida Console; "> biblio.ENISO</h1><br>
                <h1 style="text-align: center; font-size: 25px; "> User Login Form
                </h1><br><br><br>

                <form name="login " action=" " method="post">
                    <div class="login ">
                        <input class="form-control" type="text" name="username" placeholder="Username" required=" "><br>
                        <input class="form-control" type="password" name="password" placeholder="Password" required=" "><br>
                        <input class="btn btn-default" type="submit" name="submit" value="login " style="color:black; width: 70px;height:30px; ">
                    </div>

                </form>
                <p style="color:white; padding-left:15px; ">
                    <br> <br> <br>

                    <a style="color:yellow;text-decoration:none; " href="update_password.php"> Forgot password ?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp New to this website?
                    <a style="color:yellow;text-decoration:none; " href="registration.php ">Sign Up</a>
                </p>

            </div>

        </div>
    
    </section>
<?php
if(isset($_POST['submit']))
{   
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin` where username='$_POST[username]' && `password`='$_POST[password]';");
   
   $row=mysqli_fetch_assoc($res);
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
            <script type="text/javascript">
                 alert("The username  and the password doesn't match");
            </script>
        <?php        
    }
    else
    {   
        /* -----------if username & password matches--------- */
        $_SESSION['login_user']=$_POST['username'];
        $_SESSION['pic']=$row['pic'];
        ?>
             <script type="text/javascript">
                window.location="index.php"
            </script>
           <!-- <div class="alert alert-danger" style="width:700px;margin-left:370px;background-color:#de1313;color:white">
                <strong>The username and password doesn't match</strong>

            </div>-->
        <?php
    }
}
?>
 
</body>

</html>