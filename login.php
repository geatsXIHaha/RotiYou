<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "RotiYou";  
    
    $idSeller=$_SESSION['IDSeller'];
    $idAdmin=$_SESSION['IDAdmin'];

    $con = mysqli_connect($host, $user, $password, $db_name);

    if (isset($_POST['loginAdmin'])){
        $usernameAdmin = $_POST['IDAdmin'];
        $_SESSION['IDAdmin'] = $usernameAdmin; 
        $passwordAdmin = $_POST['passwordAdmin'];

        $sql = "select * from admin where idAdmin = '$usernameAdmin' AND passwordAdmin ='$passwordAdmin'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1){
            echo "<script> 
            alert('Logged In, Welcome $usernameAdmin'); 
            document.location = 'admin.php'; 
            </script>";            
        }
        else {
            echo "<script> alert('Logged In Fail'); document.location = 'loginadmin.php'; </script>";        
        }
    }
        

    elseif (isset($_POST['loginSeller'])){
        $usernameSeller = $_POST['IDSeller'];
        $_SESSION['IDSeller'] = $usernameSeller; 
        $passwordSeller = $_POST['passwordSeller'];

        $sql = "select * from seller where idSeller = '$usernameSeller' AND passwordSeller ='$passwordSeller'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1){
            echo "<script> 
            alert('Loggged In, Welcome Seller'); 
            document.location = 'seller.php'; 
            </script>";            
        }
        else {
            echo "<script> alert('Logged In Fail'); document.location = 'loginSeller.php'; </script>";        
        }
    }

    $itemList = mysqli_query($con, "select * from item");
    $itemListQuantity = mysqli_query($con, "select * from itemQuantity");
    $totalItem = mysqli_num_rows($itemList);
?>
