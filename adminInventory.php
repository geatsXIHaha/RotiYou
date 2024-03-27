<?php 
session_start();
require("adminCheckStatus.php");
?>
<!DOCTYPE html>
<?php require("login.php"); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <style>
            body{
                background-image: url('adminbg.jpg');
            }
            .menu{
                border-radius: 20px;
                border: 2px solid #818b96;
                padding: 60px; 
                padding-top: 7px;
                width: 80px;
                height:450px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                left: 20px;
                margin-top: 30px;
                padding-top: 30px;
            }
            .title{
                position: absolute;
                right: 460px;
                top:60px;
            }

            .buttonMenu {  
                display: inline-block; 
                padding: 5px 15px;  
                background: #36d6b1;  
                font-weight: bold;  
                color: #2d3332;  
                border: none;  outline: none;  
                border-radius: 5px;  
                cursor: pointer;  
                transition: ease .3s; 
                position: absolute;
                left:35px;
                width: 120px;
                height:43px;
                font-size: 15px;
            }  

            .buttonMenu:hover {  
                background: #479e8a;  
                color: #ffffff; 
            }
            .buttonMenu:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .isi{
                border-radius: 10px;
                border: 1.5px solid #818b96;
                padding: 5px; 
                width: 930px;
                height:430px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 30px;
                margin-top: 50px;
                padding-top: 0px;
                font-size: 17px;
            }
            .buttonDaftar{  
                display: inline-block; 
                padding: 4px 16px;  
                width: 100px;
                background: #dbd8ad;  
                font-weight: bold;  
                color: #2b2b26;  
                border: none;  outline: none;  
                border-radius: 3px;  
                cursor: pointer;  
                transition: ease .3s; 
                }  

            .buttonDaftar:hover {  
                background: #b0a615;  
                color: #ffffff; 
            }
            .daftar1{
                position: absolute;
                right: 222px;
                padding-top: 8px;
            }
            .buttonDelete{
                background: #cc8f8f; 
                border-color: #e31010;
                padding-top: 100px; 
                padding: 4px 10px;
                width: 50px;
                height: 25px;
                cursor: pointer;  
                transition: ease .3s; 
            }
            .buttonDelete:hover {  
                background: #994040;  
                color: #ffffff; 
            }
            .add{
                width:50px;
            }
            .date{
                position: absolute;
                margin-top: 10px;
                right: 60px;
            }
            .search{
                position: absolute;
                margin-top: 2px;
                left: 40px;
            }
            .addBaked{
                width:15px;
            }
        </style>
        <div style="text-align:center; margin-top: 0px;">
            <h1>Roti You</h1>
        </div>
        <?php
            echo "<p style = 'position: absolute; left: 73px; margin-top: 0px;'> ID Admin: $idAdmin </p>";
        ?>
        <form method="post" action="adminbutton.php">
        <div class="menu">            
            <button class = "buttonMenu" type = "submit"  name = "homePage">Homepage</button>
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "info">Info</button>
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "itemList">Item List</button>          
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "transaction">Transaction</button>
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "inventory">Inventory</button>
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "report">Report</button>
            <br><br><br><br>
            <button class = "buttonMenu" type = "submit" name = "logout">Logout</button>
        </div>
        </form>
        <div style="text-align:center;">
            <div class="title">
                <h2>Inventory</h2>
            </div>

        </div>
        <div class ="isi">
            <script>
                function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("table");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
                }
            </script>
        <div class="search">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Find item name.." title="Type in a name">
        </div>
        
        <div style="height:370px; overflow-y: scroll;">
        
        <?php 
            $t=time();
            $time=(date("Y-m-d",$t));
            $timeYesterday=date('Y-m-d',strtotime("-1 days"));
            echo "<div class = date><form method='post'> <input type='submit' name='currentDayValue' value='$time'></form></div>";
            if (isset($_POST['currentDayValue'])){
                $itemQuantityList = mysqli_query($con, "select * from itemQuantity");
                $totalItemQuantityList = mysqli_num_rows($itemQuantityList);
                if($totalItemQuantityList==0){
                    while ($row = mysqli_fetch_array($itemList)){
                        $idItem = htmlspecialchars($row['idItem']);
                        $sqlNewDateFor0 = "insert into itemQuantity (idItem, quantityOld, quantityNew, quantity, quantityLeft,time) values ('$idItem', '0', '0', '0','0', '$time')";
                        if(mysqli_query($con,$sqlNewDateFor0)){
                            echo "<script>  
                            alert('Update date to $time successfully');
                            document.location = 'adminInventory.php'; 
                            </script>"; 
                        }
                        else{
                            echo "<script> 
                            document.location = 'adminInventory.php'; 
                            </script>"; 
                        }
                    }   
                }
                else{
                $latestTime= "SELECT * FROM itemQuantity WHERE time =(SELECT MAX(time)) ";
                $timeLatestDatabase=mysqli_query($con, $latestTime);
                while($row2 = mysqli_fetch_array($timeLatestDatabase)){
                $timeLatest = htmlspecialchars($row2['time']);
                }
                while ($row = mysqli_fetch_array($itemList))
                {
                    $idItem = htmlspecialchars($row['idItem']);
                    $quantityDate= "SELECT * FROM itemQuantity WHERE time ='$time' and idItem ='$idItem' ";
                    $result3 = mysqli_query($con, $quantityDate);
                    if (mysqli_num_rows($result3)==0){
                        $quantityYesterday= "SELECT * FROM itemQuantity WHERE time ='$timeLatest' and idItem ='$idItem' ";
                        $result3 = mysqli_query($con, $quantityYesterday);
                        while($row = mysqli_fetch_array($result3)){
                            $quantityYesterday= $row['quantityLeft'];
                            $quantityLeftYesterday= $row['quantityLeft'];
                            $sqlNewDate = "insert into itemQuantity (idItem, quantityOld, quantityNew, quantity,quantityLeft, time) values ('$idItem', '$quantityYesterday', '0', '$quantityYesterday','$quantityLeftYesterday', '$time')";
                            if(mysqli_query($con,$sqlNewDate)){
                                echo "<script>  
                                alert('Update date to $time successfully');
                                document.location = 'adminInventory.php'; 
                                </script>"; 
                            }
                            else{
                                echo "<script> 
                                document.location = 'adminInventory.php'; 
                                </script>"; 
                            }
                        }
                        
                    }
                    else{
                        echo "<script>  
                        document.location = 'adminInventory.php'; 
                        </script>"; 
                    }
                }
            }};
            ?>
            <?php
                $i=1;
                date_default_timezone_set('Australia/Melbourne');
                echo "<table style = 'text-align: center; margin-left:auto; margin-right:auto;  border-spacing: 30px 5px;' id = 'table'>";
                echo "<tr><th><h3><u>Bil.</u></h3></th>
                <th><h4><u>ID Item</u></h4></th>
                <th><h4><u>Item Name</u></h4></th>
                <th><h4><u>Initial</u></h4></th>
                <th><h4><u>Today Baked</u></h4></th>
                <th><h4 style='color:MediumSeaGreen;'><u>Total Daily Quantity</u></h4></th>
                <th><h4><u>Add</u></h4></th></tr>";
                while ($row = mysqli_fetch_array($itemList))
                {
                    $idItem = htmlspecialchars($row['idItem']);
                    $idItemForEditQuantity = htmlspecialchars($row['idItem']);
                    echo
                    "<tr>
                    <td>" . $i . ". " . "</td>
                    <td>"  . htmlspecialchars($row['idItem'])  . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>";
                    $quantityOldValue= "SELECT * FROM itemQuantity WHERE time ='$time' and idItem ='$idItem' ";
                    $result2 = mysqli_query($con, $quantityOldValue);
                    if (mysqli_num_rows($result2)==0){
                        echo "<td>".'0'."</td>
                        <td>".'0'."</td>
                        <td>".'0'."</td>";
                    };
                    while($row = mysqli_fetch_array($result2)){
                        $quantityOld = $row['quantityOld'];
                        $quantityNew = $row['quantityNew'];
                        $quantity = $row['quantity'];
                        echo "<form method='post' action='adminDeleteDailyItemQuantity.php'> 
                        <td>".$quantityOld."
                        <form method='post' action='adminDeleteDailyItemQuantity.php'>
                        <input type='text' class = 'addBaked' name ='quantityItemForEditQuantity' pattern='[0-9]{1,8}' title='Must be a whole number' required>
                        <button class = 'buttonDelete' name = '$idItemForEditQuantity' > Edit </button>"."</form>
                        </td>
                        <td>".$quantityNew."</td>
                        <td>".$quantity."</td>";
                    };
                    
                    echo "<form method='post' action='adminAddItemQuantity.php'>
                    <td>"."<input type='text' class = 'add' name ='quantityAdd' pattern='[0-9\-]{1,8}' title='Must be a whole number' placeholder= 'No. Baked' required>"."</td>
                    <td>" . "<button class = 'buttonDelete' name = '$idItem' > Add </button>" . "</td></form>
                    </tr>";
                    ++$i;  
                }
                echo "</table>";    
            ?>        
               
        </div>
        <form method="post" action="adminbutton.php">
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" type = "submit" name = "adminRegisterItem">Add Item</button>
            </div>
        </form>
        </div>
        
    </body>
</html>