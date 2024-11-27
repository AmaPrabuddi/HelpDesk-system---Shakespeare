<?php
    include "../config.php";
    
    if(isset($_GET['deleteid'])){
        $ModuleID = $_GET['deleteid'];

        $sql = "DELETE FROM `modules` WHERE `moduleID`='".$ModuleID."'";

        $result = mysqli_query($conn, $sql);

        if($result){
            // echo "delete successfully";
            header("location:instructor.php"); 
        }
        else{
            die(mysqli_error($con));
        }
    }
?>