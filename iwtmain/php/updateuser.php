<?php
include './header.php';
include '../config.php';



if (TRUE) {
    $IDNumber = $_GET['IDnumber'];

    $sql = "SELECT * FROM user WHERE idnumber='$IDNumber' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $IDNumber = $row['idnumber'];
        $Fullname = $row['fullname'];
        $position = $row['position'];
        $Email = $row['email'];
    } else {
        header("Location: ");
        exit();
    }
} else {
    // Handle the case when ID parameter is not set in the URL
    header("Location: dissignup.php");
    exit();
}

// Check if the form is submitted for update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Update'])) {
    // Validate and sanitize form data
    $UpdatedFullname = mysqli_real_escape_string($conn, $_POST['Fullname']);
    $UpdatedPosition = mysqli_real_escape_string($conn, $_POST['position']);
    $UpdatedEmail = mysqli_real_escape_string($conn, $_POST['Email']);

    // Update user data in the database
    $updateSql = "UPDATE user SET fullname='$UpdatedFullname', position='$UpdatedPosition', email='$UpdatedEmail' 
                  WHERE idnumber='$IDNumber' AND email='$email'";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: Displaysignup.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Signup.css">
    <script>
        function validateForm() {
            var IDNumber = document.getElementById("IDNumber").value;
            var Fullname = document.getElementById("Fullname").value;

            if (IDNumber.length < 4 || Fullname.length < 4) {
                alert("IDNumber and Fullname must be at least 4 characters long.");
                return false;
            }
        }
    </script>
    <title>Update User</title>
</head>

<body>
    <div style="margin-top: 50px; margin-bottom: 50px;">
        <section class="container" style="display: flex; margin-bottom: 30px">

            <div class="image-section">
                <div class="image-wrapper">
                    <img src="../images/uni.jpg" alt="image">
                </div>

                <div class="content-container">
                    <h1 class="section-heading" style="color:black">Knowledge for a <span>Better world</span></h1>
                    <p class="section-paragraph">Education is the transmission of knowledge, skills, and character traits. There are many debates about its precise definition, for example, about which aims it tries to achieve.</p>
                </div>
            </div>
            <div class="form-section">
                <div class="form-wrapper">
                    <h1>Update User</h1>

                    <form method="POST" action="" onsubmit="return validateForm()">
                        <div class="input-container">
                            <div class="form-group">
                                <label for="IDNumber">ID Number</label>
                                <input type="text" name="IDNumber" id="IDNumber" value="<?php echo $IDNumber; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Fullname">Full Name</label>
                                <input type="text" name="Fullname" id="Fullname" value="<?php echo $Fullname; ?>" required>
                            </div>
                            <div class="position-details-box">
                                <div class="position-category">
                                    <label>Position:</label>
                                    <input type="radio" name="position" value="student" <?php echo ($position == 'student') ? 'checked' : ''; ?>>
                                    <label for="Student">Student</label>
                                    <input type="radio" name="position" value="instructor" <?php echo ($position == 'instructor') ? 'checked' : ''; ?>>
                                    <label for="Instructor">Instructor</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="Email" id="Email" value="<?php echo $Email; ?>" required>
                            </div>
                        </div>

                        <input type="submit" name="Update" class="signup-btn" value="Update User">
                        <a href="Displaysignup.php">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <?php include './footer.php'; ?>
</body>

</html>