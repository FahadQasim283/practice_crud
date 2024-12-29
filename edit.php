<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (!$user) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $sql = "UPDATE employeeInfo SET name = '$name', email = '$email' WHERE id = '$id'";
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
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
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