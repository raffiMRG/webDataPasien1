<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyper[t]tention Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">
                <img src="image-removebg-preview (1).png" alt="">
            </div>
            <div class="illustration">
                <img src="image.png" alt="">
            </div>
        </div>
        <div class="right-panel">
            <div class="login-box">
                <h2>LOG IN</h2>
                <form action="" method="post">
                    <label for="email">Email address</label>
                    <input type="text" name="email" placeholder="masukkan email" required/>
                    
                    <label for="password">Password</label>
                    <input type="password" name="pass" placeholder="masukkan password" required>
                    
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    
                    <button type="submit" name="login" value="Login">Log In</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        // Mengambil data user dari database berdasarkan email dan password
        $data_user = mysqli_query($conn,"SELECT * FROM tb_login WHERE email = '$email' AND password = '$pass'");
        
        if(mysqli_num_rows($data_user) > 0) {
            $r = mysqli_fetch_array($data_user);
            
            // Simpan data user ke session
            $_SESSION['email'] = $r['email'];
            $_SESSION['role'] = $r['role'];
            
            // Redirect ke halaman profil setelah login berhasil
            header('location:profil.php');
        } else {
            echo "<script>alert('Email atau Password salah');</script>";
        }
    }
    ?>
</body>
</html>
