<?php
session_start();

// Initialize cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Sample products (in a real application, this data might come from a database)
$products = [
    'product1' => ['name' => 'Product 1', 'price' => 500],
    'product2' => ['name' => 'Product 2', 'price' => 300],
    'product3' => ['name' => 'Product 3', 'price' => 150],
];

// Handle adding/updating items in the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0 && isset($products[$productId])) {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Calculate subtotal and total
$subtotal = 0;
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $subtotal += $products[$productId]['price'] * $quantity;
}
$shipping = 50; // Fixed shipping cost
$total = $subtotal + $shipping;

?>

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