<?php
 include "connection.php";
 include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
    .form
    {
        width:300px;
        margin-left:630px;
    }
    
    </style>
</head>
<body style="background-color:#1785a2;">
   <h1 style="text-align:center; color:#fff">Edit Information </h1>
   <?php
    $sql="SELECT * from `admin` where username='$_SESSION[login_user]'";
    $result = mysqli_query($db,$sql) or die(mysql_error());
    while($row=mysqli_fetch_assoc($result))
    {
        $first=$row['first'];
        $last=$row['last'];
        $username=$row['username'];
        $password=$row['password'];
        $phone=$row['phone'];
        $email=$row['email'];
        

    }

   ?>
   <div class="profile_info" style="text-align:center;">
    <span style="color:white;font-size:20px;">Welcome!</span>
    <h3 style="color:white;"><?php echo $_SESSION['login_user']; ?></h3>
   
   
   </div> <br><br>
   <form action="" method="post" enctype="multipart/form-data">
   <div class="form">
   <input class="form-control"type="file" name="file" >
   <label><h4><b>First Name :</b></h4></label>
   <input  class="form-control" type="text" name="first" required="" value="<?php echo $first; ?>">
   <label><h4><b>Last Name :</b></h4></label>
   <input class="form-control" type="text" name="last"value="<?php echo $last; ?>">
   <label><h4><b>Username :</b></h4></label>
   <input class="form-control" type="text" name="username" value="<?php echo $username ; ?>">
   <label><h4><b> Password :</b></h4></label>
   <input class="form-control"  type="text" name="password" value="<?php echo $password ; ?>">
   <label><h4><b> GSM:</b></h4></label>
   <input class="form-control" type="text" name="phone" value="<?php echo $phone ; ?>"><br>
   <label><h4><b> Email :</b></h4></label>
   <input class="form-control" type="text" name="email" value="<?php echo $email ; ?>">
   </div><br>
    
  <div style="margin-left:750px;"> <button class="btn btn-default"type="submit" name="submit"> save </button>
   </div>
   </div>
   </form>

   <?php
   if(isset($_POST['submit']))
   {
       move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
    $first=$_POST['first'];
    $last=$_POST['last'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $pic=$_FILES['file']['name'];

    

    $sql1="UPDATE admin SET pic='$pic' , first='$first', last='$last', username='$username', password='$password', phone='$phone', email='$email' where username='".$_SESSION['login_user']."';";

    if(mysqli_query($db,$sql1))
    { 
        ?> 
        <script type="text/javascript">
                alert("Saved Successfully.")
                window.location="profile.php"
          </script>
        <?php
    }
   }

?>
    
</body>
</html>