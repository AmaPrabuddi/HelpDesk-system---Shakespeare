<?php
   include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/display.css">
    <title>Module Page</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Module ID</th>
                <th scope="col">Module Name</th>
                <th scope="col">Module Credit Points</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $sql = "SELECT * FROM modules";
                $result = mysqli_query($conn, $sql);

                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        
                        $id = $row['id'];
                        $ModuleID = $row['moduleID'];
                        $ModuleName = $row['ModuleName'];
                        $CreditPoints = $row['CreditPoints'];
                        
                        echo '<tr>
                        <td>' . $ModuleID . '</td>
                        <td>' . $ModuleName . '</td>
                        <td>' . $CreditPoints . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="updateModules.php?updateid='.$id.'" class="text-light">UPDATE</a></button>
                            <button class="btn btn-danger"><a href="deleteModules.php?deleteid='.$ModuleID.'" class="text-light">DELETE</a></button>
                        </td>
                        </tr>';
                    }
                }
               ?>
            </tbody>
        </table>
    </div>
</body>
</html>
