<?php

include 'config.php';

if(isset($_POST['add_to_cart'])){
  $prodcut_name = $_POST['prodcut_name'];
  $prodcut_price = $_POST['prodcut_price'];
  $prodcut_image = $_POST['prodcut_image'];
  $prodcut_quantity = 1;

  $select_cart = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$prodcut_name'");

  if(mysqli_num_rows($select_cart) > 0){
    $message[] = 'prodcut already added to cart';
  }else{
    $insert_query = mysqli_query($conn,"INSERT INTO `cart`(name,price,image,quantity)
    VALUES('$prodcut_name','$prodcut_price','$prodcut_image','$prodcut_quantity')");
    $message[] = 'prodcut added to cart succesfull!';
  }

}

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>products page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php
      if(isset($message)){
        foreach ($message as $message) {
          echo '<div class="message"><span>'.$message.'</span>
          <i class="fas fa-times" onclick="this.parentElement.style.display=`none`;"></i></div>';
        }
      }
     ?>

     <?php include 'header.php' ?>

     <style>
       .header .flex .navbar #admin{
         display: none;
       }
     </style>

     <div class="container">
       <section class="products">
         <h1 class="heading">latest prodcut</h1>
         <div class="box-container">
           <?php
              $select_products = mysqli_query($conn,"SELECT * FROM `products`");
              if(mysqli_num_rows($select_products) > 0){
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

            <form action="" method="post">
              <div class="box">
                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                <h3><?php echo $fetch_product['name']; ?></h3>
                <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                <input type="hidden" name="prodcut_name" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="prodcut_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="hidden" name="prodcut_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="submit" class="btn" name="add_to_cart" value="add to cart">
              </div>
            </form>

            <?php
                  }
                }
             ?>
         </div>
       </section>
     </div>

     <!-- custom js file link -->
     <script src="js/script.js"></script>
  </body>
</html>
