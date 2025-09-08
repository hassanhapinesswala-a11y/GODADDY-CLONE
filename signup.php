<?php 
include 'db.php'; 
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
 
    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! Please login.'); redirect('login.php');</script>";
    } else {
        echo "<script>alert('Error: Could not sign up.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
<style>
body {font-family: Arial; background:#f4f4f4; margin:0;}
.container {width:400px; margin:80px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 6px rgba(0,0,0,0.2);}
input {width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:6px;}
button {padding:10px; width:100%; background:#28a745; color:#fff; border:none; border-radius:6px; cursor:pointer;}
button:hover {background:#218838;}
</style>
</head>
<body>
<div class="container">
  <h2>Create Account</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Signup</button>
  </form>
  <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
 
