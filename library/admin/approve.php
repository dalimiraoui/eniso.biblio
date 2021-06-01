<?php
include "navbar.php";
include "connection.php";
include "sidenav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve</title>
    <style>
     body
    {
        background-image:url("images/101.jpg");
        background-repeat:no-repeat;
    }
    .container2
    {
        height:500px;
        
        background-color:black;
        opacity:.8;
        color:white;
         

    }
    .Approve
    {
        width:500px;
        margin-left:500px;
    }

    </style>
</head>
<body>
<div class="container2">
    <h3 style="text-align:center;">Approve Request </h3>
        <form class="Approve" action="" method="post">
                <input class="form-control" type="text/css" name="approve" placeholder="Yes or No" required=""><br>
                <input class="form-control" type="text/css" name="issue" placeholder="Issue Date yyyy-mm-dd" required=""><br>
                <input class="form-control"  type="text/css" name="return" placeholder="Return Date yyyy-mm-dd" required=""><br>
                <button class="btn btn-default" type="submit" name="submit2">Approve</button>
                
        
       
        </form>
 </div>
 <?php
    if(isset($_POST['submit2']))
    {
        mysqli_query($db,"UPDATE `issue_book` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',`return`='$_POST[return]' WHERE  username='$_SESSION[st_name]'and bid='$_SESSION[bid]';");
    
        mysqli_query($db,"UPDATE books SET quantity=quantity-1 where bid='$_SESSION[bid]';");
        $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];") ;   
      while($row=mysqli_fetch_assoc($res))
            { 
                if($row['quantity']==0)
                {
                   mysqli_query($db,"UPDATE books SET `status`='not-available' where bid='$_SESSION[bid]';") ;
                }
    
            }
            ?>
            <script>
                alert("Update successfully.");
                window.location="request.php";
            </script>
            <?php
    }
    ?>
    
</body>
</html>