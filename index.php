<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="home.css" />
</head>

<body>
  <header>
    <div class="navbar">
      <?php
      $servername = "localhost";
      $username = "root";
      $database = "apn-e-dukaan";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        // Handle connection error
        die("Connection failed: " . $e->getMessage());
        echo "Failed" . "<br>";
      }
      ?>

      <?php
      // SQL query to fetch data
      $sql = "SELECT * FROM product ORDER BY ID";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="logo">
        <h1>Apn-E-Dukaan</h1>
      </div>
      <div class="nav-options">
        <nav>
          <a href="#"><u>Home</u></a>
          <a href="/contact.html">Contact</a>
          <a href="#">About</a>
          <a href="/sign-in.html">Sign Up</a>
        </nav>
      </div>
      <div class="nav-search">
        <input type="search" placeholder="  Search here" class="search-bar" />
        <div class="search-icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="cart"><i class="fa-solid fa-cart-shopping"></i></div>
      </div>
    </div>
  </header>

  <main>
    <div class="hero-section">
      <div class="hero-image" style="background-image: url('http://localhost/apn-e-dukaan/F79.jpg')"></div>
    </div>

    <div class="Flash">
      <div class="flash-sales">
        <div class="heading">
          <h3>Flash Sales</h3>
        </div>
        <div class="shop-section">
          <?php if (!empty($products)): ?>
            <?php foreach (array_slice($products, 0, 5) as $product): ?>
              <div class="outer-box">
                <div class="box-content">
                  <div class="image-section" style="background-image: url('http://localhost/apn-e-dukaan/<?php echo $product["URL"]; ?>')"></div>
                  <h4><?php echo $product["Name"]; ?></h4>
                  <p>₹<?php echo $product["Price"]; ?></p>

                  <form action='cart.php' method="POST">
                    <input type="hidden" name="ID" value="<?php echo $product['ID']; ?>">
                    <button class="add_cart" type="submit">Add to Cart</button>
                  </form>

                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <h1>No Products</h1>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="categories-outer">
      <div class="categories-inner">
        <div class="heading">
          <h3>Browse By Category</h3>
        </div>
        <div class="categories">
          <div class="category"></div>
          <div class="category"></div>
          <div class="category"></div>
          <div class="category"></div>
          <div class="category"></div>
        </div>
      </div>
    </div>

    <div class="this-month">
      <div class="best-selling">
        <div class="heading">
          <h3>Best Selling Products of the month</h3>
        </div>
        <div class="shop-section">
          <?php if (!empty($products)): ?>
            <?php foreach (array_slice($products, 5, 10) as $product): ?>
              <div class="outer-box">
                <div class="box-content">
                  <div class="image-section" style="background-image: url('http://localhost/apn-e-dukaan/<?php echo $product["URL"]; ?>')"></div>
                  <h4><?php echo $product["Name"]; ?></h4>
                  <p>₹<?php echo $product["Price"]; ?></p>

                  <form action='cart.php' method="POST">
                    <input type="hidden" name="ID" value="<?php echo $product['ID']; ?>">
                    <button class="add_cart" type="submit">Add to Cart</button>
                  </form>

                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <h1>No Products</h1>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="explore-outer">
      <div class="explore-more">
        <div class="heading">
          <h3>Explore-More</h3>
        </div>
        <div class="shop-section">
          <?php if (!empty($products)): ?>
            <?php foreach (array_slice($products, 15, 10) as $product): ?>
              <div class="outer-box">
                <div class="box-content">
                  <div class="image-section" style="background-image: url('http://localhost/apn-e-dukaan/<?php echo $product["URL"]; ?>')"></div>
                  <h4><?php echo $product["Name"]; ?></h4>
                  <p>₹<?php echo $product["Price"]; ?></p>

                  <form action='cart.php' method="POST">
                    <input type="hidden" name="ID" value="<?php echo $product['ID']; ?>">
                    <button class="add_cart" type="submit">Add to Cart</button>
                  </form>

                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <h1>No Products</h1>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="arrival-outer">
      <div class="new-arrival">
        <div class="heading">
          <h3>New Arrival</h3>
        </div>
        <div class="arrival">
          <div class="left-image" style="background-image: url('http://localhost/apn-e-dukaan/F2.jpeg');"></div>
          <div class="right-image">
            <div class="up-image" style="background-image: url('http://localhost/apn-e-dukaan/F2.jpeg');"></div>
            <div class="down-image">
              <div class="part-1" style="background-image: url('http://localhost/apn-e-dukaan/F1.jpeg');"></div>
              <div class="part-1" style="background-image: url('http://localhost/apn-e-dukaan/F2.jpeg');"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer>
    <div class="footer-outer">
      <div class="footer-inner">
        <div class="footer-1">
          <h1>Apn-E-Dukaan</h1>
          <h6>Subscribe</h6>
          <p>Get E-mail updates about our latest
            shop and latest offer.</p>
          <input type="email" placeholder="E-mail">
        </div>
        <div class="footer-2">
          <h3>Account</h3>
          <ul>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Wishlist</a></li>
            <li><a href="#">Sign-in</a></li>
            <li><a href="#">Track my order</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
        <div class="footer-3">
          <h3>Quick Link</h3>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms Of Use</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="footer-4">
          <h3>Follow us on: </h3>
          <a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.facebook.com/login/" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="https://x.com/i/flow/login"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="https://www.linkedin.com/login"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="copyright">
        <i class="fa-regular fa-copyright"></i>
        <p> 2024, Apn-E-Dukaan.com, All Rights Reserved </p>
      </div>
    </div>
  </footer>
</body>

</html>
