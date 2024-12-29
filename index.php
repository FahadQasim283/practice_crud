<!-- db ko include/import krengy -->
<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <h1>
                This is php
            </h1>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Age</th>
                <th>Salary</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM employeeInfo";
                $result = mysqli_query($dbConnection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $name = $row["firstName"];
                    $lastName = $row["lastName"];
                    $salary = $row["salary"];
                    $age = $row["age"];
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$name</td>";
                    echo "<td>$lastName</td>";
                    echo "<td>$age</td>";
                    echo "<td>$salary</td>";
                    echo "<td><a href='edit.php?id=$id'>Edit</a> | <a href='delete.php?id=$id'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>