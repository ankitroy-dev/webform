<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access = $_POST['access'];
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'indev_webform');
    if ($conn->connect_error) 
    {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } 
    else 
    {
        $stmt = $conn->prepare("INSERT INTO users (username, password, access) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username,$password,$access);
        $execval = $stmt->execute();
        if ($execval) 
        {
            echo "<h2>Added Successfully...</h2>";
        } 
        else 
        {
            echo "<h2>Failed...</h2>";
        }
    }
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <style>
            #b1,#b2
            { 
                background-color: blue; 
                color: white; 
                border: none; 
                padding: 10px 20px; 
                border-radius: 5px; 
                cursor: pointer; 
                font-size: 14px;
                transition: background-color 0.3s;
            }
            #b1:hover,#b2:hover{
                background-color:green;
            }
        </style>
    </head>
    <body>
        <div class="button-container">
            <button id="b1" type="submit" onclick="goBack()">Add Another</button>
            <button id="b2" type="submit" onclick="adminPage()">Admin Page</button>
        </div>
        <script>
            function goBack()
            {
                window.location.href='newUser.php';
            }
            function adminPage()
            {

                window.location.href='admin.php';
            }
        </script>
    </body>
</html>

