<?php
session_start();
if (isset($_SESSION['user'])) { header("Location: dashboard.php"); exit; }
require 'db.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = trim($_POST['username']);
    $p = trim($_POST['password']);
    if ($u == "" || $p == "") {
        $error = "Please fill in all fields.";
    } else {
        $res  = mysqli_query($conn, "SELECT * FROM users WHERE username = '$u' LIMIT 1");
        $user = mysqli_fetch_assoc($res);
        if ($user && $p == $user['password']) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php"); exit;
        } else {
            $error = "Wrong username or password!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Ramos Test CRUD</title>
    <link rel="icon" href="data:,">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-wrapper">
    <div class="login-box">
        <div class="login-logo">PR</div>
        <h2>Persons Records</h2>
        <p class="login-sub">Ramos Test CRUD — Sign in to continue</p>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <p class="hint">Default: admin / admin123</p>
    </div>
</div>
</body>
</html>
