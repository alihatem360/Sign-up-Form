<?php
////// check for inputs
$erorr_field = array();

if(!(isset($_POST['name']) && !empty($_POST['name'])))
{
	$erorr_field[]= "name" ; 	
}

if(!(isset($_POST['email']) && filter_input(INPUT_POST , 'email' ,FILTER_VALIDATE_EMAIL )))
{
	$erorr_field[] = "email";
}
 
if(!(isset($_POST['password'])))
{
	$erorr_field[]= "password";
}

if($erorr_field){

	header("location: form.php?erorr_field=".implode("," ,$erorr_field));
	exit();
}
 ///// connection to DB
 
$dbservarname = "localhost" ;
$dbusername = "root";
$dbpass = "";
$dbName = "products";
 
$conn = mysqli_connect($dbservarname ,$dbusername , $dbpass ,$dbName );
if(! $conn){

echo mysqli_connect_error();
exit();
}

$img_name = $_FILES[ 'my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES[ 'my_image']['tmp_name'];
$error = $_FILES[ 'my_image']['error'];


$img_ex= pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);

$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
$img_upload_path = 'uploads/'.$new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);

///////////////////////////////////////////

/// tack Data from user and insert it into DB

$name_fo = mysqli_escape_string($conn , $_POST['name']);
$email_fo = mysqli_escape_string($conn , $_POST['email']);
$pass_fo = mysqli_escape_string($conn , $_POST['password']);
$query = "INSERT INTO `form` (`name`, `pass`, `email`) VALUES ('".$name_fo."', '".$pass_fo."', '".$email_fo."');";

if(mysqli_query($conn , $query))
{
	echo "thank you ! . ";
	
}else{
	echo $query;
	echo mysqli_error($conn);
}

mysqli_close($conn);

//echo "connected"."<br>"; 
 












