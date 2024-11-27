<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylsheet" href="../styles/technician.css" />
    <style>
        .btn {
            margin-top: 30px auto;
            background-color: #2348ff;
            padding: 15px 30px;
            border: none;
            color: white;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;margin-top:30px">Technician</h2>
    <div class="wrapper" style="display:flex">
        <div class="main" style="margin: 40px 200px;">
            <img src="../images/techbg.png" width="600px" />
        </div>
        <div class="aside" style="margin: 140px auto;">
            <h3> TroubleShoots</h3>
            <div style="width:100%;margin:15px auto;">
                <button class="btn">Tickets</button>
            </div>
            <div style="width:100%;margin:15px auto">
                <button class="btn">Message</button>
            </div>
            <div style="width:100%;margin:15px auto">
                <button class="btn">Database Management</button>
            </div>
            <div style="width:100%;margin:15px auto">
                <a href="issues.php"><button class="btn" style="background-color: #225521;">Issues</button></a>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include "footer.php";
?>