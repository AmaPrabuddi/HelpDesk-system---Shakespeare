<?php
  include '../config.php';
  if(isset($_GET['deleteid'])){
    $Emp_ID=$_GET['deleteid'];

    $sql = "DELETE FROM `user` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
      // echo "Deleted Successfully";
      header('location:displaysignup.php');
    }
    else {
      die(mysqli_error($conn));
    }
  }
?>