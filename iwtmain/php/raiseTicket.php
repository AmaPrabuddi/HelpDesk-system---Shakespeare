<?php
include 'header.php';
?>
<?php
include('../config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $idnumber = $_POST['idnumber'];
    $faculty = $_POST['faculty'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO crud (name, email, idnumber, faculty, mobile, subject, message) 
            VALUES ('$name', '$email', '$idnumber' , '$faculty' , '$mobile' , '$subject' , '$message')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Ticket submit successfully');
        window.location='../index.php'</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../styles/raise.css">
   <title>Raise Ticket</title>
</head>

<body>	

<div class="container my-5"style="margin:50px 500px;background-color:white;padding:40px;border-radius:20px">
<form method="post">
<h2 style="text-align:center">Raise a Ticket</h2>
<div class="input-group">
<label>Name:</label>
<input type="text" class="form-control"  placeholder="Enter your name" name="name" autocomplete="off">
</div>

<div class="input-group">
<label>Email:</label>    
<input type="email" class="form-control"  placeholder="Enter your email" name="email" autocomplete="off">
</div>

<div class="input-group">
<label>ID Number:</label>
<input type="text" class="form-control"  placeholder="Enter your id number" name="idnumber" autocomplete="off">
 </div>

 <div class="input-group">
 <label>Faculty</label>
 <input type="text" class="form-control"  placeholder="Enter your faculty" name="faculty" autocomplete="off">
 </div>

 <div class="input-group">
 <label>Contact Number:</label>
<input type="text" class="form-control"  placeholder="Enter your contact Number" name="mobile" autocomplete="off">
 </div>

 <div class="input-group">
 <label>Subject:</label>
<input type="text" class="form-control"  placeholder="Enter your Subject" name="subject" autocomplete="off">
 </div>

 <div class="input-group">
 <label>Message:</label>
 <textarea type="text" class="form-control text-area"  placeholder="Enter your Message" name="message" autocomplete="off"></textarea>
 </div>
 
<div class="input-group row">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>

</div>
<?php
    include 'footer.php';
    ?>
</body>
</html>


