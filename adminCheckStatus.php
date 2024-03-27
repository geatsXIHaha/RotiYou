<?php 
    if (!isset($_SESSION['IDAdmin'])){
        echo ("not logged in");
        echo "<script> 
            alert ('Kindly login again');
            document.location = 'loginAdmin.php'; 
            </script>";
    }
?>