<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "laboratory_activity";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (name, year_level, course, grade)
            VALUES ('$name', '$year_level', '$course', '$grade')";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color:green;'>Record added successfully!</p>";
    } else {
        $message = "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Laboratory Activity 5</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #ffe6f0;
                text-align: center;
                padding: 20px;
            }
            h2 {
                color: #d63384;
            }
            form {
                background: #fff;
                padding: 20px;
                border-radius: 12px;
                width: 300px;
                margin: auto;
                box-shadow: 0px 4px 10px rgba(214, 51, 132, 0.2);
            }
            label {
                display: block;
                margin-top: 10px;
                color: #d63384;
                font-weight: bold;
            }
            input, select, button {
                width: 90%;
                padding: 8px;
                margin-top: 5px;
                border-radius: 6px;
                border: 1px solid #d63384;
            }
            button {
                background: #d63384;
                color: white;
                font-weight: bold;
                margin-top: 15px;
                cursor: pointer;
            }
            button:hover {
                background: #b82c70;
            }
            a {
                display: inline-block;
                margin-top: 15px;
                color: #d63384;
                font-weight: bold;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <h2>Student Record</h2>
        <?php if (!empty($message)) echo $message; ?>
        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Year Level:</label>
            <select name="year_level" required>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select>

            <label>Course:</label>
            <input type="text" name="course" required>

            <label>Grade:</label>
            <input type="text" name="grade" min="1" max="100" required>

            <button type="submit" name="submit">Add Student</button>
        </form>
        <a href="view_students.php">View Students</a>
    </body>
</html>