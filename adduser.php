<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $conn->real_escape_string($_POST['firstName']);
    $lname = $conn->real_escape_string($_POST['lastName']);
    $age = $conn->real_escape_string($_POST['age']);
    $salary = $conn->real_escape_string($_POST['salary']);
    
    $sql = "INSERT INTO employeeInfo (firstName, lastName, age, salary) VALUES ('$fname', '$lname', '$age', '$salary')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Add New User</h2>
        <form method="POST">
            <div>
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <button type="submit" class="btn btn-add">Add User</button>
                <a href="index.php" class="btn">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php $conn->close(); ?>