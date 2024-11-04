<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cart.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .cart-container {
            padding: 20px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            text-align: left;
            padding: 10px;
        }

        .cart-summary {
            margin-top: 20px;
            font-size: 18px;
        }

        .checkout-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .checkout-button:hover {
            background-color: #218838;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
        }

        .quantity-controls input {
            width: 40px;
            text-align: center;
            margin: 0 5px;
        }

        .quantity-controls button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .quantity-controls button:hover {
            background-color: #0056b3;
        }
    </style>
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
                    <a href="/cart.php">Cart</a>
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
        <div class="cart-container">
            <?php

            $servername = "localhost";
            $username = "root";
            $database = "apn-e-dukaan";

            try {
                // Create a new PDO instance
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Handle connection error
                die("Connection failed: " . $e->getMessage());
                echo "Failed" . "<br>";
            }

            $sql2 = "SELECT * FROM cart;";
            $stmt2 = $conn->prepare($sql2);
            $stmt->execute();

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // if (isset($_POST['ID'])) {
            //     $ID = $_POST['ID'];
            //
            //     // Insert product ID into the cart table
            //     $sql = "INSERT INTO cart (ID) VALUES (:ID)";
            //     $stmt = $conn->prepare($sql);
            //     $stmt->bindParam(":ID", $ID, PDO::PARAM_INT);
            //
            //     if ($stmt->execute()) {
            //         echo "Product added to cart successfully!";
            //     } else {
            //         echo "Error adding Product to cart";
            //     }
            // } else {
            //     echo "No product ID specified.";

            // Calculate subtotal and total
            $subtotal = 0;

            // foreach ($_SESSION['cart'] as $productId => $quantity) {
            //     $subtotal += $products[$productId]['price'] * $quantity;
            // }

            $shipping = 50; // Fixed shipping cost
            $total = $subtotal + $shipping;

            echo "HELLO";

            ?>
            <h1>Your Cart</h1>

            <!-- Static Cart Table -->
            <table class="cart-table" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price (₹)</th> <!-- Prices in INR -->
                        <th>Total (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example of a product in the cart -->
                    <tr>
                        <td>Product 1</td>
                        <td>1</td>
                        <td>₹500.00</td>
                        <td>₹500.00</td>
                    </tr>
                    <tr>
                        <td>Product 2</td>
                        <td>2</td>
                        <td>₹300.00</td>
                        <td>₹600.00</td>
                    </tr>
                    <tr>
                        <td>Product 3</td>
                        <td>1</td>
                        <td>₹150.00</td>
                        <td>₹150.00</td>
                    </tr>
                </tbody>
            </table>

            <div class="cart-summary">
                <h3>Cart Summary</h3>
                <p>Subtotal: <strong>₹1,250.00</strong></p>
                <p>Shipping: <strong>₹50.00</strong></p>
                <p>Total: <strong>₹1,300.00</strong></p>
            </div>

            <a href="./checkout.html">
                <button class="checkout-button">Proceed to Checkout</button>
            </a>

    </main>

    <footer>
        <div class="footer-outer">
            <div class="footer-inner">
                <div class="footer-1">
                    <h1>Apn-E-Dukaan</h1>
                    <h6>Subscribe</h6>
                    <p>Get E-mail updates about our latest shop and offers.</p>
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
                    <a href="https://www.facebook.com/login/" class="facebook"><i
                            class="fa-brands fa-facebook-f"></i></a>
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
