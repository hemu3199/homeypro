<?php
include ('connection.php') ;
session_start();
if(isset($_POST['resetpwd1']))
{
    $pwd1=$_POST['pwd1'];
    $pwd2=$_POST['pwd2'];
    if($pwd1 == $pwd2)
    {
        $name=$_SESSION['name'];
        $contact=$_SESSION['contact'];
        $q1="UPDATE agent_basic_information SET password='$pwd1',cpassword='$pwd2' WHERE username='$name' or a_email='$name' AND phoneno='$contact'"; 
        if(mysqli_query($con,$q1))
        {
            $link='index.html';
            echo"<center>password updated <br> <a href='".$link."'><b>back</b></a>";
            exit;
           // header('location:index.php');

            
        }
        else{
        echo $con->error();
        }

    
        
    }
    else{
        echo"<script>alert('New password and confirm password did not match')</script> ";
    }
}
?>
<html>
    <head></head>
    <body><center>
        <form method="post">
            <input type="password" name="pwd1" required placeholder="New Password"><br><br>
            <input type="password" name="pwd2" required placeholder="confirm password"><br><br>
            <button type="submit" name="resetpwd1">Reset</button>
            
        </form>
        </center>
    </body>
</html>