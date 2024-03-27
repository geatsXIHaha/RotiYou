<?php
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "RotiYou";  

    $con = mysqli_connect($host, $user, $password, $db_name);
    //add item
    $newIDItem=$_POST ['newIDItem'];
    $newItemName=$_POST ['newItemName'];
    $newItemPrice=$_POST ['newItemPrice'];
    //update item
    
    if (isset($_POST['adminRegisterItem'])){
        //Add Item
        
        $sqlCheck = mysqli_query($con, "SELECT * FROM item WHERE idItem ='$newIDItem'");
        $jumlahCheck = mysqli_num_rows($sqlCheck);
        if ($jumlahCheck==0){
            if($newIDItem != "" && $newItemName != "" && $newItemPrice != ""){
            $sql = "insert into item (idItem, name, price) values ('$newIDItem', '$newItemName', '$newItemPrice')";
            $sqlQuantity = "insert into itemQuantity (idItem) values ('$newIDItem')";
                if (!mysqli_query($con,$sql) ){
                    echo "<script>  
                        alert('Fail To Add Item');
                        document.location = 'adminRegisterItemPage.php'; 
                        </script>"; 
                }
                else{
                    mysqli_query($con,$sqlQuantity);
                    echo "<script>  
                    alert('Add Item $newItemName Successful'); 
                    document.location = 'adminItemList.php'; 
                    </script>"; 
                }
            }
            else{
                echo "<script> 
                alert('Fail To Add Item. Please Fill In All Information'); 
                document.location = 'adminRegisterItemPage.php'; 
                </script>";   
            } 
        }
        else{
            echo "<script> 
            alert('Please Use Another Item Code'); 
            document.location = 'adminRegisterItemPage.php'; 
            </script>";   
        }
    } 
    if (isset($_POST['adminUpdateItemPrice'])){
        //Update Item
        $IDItem=$_POST ['IDItem'];
        $itemNewPrice=$_POST ['itemNewPrice'];
        $itemNewName=$_POST ['itemNewName'];
        $sqlCheck = mysqli_query($con, "SELECT * FROM item WHERE idItem ='$IDItem'");
        $jumlahCheck = mysqli_num_rows($sqlCheck);
        if ($jumlahCheck==1){
            if($IDItem != "" && $itemNewPrice != "" && $itemNewName != ""){
            $sql = "update item set price='$itemNewPrice', name = '$itemNewName' where idItem = '$IDItem'";
                if (!mysqli_query($con,$sql) ){
                    echo "<script>  
                        alert('Fail To Update Price');
                        document.location = 'adminEditItemPage.php'; 
                        </script>"; 
                }
                else{
                    echo "<script>  
                    alert('Update Successful: $itemNewName (RM $itemNewPrice)'); 
                    document.location = 'adminItemList.php'; 
                    </script>"; 
                }
            }
            else{
                echo "<script> 
                alert('Fail To Update Price. Please Fill In All Information'); 
                document.location = 'adminEditItemPage.php'; 
                </script>";   
            } 
        }
        else{
            echo "<script> 
            alert('Please Use Another Item Code'); 
            document.location = 'adminEditItemPage.php'; 
            </script>";   
        }
    }
    $itemList = mysqli_query($con, "select * from item");
    $totalItem = mysqli_num_rows($itemList);
    $senaraiPeserta = mysqli_query($con, "select * from peserta");
    
    while ($row = mysqli_fetch_array($itemList)){
        if (isset($_POST[$row['idItem']])){     
                $IDItem=$row['idItem'];
                $sqlDeleteItem = "DELETE FROM item WHERE idItem = '$IDItem'"; 
                mysqli_query($con,$sqlDeleteItem);
                
                echo "<script> 
                alert('Delete Successful');
                document.location = 'adminItemList.php'; 
                </script>";          
            }
            
        }
    
    
?>