<?php
include './header.php';
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['Username'];
  $password = $_POST['password'];
  $position = $_POST['position'];


  if($position=="technician"){
  // Use prepared statements to prevent SQL injection
  $sql = "SELECT * FROM technician WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    
    header("Location: ./technicianHome.php");
  } else {
    $loginError = "Invalid username or password";
  }
  }else{
  // Use prepared statements to prevent SQL injection
  $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    header("Location: ./Adminaccount.html");
  } else {
    $loginError = "Invalid username or password";
  }
  }

  $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/Login.css">
  <title>Login</title>
</head>

<body>
  <a class="login-btn" href="staffLogin.php" style="width: max-content;padding:5px 10px;margin-top:20px;float:right;margin-right:20px">Student | Instructor</a>
  <section class="container" style="margin-top:30px;margin-bottom:30px;">

    <div class="image-section">
      <div class="image-wrapper">
        <img src="../images/uni.jpg" alt="image">
      </div>

      <div class="content-container">
        <h1 class="section-heading">Knowledge for a <span>Better world</span></h1>
        <p class="section-paragraph">Education is the transmission of knowledge, skills, and character traits. There are many debates about its precise definition, for example, about which aims it tries to achieve.</p>
      </div>
    </div>

    <div class="form-section">
      <div class="form-wrapper">
        <h1>Shakespeare University</h1>
        <h2>Welcome Back!</h2>

        <?php if (isset($loginError)) : ?>
          <p style="color: red;"><?php echo $loginError; ?></p>
        <?php endif; ?>

        <form method="post" action="">
          <div class="input-container">
            <div class="form-group">
              <label for="Username">username</label>
              <input type="text" name="Username" id="Username" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password">
            </div>
          </div>
          <div class="possition-details-box">

            <div class="possition-category">
              <input type="radio" name="position" value="technician" id="Student"checked>
              <label for="student">Technician</label>
              <input type="radio" name="position" value="admin" id="Instructor">
              <label for="Instructor">Admin</label>

            </div>
          </div>

          <button class="login-btn" type="submit">Log In</button>
        </form>
      </div>
    </div>
  </section>
</body>

</html>

<?php
include("./footer.php");
?>