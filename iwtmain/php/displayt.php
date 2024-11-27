<?php
include ("../config.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/inscss.css">
    <title>crud operation</title>
</head>
<body>
    <div class="container" style="margin:200px 200px">
    
    <h2 style="text-align:center"> Raised Tickets by Students </h2>
        <button class="btn btn-primary my-5">
            <a href="instructorRaiseTicket.php" class="text-light"> Add Tickets </a>
        </button>    
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM crud";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['idnumber']}</td>";
                    echo "<td>{$row['faculty']}</td>";
                    echo "<td>{$row['mobile']}</td>";
                    echo "<td>{$row['subject']}</td>";
                    echo "<td>{$row['message']}</td>";
                    echo "<td>
                    <a href='../php/updateTicket.php?idnumber={$row['idnumber']}' class='btn btn-primary'>Update</a>
                    <a href='../php/deleteTicket.php?idnumber={$row['idnumber']}' class='btn btn-danger'>Delete</a>
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
</body>
</html>
<?php
include("footer.php");
?>