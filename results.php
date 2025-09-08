?php 
include 'db.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Domain Search Results</title>
<style>
body {font-family: Arial, sans-serif; background:#fafafa; margin:0;}
header {background:#111; color:#fff; padding:15px; text-align:center;}
.container {width:75%; margin:30px auto;}
.card {background:#fff; padding:20px; margin:15px 0; border-radius:10px; box-shadow:0 3px 6px rgba(0,0,0,0.1);} 
button {background:#0073e6; color:#fff; border:none; padding:10px 18px; border-radius:6px; cursor:pointer;}
button:hover {background:#005bb5;}
</style>
</head>
<body>
<header>
  <h1>Search Results 🔍</h1>
  <a href="index.php" style="color:#fff;">🏠 Home</a> |
  <a href="dashboard.php" style="color:#fff;">📂 Dashboard</a>
</header>
 
<div class="container">
<?php
if (!isset($_GET['domain'])) {
    echo "<p>Please enter a domain name.</p>";
    exit;
}
 
$domain = strtolower(trim($_GET['domain']));
 
// check if already registered
$result = $conn->query("SELECT * FROM domains WHERE domain_name='$domain'");
if ($result->num_rows > 0) {
    echo "<div class='card'><h2>$domain is already taken ❌</h2></div>";
} else {
    $tlds = $conn->query("SELECT * FROM tlds");
    while($row = $tlds->fetch_assoc()) {
        $full = $domain . $row['extension'];
        echo "<div class='card'>
        <h2>$full ✅ Available</h2>
        <p>Price: $".$row['price']." / year</p>";
 
        if (isset($_SESSION['user_id'])) {
            echo "<button onclick=\"redirect('dashboard.php?register=$full')\">Register Now</button>";
        } else {
            echo "<button onclick=\"redirect('index.php')\">Login to Register</button>";
        }
        echo "</div>";
    }
}
?>
</div>
</body>
</html>
 
