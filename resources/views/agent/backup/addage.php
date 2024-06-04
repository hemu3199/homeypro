<?php
include('connection.php');
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$speciality=$_POST['speciality'];
	$mobile=$_POST['mobie'];
	$email=$_POST['email'];
	$url=$_POST['url'];
	$description=$_POST['description'];
	$username=$_POST['username'];
	$phoneno=$_POST['phoneno'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$face=$_POST['face'];
	$twitter=$_POST['twitter'];
	$google=$_POST['google'];
	$linkedin=$_POST['linkedin'];
	$query="INSERT INTO agent_basic_information(fname,lname,dateofbirth,gender,speciality,mobile,a_email,url,description,username,phoneno,password,cpassword,face,twitter,google,linkedin)values('$fname','$lname','$dob','$gender','$speciality','$mobile','$email','$url','$description','$username','$phoneno','$password','$cpassword','$face','$twitter','$google','$linkedin')";
	$result=mysql_query($con,$query);
	if ($result) 
	{
		echo "record inserted";
		// code...
	}
	else
	{
		echo"Recorded not update";
		// code...
	}
	
}





?>