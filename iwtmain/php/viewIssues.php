<?php
include("../config.php");
include("header.php");

// Handle deletion
if (isset($_GET['deleteid'])) {
    $idToDelete = $_GET['deleteid'];

    // Delete the record from the database
    $deleteSql = "DELETE FROM issues WHERE id='$idToDelete'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        echo '<script>alert("Issue deleted successfully.");
        window.location="viewIssues.php"</script>';
    } else {
        echo '<script>alert("Error deleting issue: ' . mysqli_error($conn) . '");</script>';
    }
}

// Retrieve and display issues
$sql = "SELECT * FROM issues";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-update, .btn-delete {
            padding: 5px 10px;
            margin-right: 5px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
        }

        .btn-update {
            background-color: #4caf50;
        }

        .btn-delete {
            background-color: #f44336;
            border:none;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container"style="margin:140px 100px">
        <h2>Issue List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Informer's Name</th>
                <th>Level</th>
                <th>Page URL</th>
                <th>Issue Description</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['informer']}</td>";
                echo "<td>{$row['level']}</td>";
                echo "<td><a href='{$row['url']}'>{$row['url']}</a></td>";
                echo "<td>{$row['issue']}</td>";
                echo "<td>";
                echo "<a href='updateIssues.php?id={$row['id']}'>Update</a>";
                echo "<button class='btn-delete' onclick='confirmDelete({$row['id']})'>Delete</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this issue?")) {
                window.location.href = 'viewIssues.php?deleteid=' + id;
            }
        }
    </script>
</body>

</html>

<?php
include("footer.php");
?>
