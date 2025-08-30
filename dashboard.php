<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - MYZOO</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive;
            text-align: center;
            background-color: #fffde7;
        }
        h1 {
            margin-top: 50px;
            font-size: 36px;
            color: #388e3c;
        }
        .menu {
            margin-top: 40px;
        }
        .menu a {
            display: inline-block;
            margin: 20px;
            padding: 15px 25px;
            background-color: #aed581;
            color: black;
            text-decoration: none;
            border-radius: 12px;
            font-size: 18px;
        }
        .btn-logout {
            margin-top: 50px;
            display: inline-block;
            background-color: #ef5350;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>🐾 Selamat Datang di MYZOO</h1>

    <div class="menu">
        <a href="hewan.php">🦁 Data Hewan</a>
        <a href="pengunjung.php">👨‍👩‍👧‍👦 Data Pengunjung</a>
    </div>

    <a href="logout.php" class="btn-logout">🚪 Logout</a>
</body>
</html>
