<?php
    include "../config.php";

    $mID = $_GET['updateid'];
    $sql = "SELECT * FROM `modules` WHERE id = '".$mID."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $ModuleID = $row['moduleID'];
    $ModuleName = $row['ModuleName'];
    $CreditPoints = $row['CreditPoints'];
   if(isset($_POST['submit'])){
      $moduleID = $_POST['mID'];
      $mName = $_POST['mName'];
      $McreditPoint =  $_POST['mPoints'];

      $sql = "UPDATE `modules` SET `moduleID`=$moduleID,`ModuleName`='$mName',`CreditPoints`='$McreditPoint' WHERE id='".$mID."'";
      $result = mysqli_query($conn, $sql);
      if($result){
        //  echo "Update Successflly";
         header("location:instructor.php");
      }
      else{
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
   <title>Update Module Page</title>
</head>
<body>
   <div class="container my-5">
      <form method="post">
         <div class="mb-3">
            <label>Module ID</label>
            <input type="text" class="form-control" name="mID" placeholder="IT22222" autocomplete="off" value="<?php echo $mID?>">
         </div>
         <div class="mb-3">
            <label>Module Name</label>
            <input type="text" class="form-control" name="mName" placeholder="IWT" autocomplete="off" value="<?php echo $ModuleName?>">
         </div>
         <div class="mb-3">
            <label>Module Credit Point</label>
            <input type="text" class="form-control" name="mPoints" placeholder="23" autocomplete="off" value="<?php echo $CreditPoints?>">
         </div>
         <button type="submit" class="btn btn-primary" name="submit">Update Module</button>
      </form>
   </div>
</body>
</html>