<?php

session_start();
include('includes/config.php');

if(isset($_POST['submit-login']))
{
       
        $username =$_REQUEST['username'];
        $username = mysqli_real_escape_string($conn, $username);
        $password=$_REQUEST['passwords'];
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * from register where username ='$username' AND passwords='$password'";
        $result = mysqli_query($conn,$query)or die(mysqli_connect_error());
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['username']=$username;
            header("location:index.php");
        }
        else
        {

            echo "<script>alert('Incorrect username or password')</script> ";
            header("location:account.php");
            
        }
}
if(isset($POST['submit-register']))
{
       session_start();
       include("register.php");
}
if(isset($POST['logout']))
{
       unset($_SESSION['username']);
}
?>
