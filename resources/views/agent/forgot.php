<?php
include ('connection.php') ;
session_start();

if(isset($_POST['resetpwd']))
{
    $name=$_POST['name'];
    $email=$_POST['name'];
    $no=$_POST['contact'];
    $query="SELECT *  FROM agent_basic_information WHERE a_email='$email' or username='$name' AND phoneno='$no'";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result); 
    if($num>0)
    {
        $_SESSION['name'] = $name;
        $_SESSION['contact']=$no;
        header('location:forgotpassword.php');
    }
    else{
        echo" enter corrrect user name";
    }
   
}
?>
<html>
    <head></head>
    <body><center>
        <form method="post">
            <input type="text" name="name" required placeholder="Name/email"><br><br>
            <input type="number" name="contact" required placeholder="Number"><br><br>
            <button type="submit" name="resetpwd">Next</button>
            
        </form>
        </center>
    </body>
</html>