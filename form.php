<?php
$erorr_arr = array();
if(isset($_GET['erorr_field'])){
	$erorr_arr = explode("," , $_GET['erorr_field']);
}
?>

<html>
	<head>
		<link rel="stylesheet" href="mystyle.css">

	</head>
    <body>
         <form class="msform" method="post" action="proc.php" enctype="multipart/form-data" >
			<fieldset>
				<p id="header">Sign up </p>
					 <input type="text" name="name" placeholder="NAME">
					 <?php 
					   if (in_array("name" , $erorr_arr))
					   echo" Please Enter your Name ";
					 ?>
					 
					 <br><br>
				  
					 <input type="password"  name="password" placeholder="Password">
					 <?php
					 
					 if(in_array("password" ,$erorr_arr))
					 echo " Please Enter your password";
					 ?>
					 
					 <br><br>
				
					 <input type="email" name="email" placeholder="Email">
					 <?php
					 
					 if(in_array("email" , $erorr_arr))
					 echo "Please Enter your Email ";
					 
					 ?>
					 <br><br>
					 <p  class="lab" >select pictur</p>
					 <input style="color: #FDFEFE" type="file" name="my_image" placeholder="Pictur">
							 <br><br>
					 <input style=" cursor: pointer;" type="submit" name="submit" class="submit">
			   </fieldset>
         </form>
    </body>
</html>

