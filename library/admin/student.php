 

<?php
include "navbar.php";
include "connection.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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
    
    <input class="form-control" type="text" name="search" placeholder="student username.." required="">
    <button style="background-color:#6db6b9ed;" type="submit" name="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search"></span>
    </button>
         
    
    </form>





</div>
<h2> List of Students</h2>
<?php
    if(isset($_POST['submit']))
    {
        $q=mysqli_query($db,"SELECT first,last,username,phone,email from `student` where `username` like '%$_POST[search]%'");
        if(mysqli_num_rows($q)==0)
        {
            echo "Sorry ! No student found .Try searching again ";
        }
        else
        {
            echo "<table class='table table-bordered table-hover'>";
    echo "<tr style='background-color:#6db6b9ed;'>";
            echo "<th>";echo "First Name"; "</th>";
            echo "<th>";echo "Last Name"; "</th>";
            echo "<th>";echo "Username"; "</th>";
            echo "<th>";echo "Phone N°"; "</th>";
            echo "<th>";echo "Email"; "</th>";
    
    echo "</tr>" ;
        while($row=mysqli_fetch_assoc($q)) 
        {
            echo "<tr>";
            echo "<td>" ;echo $row['first'];echo "</td>" ;
            echo "<td>" ;echo $row['last'] ;echo "</td>" ;
            echo "<td>" ;echo $row['username'] ;echo "</td>" ;
            echo "<td>" ;echo $row['phone'] ;echo "</td>" ;
            echo "<td>" ;echo $row['email'];echo "</td>" ;
            

            echo "</tr>";
        }
        echo "</table>";


        }

    }
    /* if  it is not pressed */
    else
    {

    
    $res=mysqli_query($db,"SELECT first,last,username,phone,email from `student` ORDER BY `student`.`first` ASC");
      echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color:#6db6b9ed;'>";
         echo "<th>";echo "First Name"; "</th>";
         echo "<th>";echo "Last Name"; "</th>";
         echo "<th>";echo "Username"; "</th>";
         echo "<th>";echo "Phone N°"; "</th>";
         echo "<th>";echo "Email"; "</th>";
         echo "</tr>" ;
        while($row=mysqli_fetch_assoc($res)) 
        {
            echo "<tr>";
            
            echo "<td>" ;echo $row['first'];echo "</td>" ;
            echo "<td>" ;echo $row['last'] ;echo "</td>" ;
            echo "<td>" ;echo $row['username'] ;echo "</td>" ;
            echo "<td>" ;echo $row['phone'] ;echo "</td>" ;
            echo "<td>" ;echo $row['email'];echo "</td>" ;
            

            echo "</tr>";
        }
        echo "</table>";    
            
    }
            
?>






















    
</body>
</html>