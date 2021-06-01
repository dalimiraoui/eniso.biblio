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
    <title>Profile</title>
    <style type="text/css">
        .wrapper
        {
              width: 300px;
              margin: 0  auto;
              color:white;

        }
    </style>




 
</head>
<body style="background-color:#1785a2">

<div class="container">
    <form action="" method="post">


        <button  class="btn btn-default" style="float:right;width:70px;"name="submit1"type="submit">Edit</button>
        <div class="wrapper" >
            <?php
                if(isset($_POST['submit1']))
                {?>
                    <script>
                        window.location="edit.php";
                    </script>

                <?php

                }
                 $q=mysqli_query($db,"SELECT * from `admin` where username='$_SESSION[login_user]';");

            ?>
            <h2 style="text-align:centre;">My Profile </h2>
            <?php
                 $row=mysqli_fetch_assoc($q);

                echo "<div><img  class='img-circle profile-img ' width=120 height=110 src='images/".$_SESSION['pic']."'></div>";
            ?>
            <div style="text-decoration:centre;"><b>Welcome !</b></div>
            <h4>
                <?php
                        echo $_SESSION['login_user'];
                ?>
             </h4>
            <?php

                echo "<table  class='table table-bordered'>";
                    echo"<tr>"; 
                    
                    
                    echo"</tr>";

                        echo"<td>";
                            echo "<b> First Name :</b>";
                        echo "</td>";

                        echo"<td>";
                            echo " ".$row['first'];
                        echo "</td>";
                    echo"<tr>"; 
                         echo"<td>";
                            echo "<b> Last  Name :</b>";
                         echo "</td>";

                         echo"<td>";
                            echo " ".$row['last'];
                         echo "</td>";
                    
                    
                    echo"</tr>";

                    echo"<td>";
                        echo "<b> Username :</b>";
                    echo "</td>";

                    echo"<td>";
                         echo " ".$row['username'];
                    echo "</td>";
            
                    
                    echo"<tr>"; 
                        echo"<td>";
                            echo "<b> Password :</b>";
                        echo "</td>";

                        echo"<td>";
                            echo " ".$row['password'];
                        echo "</td>";
            
                    
                    
                    echo"</tr>";

                        echo"<td>";
                            echo "<b> Phone N° :</b>";
                         echo "</td>";

                         echo"<td>";
                            echo " ".$row['phone'];
                         echo "</td>";
                    
                    
                    echo"<tr>"; 
                        echo"<td>";
                            echo "<b> Email :</b>";
                        echo "</td>";

                        echo"<td>";
                                echo " ".$row['email'];
                        echo "</td>";
            

                    
                    
                    echo"</tr>";
                    
                 
                    
                    


                    


                echo "</table>";

            ?>



    </form>


</div>
    
</body>
</html>
















