<?php
require_once 'db.php';
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM employeeInfo WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
//ok? same kaam edit mn hoga id pass krengy id ki base pr update ki query chlae gy to specific record update hoga
//srf smjh ly kl isi code mn change krna hoga understand kr bs yad ni rkhna
$conn->close();
header("Location: index.php");
exit();
?>