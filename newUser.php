<?php
include 'session-check.php';
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link rel="stylesheet" href="addnew.css">
</head>
<body>
    <div class="page-container">
    <header class="header">
            <div class="header-content">
                <h1 class="header-title">Indev Webform</h1>
            </div>
        </header>
        <p style="position: absolute; color: white; top: 0px; right: 20px;">You are logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
            <form action="logout.php" method="post">
                <button id="f1">Logout</button>
            </form>
        <div class="login-container">
            <h2>Add New User</h2>
            <form action="addUser.php" method="post">
                <div class="form-group">
                    <label for="username">Enter New Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Enter New Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Select Access:</label>
                    <div class="access-options">
                        <label for="regular"><input type="radio" id="regular" name="access" value="regular" required> Regular</label>
                        <label for="admin"><input type="radio" id="admin" name="access" value="admin" required> Admin</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
