<?php include('../config/constants.php'); ?>
<html>
<head>
    <title>Login- food order System</title>
    <link rel="stylesheet" href ="../css/admin.css">
   
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <br>
        <?php
         if(isset($_SESSION['login']))
         {
           echo $_SESSION['login'];
           unset($_SESSION['login']);
         }
         if(isset($_SESSION['no-login-message']))
         {
           echo $_SESSION['no-login-message'];
           unset($_SESSION['no-login-message']);
         }
 ?>
 <br>
 <br>
         <form action=""method="POST" class="text-center">
            username: <br>
        
            <input type="text" name="username" placeholder="Enter Username">
            <br>
            <br>
            Password: <br>
            
            <input type="password" name ="password" placeholder="Enter Password">
<br>
<br>
            <input type="submit" name="submit" value="login" class="btn-primary">
            <br>
         </form>
         <br>


        <p class="text-center">Created by- <a href="https://www.linkedin.com/in/anup-singh-521a19238/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BAjYJ7CmKQ4WEPT63Mffyiw%3D%3D"> Anup Singh</a></p>

    </div>
</body>
</html>
<?php  
if(isset($_POST['submit']))
{

        // $username=$_POST['username'];
        //$password=md5($_POST['password']);
         $username=mysqli_real_escape_string($conn, $_POST['username']);
         $raw_password=md5($_POST['password']);
         $password=mysqli_real_escape_string($conn, $raw_password);
         
    // sql check wetheer the user with username and password exists or not

    $sql="SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'";
    //execute the query
     $res = mysqli_query($conn, $sql);
  
     $count = mysqli_num_rows($res);
     

        if($count==1)
        {
            //user avaliable
            $_SESSION['login'] = "<div class ='success'>Login Succesful.</div>";
            $_SESSION['user'] = $username;
            //redirect to home page 
            header('location:'.SITEURL.'admin/');

        }
        else{
            //user not avalival
            $_SESSION['login'] = "<div class ='error text-center' > username or password did not match.</div>";
            //redirect to home page 
            header('location:'.SITEURL.'admin/login.php');
        }
     }


?>