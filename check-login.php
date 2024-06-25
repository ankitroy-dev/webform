<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'indev_webform');
if ($conn->connect_error) 
{
    die("<h1>Connection Failed: " . $conn->connect_error . "</h1>");
} 
else 
{
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->store_result();
    $stmt->bind_result($storedpassword);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if ($password == $storedpassword)
        {
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } 
        else 
        {
            echo "<h1>Invalid password.</h1>";
        }
    } 
    else 
    {
        echo "<h1>No user found.</h1>";
    }

    $stmt->close();
    $conn->close();
}
?>
