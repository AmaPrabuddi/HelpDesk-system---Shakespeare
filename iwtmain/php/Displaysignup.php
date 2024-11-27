<?php
include("../config.php");
include("./header.php");

// Handle delete operation
if (isset($_GET['IDnumber'])) {
    $idNumber = $_GET['IDnumber'];
    $deleteSql = "DELETE FROM user WHERE idnumber='$idNumber'";
    if ($conn->query($deleteSql) === TRUE) {
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page after successful delete
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\styles\displaysignup.css">
    <title>crud operation</title>
</head>

<body>
    <div class="container" style="margin:100px auto;">
        <div style="text-align:center;">
            <button style="margin-bottom:30px;background-color:#2348ff;">
                <a href="Dissignup.php" class="text-light"style="color:white"> Add Members</a>
            </button>

            <table class="table" style="width: 1200px;margin:0 auto;">
                <thead>
                    <tr>
                        <th scope="col">ID Number</th>
                        <th scope="col">Full name</th>
                        <th scope="col">position</th>
                        <th scope="col"> Email</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['idnumber']}</td>";
                            echo "<td>{$row['fullname']}</td>";
                            echo "<td>{$row['position']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>
                                    <a href='".$_SERVER['PHP_SELF']."?IDnumber={$row['idnumber']}' class='btn btn-danger'>Delete</a>
                                    <a href='updateuser.php?IDnumber={$row['idnumber']}' class='btn btn-primary'>Update</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</body>

</html>
