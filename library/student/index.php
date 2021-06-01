<?php
    session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online library management system </title>
    <link rel="stylesheet" type="text/css" href="style.css ">
</head>
<style type="text/css">
    nav {
        float: right;
        word-spacing: 20px;
        padding: 20px;
    }
    
    nav li {
        display: inline-block;
        line-height: 80px;
    }
</style>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="images/logows.png" alt="">
                <h1 style="color:white;"> &nbsp &nbsp &nbsp biblio.ENISO </h1>
            </div>

<?php
  if( isset($_SESSION['login_user']))
  {
    ?>
       <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>

                </ul>
        </nav>
    <?php
   }
   else
   {
       ?>
        <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>

                </ul>
            </nav>
       <?php

   }

?>
           </header>
        <section >
            <div class="sec_img"> <br><br><br>
                <div class=" box ">
                    <br><br><br>

                    <h1 style="text-align: center;font-size:35px ">Welcome to the Library of ENISO</h1><br><br>
                    <h1 style="text-align: center;font-size:25px ">Opens at :08:00</h1><br>
                    <h1 style="text-align: center;font-size: 25px; ">Closes at : 17:00</h1>
                </div>
            </div>

        </section>
     <!--   <footer>
            <p style="color:white;text-align: center; ">
                <br> Email:&nbsp biblio.ENISO@gmail.com <br><br> Mobile :&nbsp +21673888***

            </p>

        </footer>
    </div>-->
    <?php
        include "footer.php";
    ?>


</body>

</html>