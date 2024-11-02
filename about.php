<?php
// Initialize a message variable
$message = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscribe'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you can add code to save the email to a database or send a confirmation email
        $message = "Thank you for subscribing with $email!";
    } else {
        $message = "Please enter a valid email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Apn-E-Dukaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="about.css"> <!-- Your CSS for styling the about page -->
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1>Apn-E-Dukaan</h1>
            </div>
            <div class="nav-options">
                <nav>
                    <a href="/index.php"><u>Home</u></a>
                    <a href="/contact.php">Contact</a>
                    <a href="/about.php">About</a>
                    <a href="/cart.php">Cart</a>
                </nav>
            </div>
            <div class="nav-search">
                <input type="search" placeholder="  Search here" class="search-bar" />
                <div class="search-icon">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <a href="cart.php" class="cart">
                  <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </header>

    <main>
        <!-- About Section -->
        <section class="about-section">
            <div class="about-container">
                <div class="about-content">
                    <h1>About Apn-E-Dukaan</h1>
                    <p>Welcome to <strong>Apn-E-Dukaan</strong>, your trusted Indian marketplace for all your shopping needs. 
                    We started with the belief that everyone deserves access to quality products at affordable prices, delivered straight to their doorstep. 
                    Our mission is to revolutionize shopping by connecting buyers to the best deals, with an Indian touch of trust and tradition.</p>
                </div>
            </div>
        </section>

        <!-- Vision and Mission -->
        <section class="mission-vision">
            <div class="mission-vision-container">
                <div class="mission">
                    <h2>Our Mission</h2>
                    <p>At Apn-E-Dukaan, we aim to empower every household with seamless shopping experiences and unbeatable value. 
                    We focus on providing high-quality products, fostering relationships with our customers, and creating a community that thrives on trust.</p>
                </div>
                <div class="vision">
                    <h2>Our Vision</h2>
                    <p>We envision a world where shopping is effortless and enjoyable for everyone, regardless of location. 
                    With a commitment to innovation and customer satisfaction, we are building a future where Apn-E-Dukaan is the go-to platform for every shopper in India.</p>
                </div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="values-section">
            <div class="values-container">
                <h2>Our Core Values</h2>
                <div class="values">
                    <div class="value-box">
                        <i class="fa-solid fa-handshake"></i>
                        <h3>Trust</h3>
                        <p>We build trust with our customers through transparency and exceptional service.</p>
                    </div>
                    <div class="value-box">
                        <i class="fa-solid fa-lightbulb"></i>
                        <h3>Innovation</h3>
                        <p>We constantly innovate to deliver the best