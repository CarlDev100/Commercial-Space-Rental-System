<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit; }
require 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>GROUP 7
    </title>
    <link rel="icon" href="data:,">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topbar">
    <div class="topbar-title">Group 7 <p class="hint">Members: Carl Lawrence Lara <br> Winright Ramos <br> John Mark Anino <br> John Arthur Calope</p></div>
    <div class="topbar-user">
        Logged in as <strong><?= $_SESSION['user'] ?></strong>
        &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
        
    </div>
</body>
</html>
