<?php

session_start();

$username_valid = "unnes";
$password_valid = "1234";

// Cek apakah data POST sudah dikirim sebelum mengaksesnya
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $username_valid && $password == $password_valid) {
        // Cek apakah session 'login' sudah ada dan merupakan array
        if (!isset($_SESSION['login']) || !is_array($_SESSION['login'])) {
            $_SESSION['login'] = [];
        }
        
        $_SESSION['login'][] = [
            'username' => $username,
            'password' => $password,
            'login_at' => date('Y-m-d H:i:s')
        ];

        echo "Selamat datang: " . htmlspecialchars($username) . ", Anda telah login sebanyak: " . count($_SESSION['login']) . " kali";
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
        echo "<pre>";
        var_dump($_SESSION['login']);
        echo "</pre>";

    } else {
        echo "Username atau password salah";
    }
} else {
    // Jika tidak ada data POST (misalnya, setelah logout atau akses langsung), 
    // Anda bisa mengarahkan pengguna ke halaman login (misal: index.html atau form login)
    header("Location: index.html");
    exit();
}

?>