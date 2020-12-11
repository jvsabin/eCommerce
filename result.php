<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
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
          <li><a href="about.php">About</a></li>
          <li class='active'><a href="products.php">Pets</a></li>
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




    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
			$que="";
			$que='SELECT * FROM products';
			$productCode= $_POST['id'];
			$name= $_POST['name'];
			$minAge= $_POST['minAge'];
			$maxAge= $_POST['maxAge'];
			$minPrice= $_POST['minPrice'];
			$maxPrice= $_POST['maxPrice'];
			$gender= $_POST['gender'];
			if($productCode==!null){
				$que="SELECT * FROM products where product_code='$productCode'";
			}
			elseif($name==!null){
				$que="SELECT * FROM products where product_name='$name'";
				if($minAge==!null && $maxAge!=null){
					$que="SELECT * FROM products where product_name='$name' AND age>='$minAge' AND age<='$maxAge'";
				}
				elseif($minAge==!null){
					$que="SELECT * FROM products where product_name='$name' AND age>='$minAge'";
				}
				elseif($maxAge!=null){
					$que="SELECT * FROM products where product_name='$name' AND age<='$maxAge'";
				}
				elseif($maxPrice!=null){
					$que="SELECT * FROM products where product_name='$name' AND price<='$maxPrice'";
				}
				elseif($minPrice!=null){
					$que="SELECT * FROM products where product_name='$name' AND price>='$maxAge'";
				}
				elseif($gender!=null){
					$que="SELECT * FROM products where product_name='$name' AND gender='$gender'";
				}
			}
		 		  
			
			
			
		  
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query($que);
          if($result === FALSE){
            die(mysql_error());
          }
		  if (mysqli_num_rows($result)==0){
			  echo"<b>No match Found <b>";
			  echo $name;
			  echo"<br>";
			  echo "minprice:".$gender;
			  //echo "SELECT * FROM products where product_code={$productCode}";
			  //echo "SELECT * FROM products where product_code=".$productCode;
			  
		  }
          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-6 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
			  echo '<p><strong>Gender</strong>: '.$obj->gender.'</p>';
			  echo '<p><strong>Age</strong>: '.$obj->Age.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }
		  

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>

        <div class="row" style="margin-top:10px;">
          <div class="small-12">




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; PET World. All Rights Reserved.</p>
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
