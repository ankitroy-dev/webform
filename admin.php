<?php
include 'session-check.php';
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <header class="header">
      <p style="position: absolute; color: white; top: 0px; right: 20px;">You are logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
      <form action="logout.php" method="post">
      <button id="f1">Logout</button>
      </form>
        <div class="header-content">
            <h1 class="header-title">Indev Webform</h1>
        </div>
    </header>
  <div class="admin-container">
    <h1>Admin Dashboard</h1>
    <div class="button-container">
      <button class="admin-button" onclick="viewEntries()">View Entries</button>
      <button class="admin-button" onclick="modifyEntries()">Modify Entries</button>
      <button class="admin-button" onclick="addNewEntries()">Add New Entry</button>
      <button class="admin-button" onclick="addNewUser()">Add New User</button>
      <button class="admin-button" onclick="deleteUsers()">Delete Users</button>
    </div>
  </div>

  <script>
    function viewEntries() {
      window.location.href = 'display-data.php';
    }
    
    function modifyEntries() {
      alert('Modify Entries button clicked');
      // Add your logic here
    }

    function addNewEntries() {
      window.location.href = 'WebForm.html'
    }
    
    function addNewUser() {
      window.location.href = 'newUser.php';
    }

    function deleteUsers() {
      alert('Delete Users button clicked');
      // Add your logic here
    }

  </script>
</body>
</html>
