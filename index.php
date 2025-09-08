<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>GoDaddy Clone</title>
<style>
body {font-family: Arial; background:#f4f4f4; margin:0;}
header {background:#111; color:#fff; padding:20px; text-align:center;}
.container {width:80%; margin:20px auto;}
.search-bar {padding:20px; text-align:center;}
.search-bar input {padding:10px; width:60%; border:1px solid #ccc; border-radius:8px;}
.search-bar button {padding:10px 20px; background:#28a745; border:none; color:#fff; border-radius:8px; cursor:pointer;}
.card {background:#fff; padding:20px; margin:20px 0; border-radius:12px; box-shadow:0 4px 6px rgba(0,0,0,0.1);} 
</style>
</head>
<body>
<header>
  <h1>GoDaddy Clone 🚀</h1>
  <?php if(isset($_SESSION['user_id'])) { ?>
    <a href="dashboard.php" style="color:#fff;">My Dashboard</a>
  <?php } ?>
</header>
 
<div class="container">
  <div class="search-bar">
    <form action="search.php" method="GET">
      <input type="text" name="domain" placeholder="Search your domain..." required>
      <button type="submit">Search</button>
    </form>
  </div>
 
  <div class="card">
    <h2>Popular Extensions</h2>
    <p>.com | .net | .org</p>
  </div>
 
  <div class="card">
    <h2>Promotions 🎉</h2>
    <p>Get your .com for just $9.99/year!</p>
  </div>
</div>
</body>
</html>
 
