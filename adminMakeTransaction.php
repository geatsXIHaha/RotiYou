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
    $t=time();
    $time=(date("Y-m-d",$t));
    $itemList = mysqli_query($con, "select * from item");
    $totalItem = mysqli_num_rows($itemList);
    $itemQuantityList = mysqli_query($con, "select * from itemQuantity where time = '$time'");
    
    $IDItem = array();
    $inStockQuantity=array();
    $totalAmount = 0;
    
    while ($row = mysqli_fetch_array($itemList)){
        $IDItem[] = $row['idItem'];  
        $itemPrice[]=$row['price'];  
        $itemName[]=$row['name'];  
    }
    while ($row = mysqli_fetch_array($itemQuantityList)){
        $quantityItemInStock[] = $row['quantityLeft'];  
    }
    if (isset($_POST['adminMakeTransaction'])){
        $quantityItemTransaction=$_POST['value'];
        $status=0;
        $status2=0;
        for($i=0;$i<$totalItem; $i++){
            if ($quantityItemTransaction[$i]>$quantityItemInStock[$i]){
                $status++;
            }
            if($quantityItemTransaction[$i]==0){
                $status2++;
            }
        }
        if ($status2==$totalItem){
            echo "<script> 
                alert('Dont Leave Blank');
                document.location = 'adminTransaction.php'; 
                </script>";
        }
        else{if ($status==0){
            for($i=0; $i<$totalItem; $i++){
                $amountPay=$itemPrice[$i]*$quantityItemTransaction[$i];
                $totalAmount=$totalAmount+$amountPay;
                $transactionSQL= "insert into transaction (idItem, name, quantityTransaction, amount) values('$IDItem[$i]', '$itemName[$i]','$quantityItemTransaction[$i]','$amountPay')";
                mysqli_query($con, $transactionSQL);
                $inStockQuantity[$i]=$quantityItemInStock[$i]-$quantityItemTransaction[$i];
                $transactionDeleteQuantitySQL= "update itemQuantity set quantityLeft = '$inStockQuantity[$i]' where idItem='$IDItem[$i]' and time = '$time'";
                mysqli_query($con, $transactionDeleteQuantitySQL);
            }
            
                echo "<script> 
                alert('RM '+$totalAmount);
                document.location = 'adminTransaction.php'; 
                </script>"; 
            
            }  
        
        else{
            echo "<script> 
                alert('Not enough stock');
                document.location = 'adminTransaction.php'; 
                </script>"; 
        }
    }}
?>      