<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/contact.css">
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
                <div class="call-us">
                    <div class="call-us-message">
                        <div class="call-logo"><i class="fa-solid fa-phone"></i></div>
                        <h4>Call to us</h4>
                    </div>
                    <p>We are available 24/7, 7 days a week</p>
                    <p>Phone: +xxxxx xxxxx</p>
                </div>
                <div class="line-between"></div>
                <div class="email-us">
                    <div class="email-us-message">
                        <div class="email-logo"><i class="fa-regular fa-envelope"></i></div>
                        <h4>Write To Us</h4>
                    </div>
                    <p>Fill out our form and we will contact
                        you within 24 hours</p>
                    <p>Email: customerservice@apne.com</p>
                    <p>Email: support@apne.com</p>
                </div>
            </div>
            <div class="right-box">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
                    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
                    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

                    if (!$name || !$email || !$message) {
                        echo "<p style='color: red;'>Please fill out all required fields correctly.</p>";
                    } else {
                        $to = "support@apne.com";
                        $subject = "New Contact Form Submission from $name";
                        $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message\n";
                        $headers = "From: $email";

                        if (mail($to, $subject, $body, $headers)) {
                            echo "<p style='color: green;'>Message sent successfully!</p>";
                        } else {
                            echo "<p style='color: red;'>Message could not be sent. Please try again later.</p>";
                        }
                    }
                }
                ?>

                <form method="POST" action="">
                    <div class="up-boxes">
                        <div class="name"><input type="text" name="name" placeholder="Name" required></div>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <div class="phone-no"><input type="tel" name="phone" placeholder="Phone-no."></div>
                    </div>
                    <div class="below-box">
                        <input type="text" name="message" placeholder="Your Message" required>
                    </div>
                    <div class="send-message"><button type="submit">Send Message</button></div>
                </form>
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
