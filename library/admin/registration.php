<?php
     include "connection.php";
    
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration</title>
   <link rel="stylesheet" type="text/css" href=" style.css ">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
                    <a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a>
                </li>
                <a href="student_login.php "><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a>
                <a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP </span></a>
            </ul>
        </div>
    </nav>-->
    <header>
    <div class="logo ">
            <h1 style="color:white;font-size:30px;line-height:50px;margin-top:20px; ">&nbsp &nbsp &nbsp biblio.ENISO
            </h1>
        </div>
        <nav>
           
            <ul style="padding-right:1000px; margin:0px auto;">
                <li><a href="index.php "> HOME</a></li>
                <li><a href="books.php "> BOOKS</a></li>
                <li><a href="feedback.php "> FEEDBACK</a></li>
               
            </ul>
         </nav>
         <nav>
            <ul class=" navbar-right" style="margin:-120px auto; ">

                <li>
                    <a href="admin_login.php"><span class="glyphicon glyphicon-log-out" style="word-spacing:0px;"> LOGOUT </span></a></li>
                <li><a href="admin_login.php "><span class="glyphicon glyphicon-log-in" style="word-spacing:0px;"> LOGIN  </span></a></li>
               <li><a href="registration.php" ><span class="glyphicon glyphicon-user" style="word-spacing:0px;"> SIGN UP</span></a></li>
            </ul>
         </nav>
        

    </header>

   <!-- <header>
        <div class="logo">

            <h1 style="color:white;font-size:30px;line-height:40px;margin-top:20px;"> &nbsp &nbsp &nbsp &nbsp biblio.ENISO </h1>
        </div>


        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>

            </ul>
        </nav>

    </header>-->
    <section>
        <div class="reg_img">
            <div class="box2">
                <h1 style="text-align: center; font-size: 45px;font-family: Lucida Console; ">biblio.ENISO</h1><br>
                <h1 style="text-align: center; font-size: 25px; ">User Registration Form</h1><br><br><br>
                <form name="Registration" action="" method="post">
                    <div class="login">

                        <input class="form-control" type="text" name="first" placeholder="firstname " required=" "><br>
                        <input class="form-control" type="text" name="last" placeholder="lastname " required=" "><br>
                        <input class="form-control" type="text" name="username" placeholder="Username " required=" "><br>
                        <input class="form-control" type="password" name="password" placeholder="Password " required=" "><br>
                        <input class="form-control" type="text " name="phone" placeholder="phone N° " required=" "><br>
                        <input class="form-control" type="text " name="email" placeholder="Email " required=" "><br> 
                        <input class="btn btn-default " type="submit" name="submit" value="sign Up" style="color:black; width: 70px;height:30px; ">

                    </div>

                </form>
            </div>
        </div>
    </section>

    
<?php
    if(isset($_POST['submit']))
    {
        $count=0;
        $sql="SELECT username  from admin";
        $res=mysqli_query($db,$sql);

       while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']== $_POST['username'])
                {
                       $count=$count+1;
                }
        }
        if($count==0)
            {
                    mysqli_query($db,"INSERT INTO `admin` VALUES('',$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[phone]','$_POST[email]','p.jpg');");
    
            ?>
        
               <script type="text/javascript">
                  alert("Registration successful");
               </script>
            <?php
            }
        else
        {
            ?>
        
                <script type="text/javascript">
                     alert("The username already exist");
                </script>
             <?php
        }

    }
    
     
     
?>
</body>

</html>