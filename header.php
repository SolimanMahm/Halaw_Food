<header class="header">
  <div class="flex">
    <a href="#" class="logo">Halawa</a>
    <nav class="navbar">
      <a href="admin.php" id="admin">add products</a>
      <a href="products.php" id="u1">view products</a>
    </nav>

    <?php

    $select_rows = mysqli_query($conn,"SELECT * FROM `cart`") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);
     ?>

    <a href="cart.php" class ="cart" id="u2">Cart <span><?php echo $row_count; ?></span></a>

    <div id="menu-btn" class="fas fa-bars">

    </div>
  </div>
</header>
