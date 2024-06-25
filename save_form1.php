<?php
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $language = $_POST['language'];
    $gender = $_POST['gender'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'indev_webform');
    if ($conn->connect_error) 
    {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } 
    else 
    {
        $stmt = $conn->prepare("INSERT INTO registration1 (fullName, email, language, gender) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullName, $email, $language, $gender);
        $execval = $stmt->execute();
        if ($execval) 
        {
            echo "<h2>Registered Successfully...</h2>";
        } 
        else 
        {
            echo "<h2>Registration Failed...</h2>";
        }
    }
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
</head>
<body>
    <!-- Redirect button to WebForm.html -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="WebForm.html" style="padding: 10px 20px; background-color: blue; color: white; text-decoration: none; border-radius: 4px;">Register Again</a>
    </div>
</body>
</html>
