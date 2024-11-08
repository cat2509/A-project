<?php
// Database connection parameters
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'apn-e-dukaan';

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $address = $_POST['address'];
    $house_no = $_POST['house_no'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    // Insert data into the database
    $sql = "INSERT INTO billing (fname, lname, address, house_no, city, pincode, phone, email) VALUES ('$fname', '$lname', '$address', '$house_no', '$city', '$pincode', '$phone', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/checkout.css">


</head>

<body>
  <header>
    <div class="navbar">
      <div class="logo">
        <h1>Apn-E-Dukaan</h1>
      </div>
      <div class="nav-options">
        <nav>
          <a href="/index.html"><u>Home</u></a>
          <a href="/contact.html">Contact</a>
          <a href="/about.html">About</a>
          <a href="/cart.html">Cart</a>
        </nav>
      </div>
      <div class="nav-search">
        <input type="search" placeholder="  Search here" class="search-bar" />
        <div class="search-icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <a href="cart.html" class="cart">
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
      </div>

  </header>

  <main>
    <div class="outer-box">
      <div class="left-box">
        <h3>Billing Details</h3>
        <form action=" ">

          <label for="firstname">
            <h6>First Name</h6>
          </label>
          <input type="text" id="firstname">
          <label for="lastname">
            <h6>Last Name</h6>
          </label>
          <input type="text" id="lastname">
          <label for="streetaddress">
            <h6>Street Address</h6>
          </label>
          <input type="text" id="streetaddress">
          <label for="apartmentfloor">
            <h6>Apartment floor, Wing, etc</h6>
          </label>
          <input type="text" id="apartmentfloor">
          <label for="town-city">
            <h6>Town / City</h6>
          </label>
          <input type="text" id="town-city">
          <label for="pincode">
            <h6>Pincode</h6>
          </label>
          <input type="text" id="pincode">
          <label for="phone_no">
            <h6>Phone no.</h6>
          </label>
          <input type="tel" id="phone_no">
          <label for="email">
            <h6>Email Address</h6>
          </label>
          <input type="email" id="email">
          <div class="save-information">
            <input type="checkbox" id="information-save">
            <label for="information-save">
              <h6>Save this information for faster check-out next time</h6>
            </label>
          </div>
          
          <div class="payment-wrapper">
            <div class="payment-option">
              <h4>Select Payment Method</h4>
              <a href="/orderConf.html">
                <button class="cod-button">Cash on Delivery</button>
              </a>





            </div>
          </div>

        </form>
      </div>
      <!-- <div class="right-box">
            </div> -->
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