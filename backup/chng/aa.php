

<html>
<head>
	<title>  Upload</title>
</head>
<body>
	
	<form action= "?" method="POST" enctype="multipart/form-data">
		<lable>up </lable>
		<input type="file" name="file" />
		<input type="submit" name="upload" value="Upload Image" />
	</form>
	
	
	
	<h2> Pet Add Form </h2> 
		<form method="post" action="aa.php">
		<br> 
		Enter Product Code: <br/>
		<input type="text" name="id" /><br>
		<br>	
		Enter Product Name: <br/>
		<input type="text" name="name" /><br>
		<br>
		Enter Description: <br/>
		<input type="text" name="desc" /><br>
		<br>
		Enter Available Units: <br/>
		<input type="text" name="unit" /><br>
		<br>
		Gender: <br/>
		<input type="text" name="gender" /><br>
		<br>
		Enter Age: <br/>
		<input type="text" name="age" /><br>
		<br>
		Enter Price: <br/>
		<input type="text" name="price" /><br>
		<br>
		
		<input type="submit" name="submit" />
		</form>
		<br><br><br>
		
<?php
	$temp="";
	if(isset($_POST['submit'])){
		//session_start();
		include "config.php";
		$productCode= $_POST['id'];
		$name= $_POST['name'];
		$desc= $_POST['desc'];
		$imgName=$temp;
		$unit= $_POST['unit'];
		$gender= $_POST['gender'];
		$age= $_POST['age'];
		$price= $_POST['price'];
		
		$sql= "insert into products (product_code, product_name,product_desc,product_img_name,gender,Age,qty,price) values('$productCode', '$name', '$desc','$imgName', '$gender','$age', '$unit', '$price' )";
		if (mysqli_query($mysqli,$sql)){
		echo "Successfully Added";
		echo "<br>";
		echo"<p> <a href=admin.php > Return to admin Page </a></p>";
		}
		else{
		echo "error " . mysqli_error($mysqli);
		}
	}
	
	if(isset($_POST['upload'])) {
	 $file_name = $_FILES['file']['name'];
	 $file_type = $_FILES['file']['type'];
	 $file_size = $_FILES['file']['size'];
	 $file_tem_loc = $_FILES['file']['tmp_name'];
	 $file_store = "images/products/".$file_name;
	 $temp=$file_name;
	if(move_uploaded_file($file_tem_loc,$file_store)){
	 echo "success";
	 echo "$file_name";
	 $file_name = $_POST['imgName'];
 }
}
?>
</body>
</html>