<?php
$host = "localhost";
$user = "uyhezup6l0hgf";
$pass = "pr634bpk3knb";
$dbname = "dbrerf6favvvxk";
 
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// Agar tables exist nahi karti to auto create ho jayengi
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
 
$conn->query("CREATE TABLE IF NOT EXISTS domains (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    domain_name VARCHAR(100) NOT NULL,
    expiry_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)");
 
$conn->query("CREATE TABLE IF NOT EXISTS tlds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    extension VARCHAR(10) NOT NULL,
    price DECIMAL(10,2) NOT NULL
)");
 
$conn->query("INSERT INTO tlds (extension, price)
    SELECT '.com', 9.99 UNION SELECT '.net', 10.99 UNION SELECT '.org', 8.99
    ON DUPLICATE KEY UPDATE price=VALUES(price)");
?>
 
<script>
function redirect(url) {
    window.location.href = url;
}
</script>
 
