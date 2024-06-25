<?php
include 'session-check.php';
checkLogin();
$conn = new mysqli('localhost', 'root', '', 'indev_webform');
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}
$sql = "SELECT * FROM registration1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            }

        .header-content {
            max-width: 800px;
            margin: 0 auto;
            }

        .header-title {
            font-size: 24px;
            margin: 0;
            }


        #f1{
            position: absolute; 
            top: 45px; 
            right: 80px; 
            background-color: blue; 
            color: white; 
            border: none; 
            padding: 10px 20px;
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 14px;
            }

        /* Table styles */
        table 
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Table header styles */
        th, td 
        {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Table header background color */
        th 
        {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Alternating row colors */
        tr:nth-child(even) 
        {
            background-color: #f9f9f9;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .button-container button, .button-container input[type="button"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-container button:hover, .button-container input[type="button"]:hover {
            background-color: green;
        }
    </style>
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
    <?php
    if ($result->num_rows > 0) 
    {
        echo "<h2 style='text-align:center;'>Registered Users</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Language</th><th>Gender</th></tr>";
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["fullName"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["language"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "<p>No records found</p>";
    }
    $conn->close();
    ?>
    <div class="button-container">
        <button type="submit" onclick="addEntry()">Add Another Entry</button>
    </div>
    <script>
        function addEntry() 
        {
            window.location.href = 'WebForm.html?source=addEntry';
        }
    </script>
</body>
</html>

