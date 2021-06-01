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
    <title>Issue Information</title>
    <style>
     body
    {
        background-image:url("images/101.jpg");
        background-repeat:no-repeat;
    }
    .container
    {
        height:600px;
       width:1000px;
       background-color:black;
       opacity:.8;
       color:white;
      
    }
    .scroll
    {
       
        height:300px;
        width:100%;
        overflow: auto;

    }
    th,td
    {
        width:10%;
    }
    .srch
    {
        padding-left:770px;
    }
    
    

    
    </style>
</head>
<body>
<div class="container">
   
<?php
        if(isset($_SESSION['login_user']))

        {   ?>
            <div style="float:left; padding:25px;"> 
            <form method="post" action="">
                    <button type="submit" name="submit2" class="btn btn-default"style="background-color:green;">RETURNED</button>
                    <button type="submit" name="submit3" class="btn btn-default"style="background-color:red;">EXPIRED</button>
            </form>
              </div>  
              <div style="float:right;padding-top:20px;">
                    <h2>Your fine is 
                    <?php
                        echo "$".($_SESSION['day']*.10);

                    ?>
                    
                    </h2>
            </div>
             
            

         
        <?php
        $c=0;
        if(isset($_SESSION['login_user']))

            {
            $ret='<p style="color:yellow;background-color:green;">RETURNED</p>';   
            $exp='<p style="color:yellow;background-color:red;">EXPIRED</p>';
            
            /* $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';
                $sql="SELECT student.username,email,books.bid,name,authors,edition,approve,issue,issue_book.return from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve!=''and issue_book.approve !='yes' ORDER BY `issue_book`.`return` DESC";*/
                if(isset($_POST['submit2']))
                {
                    ?>
                    <br>
                    <h3 style="text-align:center;">BOOK returned </h3>
                            <br>  
                    <?php
                              
                    /*$var='<p style="color:yellow;background-color:red;">EXPIRED</p>';
                    */$sql="SELECT student.username,email,books.bid,name,authors,edition,approve,issue,issue_book.return from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve='$ret' ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);

                }
                else if (isset($_POST['submit3']))
                {
                    
                    ?>
                    <br>
                    <h3 style="text-align:center;">Date Expired List</h3>
                            <br>  
                    <?php    
                    /*$var='<p style="color:yellow;background-color:red;">EXPIRED</p>';
                    */$sql="SELECT student.username,email,books.bid,name,authors,edition,approve,issue,issue_book.return from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve='$exp' ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);
                }
                else
                {
                /*  $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';
                    */$sql="SELECT student.username,email,books.bid,name,authors,edition,approve,issue,issue_book.return from student inner join issue_book on student.username=issue_book.username inner join books on issue_book.bid=books.bid WHERE issue_book.approve!=''and issue_book.approve !='yes' ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);
                }
                
                
                
                
                echo "<table class='table table-bordered '>";
                        echo "<tr style='background-color:#6db6b9ed;'>";
                            
                                echo "<th >";echo "student.username"; "</th>";
                                echo "<th style=''>";echo "Email"; "</th>";
                                echo "<th>";echo "BID"; "</th>";
                                echo "<th>";echo "Book Name"; "</th>";
                                echo "<th>";echo "Authors Name"; "</th>";
                                echo "<th>";echo "Edition"; "</th>";
                                echo "<th>";echo "Status"; "</th>";
                                echo "<th>";echo "Issue Date"; "</th>";
                                echo "<th>";echo "Return Date"; "</th>";
                            
                        echo "</tr>" ;
                        echo "</table>";
                        echo "<div class='scroll'>";
                        echo "<table class='table table-bordered '>";
                            while($row=mysqli_fetch_assoc($res)) 
                            { 
                            /*  $d=date("Y-m-d");
                                if($d > $row['return']);
                                {
                                    $c=$c+1 ;
                                    $var='<p style="color:yellow;background-color:red;">EXXPIRED</p>';   
                                    mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]'and approve='yes'limit $c;");
                                
                                echo $d."<br>";
                                }
                                */
                                echo "<tr>";
                                echo "<td >" ;echo $row['username'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['email'];echo "</td>" ;
                                echo "<td>" ;echo $row['bid'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['name'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['authors'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['edition'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['approve'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['issue'] ;echo "</td>" ;
                                echo "<td>" ;echo $row['return'] ;echo "</td>" ;
                    
                                echo "</tr>";
                            }
                            echo "</table>";
            echo"</div>";
                    
            
            
            
            
            
            }
        }
            else
            {
                ?>
                <h3 style="text-align:center;">Login to see Information of Borrowed Books</h3>

                <?php
            }
        
        ?>
</div>
    
</body>
</html>