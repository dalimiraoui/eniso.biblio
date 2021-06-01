<?php
include "navbar.php";
include "connection.php";
include "sidenav.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style class="text/css">
    .srch
    {
        padding-left:1300px;
        margin:10px;

    }
    .form-control
    {
        height:35px;
        width:600px;
        background-color:black;
        color:white;
    }
    body
    {
        background-image:url("images/101.jpg");
        background-repeat:no-repeat;
    }
    .container1
    {
        height:500px;
       
        background-color:black;
        opacity:.8;
        color:white;
         

    }

   

    </style>
</head>
<body>

<!--____________________search bar_________________
<div class="srch">
    <form class="navbar-form" method="post" name="form1">
    
    <input class="form-control" type="text" name="search" placeholder="search books.." required="">
    <button style="background-color:#6db6b9ed;" type="submit" name="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search"></span>
    </button>
         
    
    </form>


    <!--_____________Request book________________
    <form class="navbar-form" method="post" name="form2">
    
    <input class="form-control" type="text" name="bid" placeholder="Enter a Book ID." required="">
    <button style="background-color:#6db6b9ed;" type="submit1" name="submit1" class="btn btn-default">
    Request
    </button>
         
    
    </form>




</div>-->

<div class="container1"> 
<br>
<div class="srch">
    <form class="navbar-form" method="post" name="form1">
    
    <input class="form-control  " type="text" name="username" placeholder="Username" required=""><br><br>
    <input class="form-control" type="text" name="bid" placeholder="BID" required=""><br><br>
    <button style="background-color:#6db6b9ed;" type="submit" name="submit" class="btn btn-default">submit
    
    </button>
         
    
    </form>

</div>










<h3 style="color:red;text-align:center;">  Request Of Book </h2>
<?php
         if(isset($_SESSION['login_user']))
         {
             $sql="SELECT student.username,email, books.bid,name,authors,edition,status from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve=''";
             $res=mysqli_query($db,$sql);
             if(mysqli_num_rows($res)==0)
             {
                echo "<h2><b> ";
                echo "There is no pending request";
                echo "</h2></b>";

             }
             else
             {
                echo "<table class='table table-bordered table-hover'>";
                echo "<tr style='background-color:#6db6b9ed;'>";
                       
                        echo "<th style='color:green;'>";echo "student.username"; "</th>";
                        echo "<th>";echo "Email"; "</th>";
                        echo "<th>";echo "BID"; "</th>";
                        echo "<th>";echo "Book Name"; "</th>";
                        echo "<th>";echo "Authors Name"; "</th>";
                        echo "<th>";echo "Edition"; "</th>";
                        echo "<th>";echo "Status"; "</th>";
                      
                echo "</tr>" ;
                    while($row=mysqli_fetch_assoc($res)) 
                    {
                        echo "<tr>";
                        echo "<td style='color:red;'>" ;echo $row['username'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['email'];echo "</td>" ;
                        echo "<td>" ;echo $row['bid'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['name'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['authors'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['edition'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['status'] ;echo "</td>" ;
                        
            
                        echo "</tr>";
                    }
                    echo "</table>";
            
             }   
        
      }
      else
      {
          ?>
          <br>
          <h4 style="text-align:center;color:yellow;">You need to login to see the request</h4>

          <?php


      } 
      if(isset($_POST['submit']))   
      {
          $_SESSION['st_name']=$_POST['username'];
          $_SESSION['bid']=$_POST['bid'];
          ?>
                <script type="text/javascript">
                        window.location="approve.php"
                </script>

            <?php
      }

             
         

/*
    if(isset($_SESSION['login_user']))
    {
        $q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]';");
        if(mysqli_num_rows($q)==0)
        {
            echo "<h2><br> ";
            echo "There is no pending request";
            echo "</h2>";

        }
        else
        {
            echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color:#6db6b9ed;'>";
           
            echo "<th style='color:green;'>";echo "Book-ID"; "</th>";
            echo "<th>";echo "Approve Status"; "</th>";
            echo "<th>";echo "Issue"; "</th>";
            echo "<th>";echo "Return Date"; "</th>";
          
    echo "</tr>" ;
        while($row=mysqli_fetch_assoc($q)) 
        {
            echo "<tr>";
            echo "<td style='color:red;'>" ;echo $row['bid'] ;echo "</td>" ;
            echo "<td>" ;echo $row['approve'];echo "</td>" ;
            echo "<td>" ;echo $row['issue'] ;echo "</td>" ;
            echo "<td>" ;echo $row['return'] ;echo "</td>" ;
            

            echo "</tr>";
        }
        echo "</table>";


        }

    }
    else
    {
      echo"<br><br><br>";
      echo"<h2 style='color:red'>";
      echo "Please login first to see the request informations";  
      echo"</h2>";
    }
    */
  
    
?>
</div>
 



</body>
</html>
















