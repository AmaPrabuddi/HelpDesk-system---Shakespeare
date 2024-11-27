<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

if(isset($_POST['update_profile'])){

   $update_uname = mysqli_real_escape_string($conn, $_POST['update_uname']);
   $update_fname = mysqli_real_escape_string($conn, $_POST['update_fname']);
   $update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_number = mysqli_real_escape_string($conn, $_POST['update_number']);
   $update_des = mysqli_real_escape_string($conn, $_POST['update_des']);

   mysqli_query($conn, "UPDATE `user_form` SET uname = '$update_uname', fname = '$update_fname', lname = '$update_lname', email = '$update_email', number = '$update_number', des = '$update_des'  WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

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
      <link rel="stylesheet" href="../styles/style.css">

   </head>
   <body>
      
      <!-- Header -->
      <?php
         $title = 'About US'; include("../header.php");
      ?>
      
      <div class="container">

         <div class="profile">

            <a href="studentProfile.php" class="btn" >update profile</a>
            <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>

            <?php
               $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
               if($fetch['image'] == ''){
                  echo '<img src="../images/default-avatar.png">';
               }else{
                  echo '<img src="../uploaded_img/'.$fetch['image'].'">';
               }
            ?>

            <h3><?php echo $fetch['uname']; ?></h3>
            <h3><?php echo $fetch['des']; ?></h3>
            
         </div>

         <div class="update-profile">

            <?php
               $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
               
               <div class="flex">
                  <div class="inputBox">
                     <span>Username :</span>
                     <input type="text" name="update_uname" value="<?php echo $fetch['uname']; ?>" class="box" readonly>
                     <span>First name :</span>
                     <input type="text" name="update_fname" value="<?php echo $fetch['fname']; ?>" class="box">
                     <span>Last name :</span>
                     <input type="text" name="update_lname" value="<?php echo $fetch['lname']; ?>" class="box">
                     <span>your email :</span>
                     <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                     <span>Mobile :</span>
                     <input type="text" name="update_number" value="<?php echo $fetch['number']; ?>" class="box">
                     <span>Description :</span>
                     <input type="text" name="update_des" value="<?php echo $fetch['des']; ?>" class="box">
                     <span>update your pic :</span>
                     <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                  </div>
                  <div class="inputBox">
                     <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                     <span>old password :</span>
                     <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                     <span>new password :</span>
                     <input type="password" name="new_pass" placeholder="enter new password" class="box">
                     <span>confirm password :</span>
                     <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                  </div>
               </div>
               <input type="submit" value="update profile" name="update_profile" class="btn">
               <a href="home.php" class="delete-btn">go back</a>
               
            </form>

         </div>

      </div>

   </body>
</html>