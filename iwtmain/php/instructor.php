<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="../styles/instructor.css">
</head>

<body>
    <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="profile-section">
            <h2>Instructor</h2>
            <button>Log out</button>
            <a href="displayt.php"><button style="background-color: #2348ff;color:white">Tickets Raised by Students</button>
            <hr>
            <div class="profile-image">
                <img class="image" src="../images/profilepic.jpeg" alt="">
            </div>
            <button>Edit Profile Photo</button>
            <br>
            <p>add the sample paragraph.</p>
        </div>


        <div class="actions-section">
            <h2>Instructor</h2>
            <p>Manage student problems</p>
            <div class="actions">
                <button><a href="./modulemannegement.php">Add Module</a></button>
                <?php
                include "displayModules.php";
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include("footer.php");
?>