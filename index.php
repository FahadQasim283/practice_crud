<?php
require_once 'db.php';

$sql = "SELECT * FROM employeeInfo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>User Management</h2>
        <a href="adduser.php" class="btn btn-add">Add New User</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Firt Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No Employee found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
<?php $conn->close(); ?>