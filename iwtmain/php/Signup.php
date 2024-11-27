<?php
include 'header.php'
?>
<?php
include('../config.php');
if (isset($_COOKIE['sIdNumber'])) {
  
  header('Location: studentprofile.php');
  exit(); 
}
if(isset($_POST['Signup'])){
    $IDNumber = $_POST['IDNumber'];
    $Fullname = $_POST['Fullname'];
    $position= $_POST['position'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ConfirmPassword= $_POST['ConfirmPassword'];
    
    if($Password!=$ConfirmPassword){
      ?>
      <script>alert("Confirmed Password is invalid!")</script>
      <?php
    }

    $sql = "INSERT INTO user (idnumber,fullname,position,email,password) 
            VALUES ('$IDNumber', '$Fullname', '$position' , '$Email' , '$Password')";

    $result = mysqli_query($conn, $sql);

    if($result){
      ?>
      <script>alert("User registered successfully");
window.location="Login.php";    
    </script>
      <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../styles/Signup.css">
    <title>signup</title>
  </head>
  <body>
  <div style="margin-top:50px;margin-bottom:50px">
    <section class="container" style="display:inline-flex">

      <div class="image-section">
        <div class="image-wrapper">
          <img src="../images/uni.jpg" alt="image">
        </div>

        <div class="content-container">
          <h1 class="section-heading" style="color:black">Knowledge for a <span>Better world</span></h1>
          <p class="section-paragraph">Education is the transmission of knowledge, skills, and character traits. There are many debates about its precise definition, for example, about which aims it tries to achieve.</p>
        </div>
      </div>

      <div class="form-section">
        <div class="form-wrapper">
        
          <h1>Shakespeare University</h1>
          <h2>Welcome! </h2>
          

          <form method="POST" action="">

          <div class="input-container">
            <div class="form-group">
              <label for="IDNumber">ID Number</label>
              <input type="IDNumber"name="IDNumber" id="IDNumber" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="Fullname">Full name</label>
                <input type="Fullname"name="Fullname" id="Fullname" autocomplete="off">
              </div>
              <div class="possition-details-box">
                
                <div class="possition-category">
                  <input type="radio" name="position" value="student"id="Student"checked>
                  <label for="student">student</label>
                  <input type="radio" name="position" value="instructor" id="Instructor">
                  <label for="Instructor">Instructor</label>
                  
                </div>
              </div>
                  
             <div class="form-group">
                <label for="Email">Email</label>
                <input type="Email"name="Email" id="Email" autocomplete="off">
              </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="Password" name="Password"id="Password">
            </div>
            <div class="form-group">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="Password"name="ConfirmPassword" id="ConfirmPassword" autocomplete="off">
              </div>
          </div>
    
          <input type="submit" name="Signup" class="signup-btn" value="Signup">
</form>
</form>
</button>
          <div class="Allready have an account-divider">Allready have an account?
            <a href="Login.php" class="login-btn" style="color:#1fec41">login</a></div>

            
          
        </div>
      </div>
    </section>
    <?PHP
include './footer.php';
?>
  </body>
</html>