<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?> 

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">PET World</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li class="active"><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
    
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <h2> Update Form </h2>
		
			<form method="post" action="updateProduct.php">
			<br> 
			Enter Product Code: <br/>
			<input type="text" name="id" /><br>
			<br>	
			Enter Product Name: <br/>
			<input type="text" name="name" /><br>
			<br>
			Enter Image Name: <br/>
			<input type="text" name="imgName" /><br>
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
    
          if(isset($_POST['submit'])) {
			$name=$_POST['id'];
			$productCode= $_POST['id'];
			$name= $_POST['name'];
			$desc= $_POST['desc'];
			$imgName=$_POST['imgName'];
			$unit= $_POST['unit'];
			$gender= $_POST['gender'];
			$age= $_POST['age'];
			$price= $_POST['price'];
			//$que="DELETE FROM products where product_code='$name'";
			 //if (mysqli_query($mysqli,$que)){
				//echo '<script type="text/javascript">alert("Successfully Deleted");</script>';
			  //}
			  
		  }
		 ?>
        
        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Pet Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>
	
	







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
