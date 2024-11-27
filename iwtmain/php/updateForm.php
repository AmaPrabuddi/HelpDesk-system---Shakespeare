<?php
include "../config.php";

$idnumber = $_GET['updateid'];

// Retrieve existing data for the specified ID
$sql = "SELECT * FROM `transfer` WHERE `idNumber` = '$idnumber'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
   // Retrieve form data
   $name = $_POST['name'];
   $email = $_POST['email'];
   $idnumber = $_POST['idnumber'];
   $phoneNumber = $_POST['phoneNumber'];
   $currentFaculty = $_POST['currentFaculty'];
   $currentDegreeProgram = $_POST['currentDegreeProgram'];
   $newFaculty = $_POST['newFaculty'];
   $newDegreeProgram = $_POST['newDegreeProgram'];
   $reason = $_POST['reason'];

   // Update data in the database
   $updateSql = "UPDATE `transfer` SET `fullName`=?, `email`=?,`phoneNumber`=?, 
                 `currentFaculty`=?, `currentDegreeProgram`=?, `newFaculty`=?, 
                 `newDegreeProgram`=?, `reason`=? WHERE `idNumber`=?";

   // Prepare the update statement
   $updateStmt = $conn->prepare($updateSql);

   // Bind parameters
   $updateStmt->bind_param(
      "sssssssss",
      $name,
      $email,
      $phoneNumber,
      $currentFaculty,
      $currentDegreeProgram,
      $newFaculty,
      $newDegreeProgram,
      $reason,
      $idnumber
   );

   // Execute the update statement
   if ($updateStmt->execute()) {
      header("Location: DisplaytForm.php"); // Redirect to the desired page after successful update
      exit();
   } else {
      echo "Error updating record: " . $updateStmt->error;
   }

   // Close the prepared statement
   $updateStmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../styles/Transfer_Form.css">
   <title>Update Transfer form Page</title>
</head>

<body>
   <div style="width:100%;display:inline-flex;margin-top:150px;margin-bottom:150px; justify-content: center;">

      <div class="container">
         <h1 class="form-title">Program Transfer Form</h1>
         <form method="post">
            <div class="main-user-info">
               <div class="mb-3 user-input-box">
                  <label>Name: </label>
                  <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $row['fullName']; ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>Email: </label>
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo htmlspecialchars($row['email']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>ID Number: </label>
                  <input type="text" class="form-control" name="idnumber" autocomplete="off" value="<?php echo htmlspecialchars($row['idNumber']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>Phone Number: </label>
                  <input type="text" class="form-control" name="phoneNumber" autocomplete="off" value="<?php echo htmlspecialchars($row['phoneNumber']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>Current Faculty: </label>
                  <input type="text" class="form-control" name="currentFaculty" autocomplete="off" value="<?php echo htmlspecialchars($row['currentFaculty']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>Current Degree Program</label>
                  <input type="text" class="form-control" name="currentDegreeProgram" autocomplete="off" value="<?php echo htmlspecialchars($row['currentDegreeProgram']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>New Faculty</label>
                  <input type="text" class="form-control" name="newFaculty" autocomplete="off" value="<?php echo htmlspecialchars($row['newFaculty']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>New Degree Program</label>
                  <input type="text" class="form-control" name="newDegreeProgram" autocomplete="off" value="<?php echo htmlspecialchars($row['newDegreeProgram']); ?>">
               </div>
               <div class="mb-3 user-input-box">
                  <label>Reason: </label>
                  <input type="text" class="form-control" name="reason" autocomplete="off" value="<?php echo htmlspecialchars($row['reason']); ?>">
               </div>
               <div class="form-submit-btn">
               <input type="submit" class="btn btn-primary" name="submit"/>
                </div>
            </div>
         </form>
      </div>
</body>

</html>