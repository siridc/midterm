<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "laboratory_activity";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?> 

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe6f0;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: hotpink;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(255, 105, 180, 0.2); /* hotpink */
        }
        th, td {
            border: 1px solid pink;
            padding: 10px;
            text-align: center;
        }
        th {
            background: mediumvioletred;
            color: white;
        }
        tr:nth-child(even) {
            background: lavenderblush;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: mediumvioletred;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Students List</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year Level</th>
                <th>Course</th>
                <th>Grade</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['year_level'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['grade'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }
    $conn->close();
    ?>
    <a href="insert_student.php">Insert Another Student</a>
</body>
</html>