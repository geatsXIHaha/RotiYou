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
    $quantityItemForEditQuantity=$_POST['quantityItemForEditQuantity'];
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
                if ($quantityItemForEditQuantity<=$quantityOldToday){
                    $sqlAddItemQuantity = "update itemQuantity set quantityOld = quantityOld-$quantityItemForEditQuantity where idItem = '$IDItem' and time = '$time'";
                    $sqlAddItemDeleteQuantity = "update itemQuantity set quantityDelete = quantityDelete+ $quantityItemForEditQuantity where idItem = '$IDItem' and time = '$time'";
                    $sqlAddItemQuantity2 = "update itemQuantity set quantityLeft = quantityLeft-$quantityItemForEditQuantity where idItem = '$IDItem' and time = '$time'";
                    $sqlAddItemQuantity3 = "update itemQuantity set quantity = quantity-$quantityItemForEditQuantity where idItem = '$IDItem' and time = '$time'";   
                    mysqli_query($con,$sqlAddItemQuantity);
                    mysqli_query($con,$sqlAddItemDeleteQuantity);
                    mysqli_query($con,$sqlAddItemQuantity2);
                    mysqli_query($con,$sqlAddItemQuantity3);
                    echo "<script> 
                    alert('Successfully Delete $quantityItemForEditQuantity from $IDItem');
                    document.location = 'adminInventory.php'; 
                    </script>";     
                }
                else{
                    echo "<script> 
                    alert('Amount is greater than in-stock quantity ($quantityOldToday)');
                    document.location = 'adminInventory.php'; 
                    </script>";     
                }
                
                     
            }
            
        }
    }

?>      