<?php
session_start();
include 'db.php';
 
 
if (!isset($_SESSION['user_id'])) {
echo "<script>alert('Please login first!'); redirect('index.php');</script>";
exit;
}
 
 
$uid = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM domains WHERE user_id=$uid");
?>
 
 
<!DOCTYPE html>
<html>
<head>
<title>Dashboard - My Domains</title>
<style>
body {font-family: Arial; background:#f4f4f4; margin:0;}
header {background:#111; color:#fff; padding:15px; text-align:center;}
.container {width:80%; margin:30px auto;}
.card {background:#fff; padding:20px; margin:10px 0; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
button {padding:8px 15px; border:none; border-radius:6px; background:#0073e6; color:#fff; cursor:pointer;}
</style>
</head>
<body>
<header>
<h1>My Domains Dashboard</h1>
<a href="index.php" style="color:#fff;">🏠 Home</a>
</header>
<div class="container">
<h2>Registered Domains</h2>
<?php
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "<div class='card'>
<h3>{$row['domain_name']}</h3>
<p>Expiry Date: {$row['expiry_date']}</p>
<button>Renew</button>
<button>Transfer</button>
<button>Remove</button>
</div>";
}
} else {
echo "<p>No domains registered yet.</p>";
}
?>
</div>
</body>
</html>
