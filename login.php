 
 
<?php
session_start();
 
// If already logged in, redirect to index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
$error = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Static admin login
    if ($username === "admin" && $password === "admin") {
 
        $_SESSION['username'] = "ADMIN";
        header("Location: index.php");
        exit();
 
    } else {
        $error = "Invalid username or password!";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
 
<div class="content">
    <div class="form-header">
        <h2>Login Form</h2>
    </div>
 
    <div class="form-container">
        <?php if ($error != ""): ?>
            <p2 style="color:red;"><?php echo $error; ?></p2>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
        
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
        
            <button type="submit" class="btn-submit">Login</button>
        </form>
    </div>
</div>
 
</body>
</html>