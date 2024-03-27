<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    require("login.php"); 
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "rotiyou";
    $con = mysqli_connect($host, $user, $password, $db_name);
    
    $itemList = mysqli_query($con, "select * from item");
    $totalItem = mysqli_num_rows($itemList);
    if (isset($_POST['deleteData'])){
            $password=$_POST['psw'];
            $idItem=$_POST['IDItemDelete'];
            $sql = "select * from admin where idAdmin = '$idAdmin' AND passwordAdmin ='$password'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
            if ($count==1){
                $sqlDeleteItem = "DELETE FROM item WHERE idItem = '$idItem'";
                $sqlDeleteItemQuantity = "DELETE FROM itemQuantity WHERE idItem = '$idItem'"; 
                mysqli_query($con,$sqlDeleteItemQuantity);
                if (!mysqli_query($con,$sqlDeleteItem) ){
                    echo "<script>  
                        alert('Fail To Delete Item');
                        document.location = 'adminEditItemPage.php'; 
                        </script>"; 
                }
                else{
                    echo "<script>  
                    alert('Delete Item $idItem Successful'); 
                    document.location = 'adminItemList.php'; 
                    </script>"; 
                }
            }
            else{
                echo "<script>  
                alert('Wrong password'); 
                history.back()
                </script>"; 
            }
                
            }

?>      