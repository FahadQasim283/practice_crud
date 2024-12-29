<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM employeeInfo WHERE id = '$id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (!$user) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $conn->real_escape_string($_POST['firstName']);
    $lname = $conn->real_escape_string($_POST['lastName']);
    $age = $conn->real_escape_string($_POST['age']);
    $salary = $conn->real_escape_string($_POST['salary']);
    $sql = "UPDATE employeeInfo SET firstName = '$fname', lastName = '$lname',
    age = '$age', salary = '$salary' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <div>
                <label>First Name</label>
                <input type="text" name="firstName" value="<?php echo $user['firstName']; ?>" required>
            </div>
            <div>
                <label>Last Name</label>
                <input type="text" name="lastName" value="<?php echo $user['lastName']; ?>" required>
            </div>
            <div>
                <label>Age</label>
                <input type="text" name="age" value="<?php echo $user['age']; ?>" required>
            </div>
            <div>
                <label>Salary</label>
                <input type="text" name="salary" value="<?php echo $user['salary']; ?>" required>
            </div>

            <div>
                <button type="submit" class="btn btn-edit">Update User</button>
                <a href="index.php" class="btn">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php $conn->close(); ?>