
<?php
    session_start();
?>



<!DOCTYPE html>
 <html lang="en">
 <head>

     
     <title></title>
      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <nav class="Navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">biblio.ENISO </a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href=" index.php ">HOME</a></li>
                <li><a href="books.php ">BOOKS</a></li>
                <li><a href="feedback.php ">FEEDBACK</a></li>
            </ul>
        <?php 
            if(isset($_SESSION['login_user']))
            {
            ?>
                 

                <ul class="nav navbar-nav">
                    <li><a href="student.php"> STUDENT_INFORMATION</a></li></ul>
                    
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">PROFILE</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="profile.php"> <div style="color:white; size:50px; margin:-5px auto;"> 

                                            <?php
                                                    echo "<img  class='img-circle profile_img' height=35 width=35 src='images/".$_SESSION['pic']."'>";
                                                    echo " ".$_SESSION['login_user'];
                                            ?>
                                     </div>
                     </li>
                     <li><a href="logout.php"><div style="margin:-30px auto;"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></div></a> </li>                 
                </ul>
            <?php
        
            }
            else
            {
                ?>
                     <ul class="nav navbar-nav navbar-right">

                            <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
                            <!--<li><a href="student_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a> </li> -->
                            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP </span></a></li> 
                    </ul>
                
                <?php

            }

        ?>
        </div>
    </nav>
     
 </body>
 </html>