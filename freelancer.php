<?php 
include 'includes/header.php'; 
session_start();

// Check if the user is logged in and is a freelancer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'freelancer') {
    header('Location: login.php');
    exit;
}

require 'includes/db.php';

$user_id = $_SESSION['user_id'];

// Fetch services provided by the freelancer
$servicesStmt = $pdo->prepare("SELECT * FROM services WHERE user_id = ?");
$servicesStmt->execute([$user_id]);
$services = $servicesStmt->fetchAll();

// Fetch orders received by the freelancer
$ordersStmt = $pdo->prepare("
    SELECT o.*, s.title AS service_title, u.username AS client
    FROM orders o
    JOIN services s ON o.service_id = s.service_id
    JOIN users u ON o.client_id = u.user_id
    WHERE s.user_id = ?
");
$ordersStmt->execute([$user_id]);
$orders = $ordersStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        /* Global Styling */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    color: #333;
}

.freelancer-dashboard-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    animation: slideIn 0.6s ease-out;
}

.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e0e0e0;
}

h1 {
    font-size: 2.5em;
    margin: 0;
    color: #333;
    font-weight: 700;
}

h2 {
    font-size: 1.75em;
    margin-top: 40px;
    margin-bottom: 20px;
    color: #555;
    font-weight: 500;
}

.btn-logout {
    padding: 12px 20px;
    background-color: #e76f51;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1em;
    font-weight: 600;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-logout:hover {
    background-color: #c44536;
    transform: translateY(-3px);
}

/* Tables Styling */
.services-table, .orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeInUp 0.8s ease-in-out;
}

.services-table th, .orders-table th, 
.services-table td, .orders-table td {
    padding: 15px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 1em;
    color: #555;
}

.services-table th, .orders-table th {
    background-color: #f5f5f5;
    font-weight: 600;
    color: #333;
}

.services-table tr, .orders-table tr {
    transition: background-color 0.3s ease;
}

.services-table tr:hover, .orders-table tr:hover {
    background-color: #fafafa;
}

.services-table td, .orders-table td {
    vertical-align: middle;
}

/* Button Styling */
.btn-add-service {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 25px;
    background-color: #4caf50;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-size: 1.1em;
    font-weight: 600;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-add-service:hover {
    background-color: #388e3c;
    transform: translateY(-3px);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-15px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Dashboard</title>
   <!-- Link to the CSS file -->
</head>
<body>
    <div class="freelancer-dashboard-container">
        <header class="dashboard-header">
            <h1>Welcome to Your Freelancer Dashboard</h1>
            <a href="logout.php" class="btn-logout">Logout</a>
        </header>

        <h2>My Services</h2>
        
        <?php if (count($services) > 0): ?>
            <table class="services-table">
                <thead>
                    <tr>
                        <th>Service ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td><?= htmlspecialchars($service['service_id']) ?></td>
                            <td><?= htmlspecialchars($service['title']) ?></td>
                            <td><?= htmlspecialchars($service['description']) ?></td>
                            <td>$<?= htmlspecialchars($service['price']) ?></td>
                            <td><?= htmlspecialchars($service['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have not added any services yet.</p>
        <?php endif; ?>

        <div class="add-service-link">
            <a href="add_service.php" class="btn-add-service">Add New Service</a>
        </div>

        <h2>Orders Received</h2>
        
        <?php if (count($orders) > 0): ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Service Title</th>
                        <th>Client</th>
                        <th>Date Purchased</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                            <td><?= htmlspecialchars($order['service_title']) ?></td>
                            <td><?= htmlspecialchars($order['client']) ?></td>
                            <td><?= htmlspecialchars($order['date_purchased']) ?></td>
                            <td><?= htmlspecialchars($order['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have not received any orders yet.</p>
        <?php endif; ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
