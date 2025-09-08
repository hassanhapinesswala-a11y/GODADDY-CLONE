<?php 
include 'db.php'; 
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($uid, $hashed);
 
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed)) {
            $_SESSION['user_id'] = $uid;
            echo "<script>alert('Login successful!'); redirect('dashboard.php');</script>";
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body {font-family: Arial; background:#f4f4f4; margin:0;}
.container {width:400px; margin:80px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 3px 6px rgba(0,0,0,0.2);}
input {width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:6px;}
button {padding:10px; width:100%; background:#0073e6; color:#fff; border:none; border-radius:6px; cursor:pointer;}
button:hover {background:#005bb5;}
</style>
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <p>Don’t have an account? <a href="signup.php">Signup</a></p>
</div>
</body>
</html>
