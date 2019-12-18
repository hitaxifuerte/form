<?php
session_start();
$name=$_POST['name'];

$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];

$image=$_POST['image'];
$mno=$_POST['mno'];
$city=$_POST['city'];
$hobbies = implode(',', $_POST['hobbies']);


$con= mysqli_connect("localhost", "root", "", "example");
if($con === false)
{
    die("connection failed.... " . mysqli_connect_error());
}
 
$qry = "insert into registration (name,email,password,mno,city,image,gender,hobbies) VALUES ('$name','$email','$password','$mno','$city','$image','$gender','$hobbies')";
if(mysqli_query($con, $qry))
{
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	echo $name;
	echo $email;
	echo "<script>alert('record insert sucessfully.......');";
	echo "window.location='registershow.php'";
	echo "</script>";
 
}
 else
 {
	  echo '<script language="javascript">';
		echo 'alert("error in data insert.....................")'. mysqli_error($con); 
 
		
		echo '</script>';
   
}


mysqli_close($con);
?>