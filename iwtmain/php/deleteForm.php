<?php
    include "../config.php";
    
    if(isset($_GET['deleteid'])){
        $idNumber = $_GET['deleteid'];

        $sql = "DELETE FROM `university` WHERE idNumber=$idNumber";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("location:DisplaytForm.php"); 
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>