<?php
include "navbar.php";
include "connection.php";
include "sidenav1.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Information</title>
    <style>
     body
    {
        background-image:url("images/101.jpg");
        background-repeat:no-repeat;
    }
    .container
    {
        height:500px;
       width:1000px;
       background-color:black;
       opacity:.8;
       color:white;
    }
    .scroll
    {
       
        height:500px;
        width:100%;
        overflow: auto;

    }
    th,td
    {
        width:10%;
    }
    
    
    </style>
</head>
<body>
<div class="container">
<h3 style="text-align:center; ">Information of Borrowed Books</h3>
<br>
<?php
   if(isset($_SESSION['login_user']))

    {
        $c=0;
        $sql="SELECT student.username,email, books.bid,books.name,authors,books.edition,issue,issue_book.return from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve='yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
         
        echo "<table class='table table-bordered '>";
                echo "<tr style='background-color:#6db6b9ed;'>";
                       
                        echo "<th >";echo "student.username"; "</th>";
                        echo "<th style=''>";echo "Email"; "</th>";
                        echo "<th>";echo "BID"; "</th>";
                        echo "<th>";echo "Book Name"; "</th>";
                        echo "<th>";echo "Authors Name"; "</th>";
                        echo "<th>";echo "Edition"; "</th>";
                        echo "<th>";echo "Issue Date"; "</th>";
                        echo "<th>";echo "Return Date"; "</th>";
                      
                echo "</tr>" ;
                echo "</table>";
                echo "<div class='scroll'>";
                echo "<table class='table table-bordered '>";
                    while($row=mysqli_fetch_assoc($res)) 
                    { 
                        $d=date("Y-m-d");
                        if($d > $row['return']);
                        {
                            $c=$c+1 ;
                            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';   
                            mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]'and approve='yes'limit $c;");
                           
                           echo $d."<br>";
                        }
                         
                        echo "<tr>";
                        echo "<td >" ;echo $row['username'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['email'];echo "</td>" ;
                        echo "<td>" ;echo $row['bid'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['name'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['authors'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['edition'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['issue'] ;echo "</td>" ;
                        echo "<td>" ;echo $row['return'] ;echo "</td>" ;
            
                        echo "</tr>";
                    }
                    echo "</table>";
      echo"</div>";
            
    
    
    
    
    
    }
    else
    {
        ?>
        <h3 style="text-align:center; color:yellow;">Login to see Information of Borrowed Books</h3>

        <?php
    }
   
?>
</div>
    
</body>
</html>






























