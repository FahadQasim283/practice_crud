<?php
require_once 'db.php';
if (isset($_GET['age'])) {
    $age = $conn->real_escape_string($_GET['age']);
    $sql = "DELETE FROM employeeInfo WHERE age >= '$age'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
header("Location: index.php");
exit();
?>