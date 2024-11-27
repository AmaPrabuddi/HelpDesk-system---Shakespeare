<?php
include("../config.php");
include("header.php");

// Database connection code here (use appropriate credentials)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $issue = mysqli_real_escape_string($conn, $_POST['issue']);

    // Insert data into the database
    $sql = "INSERT INTO issues (informer, level, url, issue) VALUES ('$name', '$level', '$url', '$issue')";
    if (mysqli_query($conn, $sql)) {
        
        echo "<script>alert('Ticket submit successfully');
        window.location='viewIssues.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Issue Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .form-group textarea {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            resize: vertical;
        }

        .form-group select {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            background-color: white;
            color: #333;
        }

        .form-group select:hover {
            border-color: #4caf50;
        }

        .form-group select:focus {
            outline-color: #4caf50;
        }

        .form-group button {
            background-color: #2348ff;
            color: white;
            border: none;
            width: 100%;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var url = document.getElementById("url").value;
            var issue = document.getElementById("issue").value;

            if (name.trim() == "") {
                alert("Please enter Informer's Name");
                return false;
            }

            if (url.trim() == "") {
                alert("Please enter Page URL");
                return false;
            }

            if (issue.trim().length < 15) {
                alert("Issue description must be at least 15 characters long");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Report Issue</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Informer's Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Level:</label>
                <select name="level">
                    <option value="Not Critical">Not Critical</option>
                    <option value="Critical">Critical</option>
                </select>
            </div>
            <div class="form-group">
                <label for="url">Page URL:</label>
                <input type="text" id="url" name="url" required>
            </div>
            <div class="form-group">
                <label for="issue">Describe the Issue:</label>
                <textarea id="issue" name="issue" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Submit Issue</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include("footer.php");
?>