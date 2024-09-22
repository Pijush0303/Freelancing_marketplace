<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets\css\login.css"> <!-- Link to the CSS file -->
<div class="login-container">
    <h2>Login to Your Account</h2>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'includes/db.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Fetch the user based on the email entered
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify the password and proceed if valid
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store the user role in the session

            // Redirect based on the user's role
            if ($user['role'] == 'client') {
                header('Location: client.php');
            } elseif ($user['role'] == 'freelancer') {
                header('Location: freelancer.php');
            } else {
                // Default redirection if role is not set or recognized
                header('Location: index.php');
            }
        } else {
            echo "<p class='error-msg'>Invalid login credentials.</p>";
        }
    }
    ?>
    <form action="" method="POST" class="login-form">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>