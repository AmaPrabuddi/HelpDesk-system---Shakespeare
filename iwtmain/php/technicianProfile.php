<?php

include 'config.php';
session_start();
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>home</title>

      <!-- custom css file link  -->
      <link rel="stylesheet" href="../styles/techprofile.css">

   </head>

   <body>
      <!-- Header -->
      <?php
         $title = 'About US'; include("header.php");
      ?>
      
      <div class="container">
         <div class="profile">
            <u><h1>Technician</h1></u>
            <?php
               $select = mysqli_query($conn, "SELECT * FROM `technician` WHERE id = '$user_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
               if($fetch['image'] == ''){
                  echo '<img src="images/default-avatar.png">';
               }else{
                  echo '<img src="uploaded_img/'.$fetch['image'].'">';
               }
            ?>
            <h3><?php echo $fetch['uname']; ?></h3>
            <a href="technicianUpdateProfile.php" class="btn">update profile</a>
            <a href="login.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
         </div>
         <div class="container3">
         <div class="profile3">
            <u><h1>TroubleShoots</h1></u>
            <div class="tab">
               <button class="tablinks" onclick="openTab(event, 'Buyers')" id="defaultOpen">Ticket</button>
               <button class="tablinks" onclick="openTab(event, 'Sellers')">Message</button>
               <button class="tablinks" onclick="openTab(event, 'Admins')">Database Manage</button>
            </div>
         </div>
      </div>
         <div class="container2">
         <div class="profile2">
            <div class="tab">
               <button class="tablinks" onclick="openTab(event, 'Buyers')" id="defaultOpen">Ticket</button>
               <button class="tablinks" onclick="openTab(event, 'Sellers')">Message</button>
               <button class="tablinks" onclick="openTab(event, 'Admins')">Database</button>
               <button class="tablinks" onclick="openTab(event, 'Lands')">Setting</button>
            </div>
         </div>
      </div>
      </div>
   </body>
   <?php include("../footer.php"); ?>
</html>