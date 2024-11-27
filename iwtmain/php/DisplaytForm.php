<?php
include "../config.php";
include 'header.php';

// Handle deletion
if (isset($_GET['deleteid'])) {
    $idNumberToDelete = $_GET['deleteid'];

    // Delete the record from the database
    $deleteSql = "DELETE FROM transfer WHERE idNumber='$idNumberToDelete'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        echo '<script>alert("Record deleted successfully.");
        window.location="DisplaytForm.php"</script>';
    } else {
        echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '");</script>';
    }
}

// Retrieve and display transfer forms
$sql = "SELECT * FROM transfer";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/inscss.css">
    <title>Transfer Form</title>
</head>

<body>
    <div class="container" style="margin-top:30px">
        <button class="btn btn-primary my-3"><a href="AddTransferForm.php" class="text-light">Add Transfer Form</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Current Faculty</th>
                    <th scope="col">Current Degree Program</th>
                    <th scope="col">New Faculty</th>
                    <th scope="col">New Degree Program</th>
                    <th scope="col">Reason For The Transfer</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['fullName'];
                        $idNumber = $row['idNumber'];
                        $email = $row['email'];
                        $phoneNumber = $row['phoneNumber'];
                        $currentFaculty = $row['currentFaculty'];
                        $currentDegreeProgram = $row['currentDegreeProgram'];
                        $newFaculty = $row['newFaculty'];
                        $newDegreeProgram = $row['newDegreeProgram'];
                        $reason = $row['reason'];

                        echo '<tr>
                        <td>' . $name . '</td>
                        <td>' . $idNumber . '</td>
                        <td>' . $email . '</td>
                        <td>' . $phoneNumber . '</td>
                        <td>' . $currentFaculty . '</td>
                        <td>' . $currentDegreeProgram . '</td>
                        <td>' . $newFaculty . '</td>
                        <td>' . $newDegreeProgram . '</td>
                        <td>' . $reason . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="updateForm.php?updateid=' . $idNumber . '" class="text-light">UPDATE</a></button>
                            <button class="btn btn-danger"><a href="DisplaytForm.php?deleteid=' . $idNumber . '" class="text-light">DELETE</a></button>
                        </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
