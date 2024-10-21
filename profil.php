<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyper[t]tention Profile</title>
    <link rel="stylesheet" href="main.css">
    <link href="fontawesome/fontawesome/css/all.min.css" rel="stylesheet"/>
    <style>
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .profile-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .profile-content {
            padding: 20px;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .profile-info li {
            margin-bottom: 10px;
        }
        .profile-info li i {
            font-size: 18px;
            margin-right: 10px;
        }
        .profile-medical {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .profile-medical h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Screenshot_2024-09-02_152828-removebg-preview.png" alt="Hyper[t]tention Logo">
        </div>
        <nav>
            <ul>
                <li><a href="main.html">Home</a></li>
                <li><a href="#">Info</a></li>
                <li><a href="#">Patient</a></li>
                <li><a href="#" class="active">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="profile-container">
            <div class="profile-header">
                <h1>Profile</h1>
            </div>
            <div class="profile-content">
                <div class="profile-info">
                    <h2>Account Information</h2>
                    <ul>
                        <li>
                            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            <span>Email:</span> <?php echo htmlspecialchars($_SESSION['email']); ?>
                        </li>
                    </ul>
                </div>
                <div class="profile-medical">
                    <h2>Medical Role</h2>
                    <ul>
                        <li>
                            <i class="fa-solid fa-user-md" aria-hidden="true"></i>
                            <span>Role:</span> <?php echo htmlspecialchars($_SESSION['role']); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
