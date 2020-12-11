<?php
session_start();
include "config.php";
//if (!($_SESSION['username']=="admin")){ //If session not registered
//header("location:login.php"); // Redirect to login.php page
//}
//else //Continue to current page
//header( 'Content-Type: text/html; charset=utf-8' );
?>

<?php
	
	$productCode= $_POST['id'];
	$name= $_POST['name'];
	$desc= $_POST['desc'];
	$imgName=$_POST['imgName'];
	$unit= $_POST['unit'];
	
	
	$price= $_POST['price'];
	
	$sql= "insert into products (product_code, product_name,product_desc,product_img_name,qty,price) values('$productCode', '$name', '$desc','$imgName', '$unit', '$price' )";
	if (mysqli_query($mysqli,$sql)){
	echo "Successfully Added";
	echo "<br>";
	echo"<p> <a href=admin.php > Return to admin Page </a></p>";
	}
	else{
	echo "error " . mysqli_error($mysqli);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Add Bus Service</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
			<style type="text/css">
				body{ font: 14px sans-serif; text-align: center; }
			</style>
			</head>
<body>
    
	<br><br><br>
	
	
</body>
</html>