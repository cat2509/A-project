<?php
// Database connection
$servername = "localhost"; // Change as needed
$username = "username"; // Your database username
$password = "password"; // Your database password
$dbname = "database"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching total orders
$totalOrdersQuery = "SELECT COUNT(*) as total FROM orders";
$totalOrdersResult = $conn->query($totalOrdersQuery);
$totalOrders = $totalOrdersResult->fetch_assoc()['total'];

// Fetching products left
$productsLeftQuery = "SELECT COUNT(*) as total FROM products WHERE stock > 0";
$productsLeftResult = $conn->query($productsLeftQuery);
$productsLeft = $productsLeftResult->fetch_assoc()['total'];

// Fetching number of sellers
$sellersQuery = "SELECT COUNT(*) as total FROM sellers";
$sellersResult = $conn->query($sellersQuery);
$numberOfSellers = $sellersResult->fetch_assoc()['total'];

// Fetching best sellers
$bestSellersQuery = "SELECT product_id FROM orders GROUP BY product_id ORDER BY COUNT(*) DESC LIMIT 3";
$bestSellersResult = $conn->query($bestSellersQuery);
$bestSellers = [];
while ($row = $bestSellersResult->fetch_assoc()) {
    $bestSellers[] = $row['product_id'];
}

// Fetching recent orders
$recentOrdersQuery = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 5";
$recentOrdersResult = $conn->query($recentOrdersQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Admin Dashboard</h1>
        </header>
        
        <div class="stats">
            <div class="stat-box">
                <h2>Total Orders</h2>
                <p><?php echo $totalOrders; ?></p>
            </div>
            <div class="stat-box">
                <h2>Products Left</h2>
                <p><?php echo $productsLeft; ?></p>
            </div>
            <div class="stat-box">
                <h2>Number of Sellers</h2>
                <p><?php echo $numberOfSellers; ?></p>
            </div>
            <div class="stat-box">
                <h2>Best Sellers</h2>
                <ul>
                    <?php foreach ($bestSellers as $seller): ?>
                        <li><?php echo htmlspecialchars($seller); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="table-section">
            <h2>Recent Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $recentOrdersResult->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['amount']); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $conn->close(); // Close the database connection ?>
</body>
</html>