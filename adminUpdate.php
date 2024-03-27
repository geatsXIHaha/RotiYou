<?php
    require("login.php"); 
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "RotiYou";
    $con = mysqli_connect($host, $user, $password, $db_name);
    $sqlInfoAdmin = "SELECT * FROM admin WHERE idAdmin = '$idAdmin'"; 
    $result = $con->query($sqlInfoAdmin);
    
    $newPassword=$_POST ['newPasswordAdmin'];
    $newName=$_POST ['newNameAdmin'];

    if (isset($_POST['updateAdmin'])){
        if($newPassword != "" && $newName != "" ){
        $sql = "UPDATE admin SET  passwordAdmin = '$newPassword', name = '$newName' WHERE idAdmin = '$idAdmin'";
            if (!mysqli_query($con,$sql)){
                echo "<script>  
                    alert('Update Failed');
                    document.location = 'adminUpdatePage.php'; 
                    </script>";
            }
            else{
                echo "<script>  
                alert('Update Successful'); 
                document.location = 'adminInfo.php'; 
                </script>"; 
            }
        }
        else{
            echo "<script> 
            alert('password and username cannot leave blank'); 
            document.location = 'adminKemasKini.php'; 
            </script>";   
        } 
    }  

?>      