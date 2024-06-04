<?php
include ('connection.php') ;

if (isset($_POST['login'])) 
{

$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * from agent_basic_information  where username='$username' and password='$password'";
$result=mysqli_query($con,$query);

   if($log=mysqli_fetch_array($result)>0)
  // if(mysqli_fetch_assoc($result)>0)
    {
       
        header('location:property-detail.html');
    }
    else
    {
        echo"<script>alert('please enter the correct details...!!!')</script>";
    }
   
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
	<form method="post">
		<label>Username</label>
		<input type="text" name="username">
		<label>password</label>
		<input type="password" name="password">
		<button type="submit" name="login">Login</button>
		<a href="forgot.php">Forgot password</a>
	</form>

</body>
</html>