<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
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
        
		<form action= "?" method="POST" enctype="multipart/form-data">
		<lable>up </lable>
		<input type="file" name="file" />
		<input type="submit" name="upload" value="Upload Image" />
		</form>
		
		<?php
			if(isset($_POST['upload'])) {
			 $file_name = $_FILES['file']['name'];
			 $file_type = $_FILES['file']['type'];
			 $file_size = $_FILES['file']['size'];
			 $file_tem_loc = $_FILES['file']['tmp_name'];
			 $file_store = "images/products/".$file_name;
			 if(move_uploaded_file($file_tem_loc,$file_store)){
				 //echo "success"; 
				 //echo "$file_name";
				echo '<script type="text/javascript">alert("Successfully Uploaded");</script>';
				echo "Use bold text in the image field"; <br>
				echo "<b>$file_name<b>";
			}
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
