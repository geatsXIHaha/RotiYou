<?php
    session_start();
    date_default_timezone_set('Europe/London');
    $t=time();
    $time=(date("Y-m-d",$t));
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "rotiyou";
    $con = mysqli_connect($host, $user, $password, $db_name);
    $quantityItem=$_POST['quantityAdd'];
    $itemList = mysqli_query($con, "select * from item");
    $totalItem = mysqli_num_rows($itemList);
    $senaraiPeserta = mysqli_query($con, "select * from peserta");
    
    
    while ($row = mysqli_fetch_array($itemList)){
        if (isset($_POST[$row['idItem']])){
                $IDItem=$row['idItem'];
                $quantityToday= "SELECT* FROM itemQuantity WHERE time ='$time' and idItem ='$IDItem' ";
                $result2 = mysqli_query($con, $quantityToday);
                if (mysqli_num_rows($result2)==0){
                    $sqlAddItemQuantityWhen0 = "insert into itemQuantity(idItem, quantityOld, quantityNew, quantity, quantityLeft, time) values('$IDItem', 0,0,0,0,'$time')"; 
                    mysqli_query($con, $sqlAddItemQuantityWhen0);
                };
                while($row = mysqli_fetch_array($result2)){
                $quantityOldToday= $row['quantityOld'];
                $sqlAddItemQuantity = "update itemQuantity set quantity = quantity+ $quantityItem where idItem = '$IDItem' and time = '$time'"; 
                $sqlAddItemLeftQuantity = "update itemQuantity set quantityLeft = quantityLeft+ $quantityItem where idItem = '$IDItem' and time = '$time'"; 
                $sqlAddItemQuantityLatest = "update itemQuantity set quantityNew = quantityNew+ $quantityItem where idItem = '$IDItem'and time = '$time'"; 
                
                mysqli_query($con,$sqlAddItemQuantityLatest);
                mysqli_query($con,$sqlAddItemLeftQuantity);
                mysqli_query($con,$sqlAddItemQuantity);
                }
                
                echo "<script> 
                alert('Successfully add $quantityItem into $IDItem');
                document.location = 'adminInventory.php'; 
                </script>";          
            }
            if (isset($_POST[$row['idItemForEditQuantity']])){
                echo "<script> 
                alert('Hi');
                document.location = 'adminInventory.php'; 
                </script>"; 
            }
            
        }

?>      