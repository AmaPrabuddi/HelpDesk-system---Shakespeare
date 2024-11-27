<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../styles/Coursedetails.css">

    <link rel="stylesheet" href="../styles/Transfer_Form.css" />
</head>

<body>


    <div style="width:100%;display:inline-flex;margin-top:150px;margin-bottom:150px; justify-content: center;">
        <div class="radio-buttons">
            <form>
                <label>
                    <input type="radio" name="option" value="Course Details" onclick="courseDetails()" checked> Course Details
                </label><br>

                <label>
                    <input type="radio" name="option" value="Program Transfer Form"onclick="transferForm()"> Program Transfer Form
                </label><br>

                <label>
                    <input type="radio" name="option" value="Rules and Regulations"onclick="rulesRegulations()"> Rules and Regulations
                </label><br>
            </form>
        </div>

        <div class="vertical-line"></div>
        <div id="courseDetails">
            <div class="content">
                <h1 style="color:Green;">Request for Module Course Outline</h1>
                <p>A "Request for Module Course Outline" is a formal document or communication typically used in
                    educational or training settings. It serves as a formal request to obtain the detailed course outline or syllabus
                    for a specific module or course within an academic institution </p>
                <div class="email-box">
                    <left>
                        <a href="mailto:studentservice@gmail.com">studentservice@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './footer.php';
    ?>
    </div>
    <script>
        function courseDetails(){
            window.location="Coursedetails.php";
        }
        function transferForm(){
            window.location="TransferForm.php";

        }
        function rulesRegulations(){
            window.location="Rules&Regulations.php";
        }
    </script>
</body>

</html>