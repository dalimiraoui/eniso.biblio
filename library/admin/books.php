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
        padding-left:1200px;

    }
   

 


    </style>
</head>
<body>



    
<!--____________________search bar_________________-->
<div class="srch">
    <form class="navbar-form" method="post" name="form1">
    
    <input class="form-control" type="text" name="search" placeholder="search books.." required="">
    <button style="background-color:#6db6b9ed;" type="submit" name="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search"></span>
    </button>
         
    
    </form>

    <!--_______________delete a book__________________>


    <form class="navbar-form" method="post" name="form1">
    
    <input class="form-control" type="text" name="bid" placeholder="Enter Book ID.." required="">
    <button style="background-color:#6db6b9ed;" type="submit" name="submit1" class="btn btn-default">
    Delete 
    </button>
         
    
    </form>-->




</div>
<h2> List of Books </h2>
<?php
    if(isset($_POST['submit']))
    {
        $q=mysqli_query($db,"SELECT * from books where `name` like '%$_POST[search]%'");
        if(mysqli_num_rows($q)==0)
        {
            echo "Sorry ! No book found .Try searching again ";
        }
        else
        {
            echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color:#6db6b9ed;'>";
            echo "<th>";echo "ID"; "</th>";
            echo "<th>";echo "Book-Name"; "</th>";
            echo "<th>";echo "Authors Name"; "</th>";
            echo "<th>";echo "Edition"; "</th>";
            echo "<th>";echo "Status"; "</th>";
            echo "<th>";echo "Quantity"; "</th>";
            echo "<th>";echo "Department"; "</th>";
    echo "</tr>" ;
        while($row=mysqli_fetch_assoc($q)) 
        {
            echo "<tr>";
            echo "<td>" ;echo $row['bid'] ;echo "</td>" ;
            echo "<td>" ;echo $row['name'];echo "</td>" ;
            echo "<td>" ;echo $row['authors'] ;echo "</td>" ;
            echo "<td>" ;echo $row['edition'] ;echo "</td>" ;
            echo "<td>" ;echo $row['status'] ;echo "</td>" ;
            echo "<td>" ;echo $row['quantity'];echo "</td>" ;
            echo "<td>" ;echo $row['department'] ;echo "</td>" ;

            echo "</tr>";
        }
        echo "</table>";


        }

    }
    /* if  it is not pressed */
    else
    {

    
    $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC");
    echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color:#6db6b9ed;'>";
            echo "<th>";echo "ID"; "</th>";
            echo "<th>";echo "Book-Name"; "</th>";
            echo "<th>";echo "Authors Name"; "</th>";
            echo "<th>";echo "Edition"; "</th>";
            echo "<th>";echo "Status"; "</th>";
            echo "<th>";echo "Quantity"; "</th>";
            echo "<th>";echo "Department"; "</th>";
    echo "</tr>" ;
        while($row=mysqli_fetch_assoc($res)) 
        {
            echo "<tr>";
            echo "<td>" ;echo $row['bid'] ;echo "</td>" ;
            echo "<td>" ;echo $row['name'];echo "</td>" ;
            echo "<td>" ;echo $row['authors'] ;echo "</td>" ;
            echo "<td>" ;echo $row['edition'] ;echo "</td>" ;
            echo "<td>" ;echo $row['status'] ;echo "</td>" ;
            echo "<td>" ;echo $row['quantity'];echo "</td>" ;
            echo "<td>" ;echo $row['department'] ;echo "</td>" ;

            echo "</tr>";
        }
        echo "</table>";    
            
    }
    if(isset($_POST['submit1']))
    {
        if(isset($_SESSION['login_user']))
        {
            mysqli_query($db,"DELETE FROM `books` where bid='$_POST[bid]'; ");
            ?>
             <script type="text/javascript">
          alert("Delete successful .");
          </script>

            <?php

        }
        else
        {
            ?>
            <script type="text/javascript">
         alert("Please Login First.");
         </script>

           <?php

        }
            
    }
            
?>


</body>
</html>