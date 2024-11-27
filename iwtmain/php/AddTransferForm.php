<!DOCTYPE html>
<?php

include('../config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['fullName'];
    $idNumber = $_POST['idNumber'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $currentFaculty = $_POST['currentFaculty'];
    $currentDegreeProgram = $_POST['currentDegreeProgram'];
    $newFaculty = $_POST['newFaculty'];
    $newDegreeProgram = $_POST['newDegreeProgram'];
    $reasonForTransfer = $_POST['reason'];

    $add_conn = $conn->prepare("INSERT INTO transfer (fullName, idNumber, email, phoneNumber, currentFaculty, currentDegreeProgram, newFaculty, newDegreeProgram, reason) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $add_conn->bind_param("sssssssss", $name, $idNumber, $email, $phoneNumber, $currentFaculty, $currentDegreeProgram, $newFaculty, $newDegreeProgram, $reasonForTransfer);

    if ($add_conn->execute()) {
        echo '<script>
                alert("Data added successfully");
                window.location.href = "./DisplaytForm";
            </script>';
    }else {
        
        echo '<script>
        alert("You can only transfer once");
    </script>';
}
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>IT HELP DESK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/Transfer_Form.css" />
</head>

<body>

    <div style="width:100%;display:inline-flex;margin-top:150px;margin-bottom:150px; justify-content: center;">

        <div class="container">
            <h1 class="form-title">Program Transfer Form</h1>
            <form action="" method="POST" onsubmit="return validateForm();">
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" />
                    </div>
                    <div class="user-input-box">
                        <label for="idNumber">ID Number</label>
                        <input type="text" id="idNumber" name="idNumber" placeholder="Enter ID Number" />
                    </div>
                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" />
                    </div>
                    <div class="user-input-box">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" />
                    </div>
                    <div class="user-input-box">
                        <label for="currentFaculty">Current Faculty</label>
                        <input type="text" id="currentFaculty" name="currentFaculty" placeholder="Current Faculty" />
                    </div>
                    <div class="user-input-box">
                        <label for="currentDegreeProgram">Current Degree Program</label>
                        <input type="text" id="currentDegreeProgram" name="currentDegreeProgram" placeholder="Enter Current Degree Program" />
                    </div>
                    <div class="user-input-box">
                        <label for="newFaculty">New Faculty</label>
                        <input type="text" id="newFaculty" name="newFaculty" placeholder="New Faculty" />
                    </div>
                    <div class="user-input-box">
                        <label for="newDegreeProgram">New Degree Program</label>
                        <input type="text" id="newDegreeProgram" name="newDegreeProgram" placeholder="Enter New Degree Program" />
                    </div>
                    <div class="text-area-container">
                        <label for="reason">Reason For The Transfer</label>
                        <textarea id="reason" rows="4" name="reason" cols="50" placeholder="Enter Reason For The Transfer"></textarea>
                    </div>
                </div>

                <div class="form-submit-btn">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var fullName = document.getElementById("fullName").value;
            var idNumber = document.getElementById("idNumber").value;
            var email = document.getElementById("email").value;
            var phoneNumber = document.getElementById("phoneNumber").value;
            var currentFaculty = document.getElementById("currentFaculty").value;
            var currentDegreeProgram = document.getElementById("currentDegreeProgram").value;
            var newFaculty = document.getElementById("newFaculty").value;
            var newDegreeProgram = document.getElementById("newDegreeProgram").value;
            var reasonForTransfer = document.getElementById("reason").value;

            // Validate phone number length
            if (phoneNumber.length !== 10) {
                alert("Phone number must have exactly 10 characters.");
                return false;
            }

            // Example: Validate email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.match(emailRegex)) {
                alert("Invalid email address.");
                return false;
            }

            // Additional validations for other fields can be added here

            return true;
        }
    </script>

    <?php
    include 'footer.php';
    ?>
</body>

</html>