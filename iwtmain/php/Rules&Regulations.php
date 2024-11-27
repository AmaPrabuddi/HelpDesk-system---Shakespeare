<?php
include './header.php'
?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/Rules&Regulations.css">
  <title>Centered Text Box with List</title>
</head>

<body>
  <div style="width:100%;display:inline-flex;margin-top:150px;margin-bottom:150px; justify-content: center;">
    <div class="radio-container" style="margin-right:20px;justify-content:start">
    <form>
                <label>
                    <input type="radio" name="option" value="Course Details" onclick="courseDetails()" > Course Details
                </label><br>

                <label>
                    <input type="radio" name="option" value="Program Transfer Form"onclick="transferForm()"> Program Transfer Form
                </label><br>

                <label>
                    <input type="radio" name="option" value="Rules and Regulations"onclick="rulesRegulations()"checked> Rules and Regulations
                </label><br>
            </form>
    </div>

    <div class="container">
      <div class="text-box" style="border: 10px solid #379b1e;">
        <h1 class="centered-heading">RULES AND REGULATIONS</h1>
        <ul class="point-list">
          <li>The university help desk is responsible for providing technical support for university-related IT issues, including password resets, email problems, and software troubleshooting.<br><br></li>
          <li>Support is available to currently enrolled students, faculty, and staff of the university.<br><br></li>
          <li>Initial responses will be provided within 24 hours for non-urgent issues and within 4 hours for urgent issues.<br><br></li>
          <li>The help desk operates from 8:00 AM to 5:00 PM, Monday to Friday, excluding university holidays.<br><br></li>
          <li>Users are responsible for providing accurate information, adhering to university IT policies, and acknowledging that the help desk cannot perform illegal or unethical tasks.<br><br></li>
          <li>All support requests, resolutions, and communications with users must be accurately documented in the help desk system.<br><br></li>
          <li>If a help desk agent cannot resolve an issue, it will be escalated to a higher-tier technician or IT manager for further assistance.<br><br></li>
          <li>The help desk must comply with all relevant laws and regulations, including accessibility requirements and non-discrimination policies.<br><br></li>
          <li>These rules and regulations will be reviewed annually and updated as necessary to reflect changing needs and technologies.<br><br></li>
        </ul>
      </div>
    </div>
  </div>
  <div style="width:100%;margin-top:150px;margin-bottom:150px;
  justify-content: center;">

  </div>
  <?php
  include 'footer.php';
  ?>
  <script>
    function courseDetails() {
      window.location = "Coursedetails.php";
    }

    function transferForm() {
      window.location = "TransferForm.php";

    }

    function rulesRegulations() {
      window.location = "Rules&Regulations.php";
    }
  </script>
</body>

</html>