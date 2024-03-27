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
                width: 1000px;
                height:430px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 10px;
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
            
            .search{
                position: absolute;
                margin-top: 2px;
                right: 60px;
            }
            .addBaked{
                width:30px;
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
                <h2>Report</h2>
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
            $idItem=$_GET["IDItem"];
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
            
            echo ("Date: ".$time);
            date_default_timezone_set('Australia/Melbourne');
            echo "<table style = 'text-align: center; margin-left:auto; margin-right:auto;  border-spacing: 30px 5px;' id = 'table'>";
            echo "<tr>
            <th><h4><u>ID Item</u></h4></th>
            <th><h4><u>Item name</u></h4></th>
            <th><h4><u>Unit Price</u></h4></th>
            <th><h4><u>Daily Initial Qty</u></h4></th>
            <th><h4><u>Daily Baking Qty</u></h4></th>
            <th><h4><u>Daily Stock Qty</u></h4></th>
            <th><h4><u>Daily Balance Qty</u></h4></th>
            <th><h4 style='color:MediumSeaGreen;'><u>Daily Sales Qty</u></h4></th>
            <th><h4><u>View</u></h4></th></tr>";
            while ($row = mysqli_fetch_array($itemList))
            {
                $IDItem[] = $row['idItem'];  
                $itemPrice[]=$row['price'];  
                $itemName[]=$row['name'];  
            }
            while ($row = mysqli_fetch_array($itemQuantityList)){
                $quantityOld[] = $row['quantityOld'];
                $quantityBaked[] = $row['quantityNew'];
                $quantityBeforeSell[] = $row['quantity'];
                $quantityLeftAfterSell[] = $row['quantityLeft'];  
            }
            for ($i=0;$i< $totalItem; $i++){
                $quantitySellDaily[$i]=$quantityBeforeSell[$i]-$quantityLeftAfterSell[$i];
            }
            
            for ($i=0;$i< $totalItem; $i++){
                    echo "<tr>
                    <td>".$IDItem[$i]."</td>
                    <td>".$itemPrice[$i]."</td>
                    <td>".$itemName[$i]."</td>
                    <td>".$quantityOld[$i]."</td>
                    <td>".$quantityBaked[$i]."</td>
                    <td>".$quantityBeforeSell[$i]."</td>
                    <td>".$quantityLeftAfterSell[$i]."</td>
                    <td>".$quantitySellDaily[$i]."</td>
                    <form method='post' action='adminDetailedReport.php'>
                    <td>" . "<button class = 'buttonDelete' name = '$IDItem[$i]' > View </button>" . "</td></form>
                    </tr>";
            }
            echo "</table>";    
            ?>        
               
        </div>
        <form method="post" action="adminbutton.php">
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" type = "submit" name = "adminRegisterItem">Add Item</button>
                <button class = "buttonDaftar" type = "submit" name = "adminEditItem">Edit Price</button>
            </div>
        </form>
        </div>
        
    </body>
</html>