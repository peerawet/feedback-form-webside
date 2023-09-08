<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Feedback Data</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Rating</th>
            <th>Type</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "feedback_db");
        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_error());
        }

        $sql = "SELECT id, name, email, massage, rating, type FROM feedback"; // 
        $result = $conn->query($sql); // 
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["massage"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["type"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>"; // Added missing semicolon and corrected the colspan attribute
        }

        $conn->close();

        ?>
    </table>

    <a href="index.html">BACK</a>
    
</body>
</html>
