
<?php
    include "../config.php";
    
    if(isset($_GET['idnumber'])){
      $idnumber = $_GET['idnumber'];

        $sql = "DELETE FROM crud WHERE `idnumber`='".$idnumber."'";

        $result = mysqli_query($conn, $sql);

        if($result){
            // echo "delete successfully";
            header("location:displayt.php"); 
        }
        else{
            die(mysqli_error($con));
      }
    }
?>