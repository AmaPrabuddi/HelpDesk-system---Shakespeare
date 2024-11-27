<?php
include "../config.php";
include "header.php";

if (isset($_POST['submit'])) {
   $mID = $_POST['mID'];
   $mName = $_POST['mName'];
   $McreditPoint =  $_POST['mPoints'];

   // Use single quotes around values
   $sql = "INSERT INTO `modules` (ModuleID, ModuleName, CreditPoints) VALUES ('$mID', '$mName', '$McreditPoint')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      // echo "Insert Successfully";
      header("location:instructor.php");
   } else {
      die(mysqli_error($con));
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../styles/addModule.css">
   <title>Add Module Page</title>
</head>

<body>
   <div class="container "style="align-items:center" >
      <div style="margin:50px 750px; background-color:white;width:min-content;padding:30px;border-radius:20px">
         <form onsubmit="return validateForm()" method="post">
            <div class="mb-3">
               <label>Module ID</label>
               <input type="text" class="form-control" name="mID" id="moduleCode" placeholder="IT22222" autocomplete="off">
            </div>
            <div class="mb-3">
               <label>Module Name</label>
               <input type="text" class="form-control" name="mName" id="moduleName" placeholder="IWT" autocomplete="off">
            </div>
            <div class="mb-3">
               <label>Module Credit Point</label>
               <input type="text" class="form-control" name="mPoints" id="creditPoints" placeholder="23" autocomplete="">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Module</button>
         </form>

      </div>
   </div>
   <script>
        function validateForm() {
            var moduleCode = document.getElementById("moduleCode").value;
            var moduleName = document.getElementById("moduleName").value;
            var creditPoints = document.getElementById("creditPoints").value;

            // Validate moduleCode (assuming it should not be empty)
            if (moduleCode.trim() === "") {
                alert("Module Code cannot be empty.");
                return false;
            }

            // Validate moduleName (assuming it should not be empty)
            if (moduleName.trim() === "") {
                alert("Module Name cannot be empty.");
                return false;
            }

            // Validate creditPoints (should be integer and max 2 characters)
            if (!/^\d{1,2}$/.test(creditPoints)) {
                alert("Credit Points must be an integer with maximum 2 characters.");
                return false;
            }

            // Form is valid, allow submission
            return true;
        }
    </script>
</body>

</html>
<?php
include "footer.php";
?>