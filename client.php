<?php 
include 'includes/header.php'; 
session_start();

// Check if the user is logged in and has the 'client' role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'client') {
    header('Location: login.php');
    exit;
}

require 'includes/db.php';

// Fetch client details
$user_id = $_SESSION['user_id'];

// Fetch orders made by the client
$stmt = $pdo->prepare("
    SELECT o.*, s.title AS service_title, u.username AS freelancer
    FROM orders o
    JOIN services s ON o.service_id = s.service_id
    JOIN users u ON s.user_id = u.user_id
    WHERE o.client_id = ?
");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        /* Client Dashboard Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
    color: #333;
}

.client-dashboard {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.8s ease-in-out;
}

h1, h2 {
    color: #2a9d8f;
    margin-bottom: 15px;
    text-align: center;
    animation: slideDown 0.6s ease-out;
}

.stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
}

.stat-item {
    background-color: #e9ecef;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    flex: 1;
    margin: 0 10px;
    transition: transform 0.3s;
}

.stat-item:hover {
    transform: translateY(-5px);
}

.stat-item h3 {
    margin: 0;
    font-size: 16px;
    color: #264653;
}

.stat-item p {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
    color: #e76f51;
}

.orders-section, .services-section, .profile-management, .support-section, .account-settings {
    margin-bottom: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    animation: fadeInUp 0.6s ease-out;
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    animation: fadeIn 1s ease-in;
}

.orders-table th, .orders-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.orders-table th {
    background-color: #2a9d8f;
    color: #fff;
}

.orders-table tr:hover {
    background-color: #f1f1f1;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #2a9d8f;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s, transform 0.3s;
}

.btn:hover {
    background-color: #1f776b;
    transform: translateY(-3px);
}

.btn-view-services {
    display: block;
    margin: 0 auto;
    width: fit-content;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <!-- Link to your custom CSS -->
</head>
<body>
    <div class="client-dashboard">
        <!-- Dashboard Overview -->
        <section class="overview">
            <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
            <div class="stats">
                <div class="stat-item">
                    <h3>Total Orders</h3>
                    <p><?= count($orders) ?></p>
                </div>
                <div class="stat-item">
                    <h3>Pending Orders</h3>
                    <p><?= count(array_filter($orders, fn($order) => $order['status'] == 'Pending')) ?></p>
                </div>
                <div class="stat-item">
                    <h3>Completed Projects</h3>
                    <p><?= count(array_filter($orders, fn($order) => $order['status'] == 'Completed')) ?></p>
                </div>
            </div>
        </section>

        <!-- Order Management -->
        <section class="orders-section">
            <h2>My Orders</h2>
            <?php if (count($orders) > 0): ?>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Service Title</th>
                            <th>Freelancer</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['order_id']) ?></td>
                                <td><?= htmlspecialchars($order['service_title']) ?></td>
                                <td><?= htmlspecialchars($order['freelancer']) ?></td>
                                <td><?= htmlspecialchars($order['date_purchased']) ?></td>
                                <td><?= htmlspecialchars($order['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No orders placed yet. Start exploring services!</p>
            <?php endif; ?>
        </section>

        <!-- Browse Services -->
        <section class="services-section">
            <h2>Browse Available Services</h2>
            <a href="service.php" class="btn">View Services</a>
        </section>

        <!-- Profile Management -->
        <section class="profile-management">
            <h2>Manage Your Profile</h2>
            <a href="profile.php" class="btn">Edit Profile</a>
        </section>

        <!-- Support and Feedback -->
        <section class="support-section">
            <h2>Support & Feedback</h2>
            <a href="support.php" class="btn">Contact Support</a>
            <a href="feedback.php" class="btn">Give Feedback</a>
        </section>

        <!-- Account Settings -->
        <section class="account-settings">
            <h2>Account Settings</h2>
            <a href="settings.php" class="btn">Manage Account</a>
        </section>

        <section class="logout-settings">
            <h2><a href="index.php" class="btn" >LOGOUT</a></h2>
            
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
