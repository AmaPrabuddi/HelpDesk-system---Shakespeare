<?php
include("../config.php");
include ("header.php");

if (isset($_GET['idnumber'])) {
    $idnumber = $_GET['idnumber'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $name = $_POST['name'];
        $email = $_POST['email'];
        $idnumber = $_POST['idnumber'];
        $faculty = $_POST['faculty'];
        $mobile = $_POST['mobile'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Update the record in the database
        $sql = "UPDATE crud SET 
                name = '$name', 
                email = '$email', 
                faculty = '$faculty', 
                mobile = '$mobile', 
                subject = '$subject', 
                message = '$message' 
                WHERE idnumber = '$idnumber'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: displayt.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }

    // Retrieve data for the selected record
    $sql = "SELECT * FROM crud WHERE idnumber = '$idnumber'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>IT HELP DESK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/raiseTicket.css">
    <link rel="stylesheet" href="../styles/updatecss.css">

</head>

<body>

    <div style="width:100%;margin-top:150px;;
justify-content:center;">

        <div class="wrapper-1 wrapper-form">

            <div class="form">
                <form action="" method="POST">

                    <h2 style="text-align:center"> Update Raised Ticket </h2>
                    <div class="inputfield">
                        <label>Full Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label>Email Address</label>
                        <input type="text" name="email" value="<?php echo $row['email']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label>IT Number</label>
                        <input type="text" name="idnumber" value="<?php echo $row['idnumber']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label>Faculty</label>
                        <input type="text" name="faculty" value="<?php echo $row['faculty']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label>Contact Number</label>
                        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label>Subject</label>
                        <input type="text" name="subject" value="<?php echo $row['subject']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <label> Message</label>
                        <input type="text" name="message" value="<?php echo $row['message']; ?>" class="input">
                    </div>

                    <div class="inputfield">
                        <input type="submit" value="Update" class="btn">
                    </div>

                </form>
            </div>
        </div>

</body>

</html>

<?php

include ("footer.php");
?>