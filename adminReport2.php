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
                left: 140px;
            }
            .icons{
                position: absolute;
                right:100px;
                display: flex;
            }
            
            .icons button{
            cursor: pointer;
            text-align: center;
            padding-top:2px;
            line-height: 38px;
            border-radius:50%;
            font-size: 1.9rem;
            user-select: none;
            border: none;
            }
            .iconsbutton:last-child{
            margin-right: -10px;
            }
            .icons button:hover{
            background: #d1f294;
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
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Find item name.." title="Type in a name"></input>
        </div>
        <div class="icons">
        <input type = "date" id = "datepicker">
        <form action="" method="get" action="adminReport2">
                    <input type = "submit" button id = "date" class="material-symbols-rounded" name="prev" onclick="myFunction(this.value)" value=<?php 
            echo $_GET['prev']; ?>
            ><ion-icon name="arrow-dropleft-circle"></ion-icon></input>
            <input type ="button"  id="date2" class="material-symbols-rounded" name="next" onclick="hello(this.value)" value=""
            ><ion-icon name="arrow-dropright-circle"></ion-icon></input></form>
             
        </div>
        
        <div style="height:370px; overflow-y: scroll;">
        <script> 
         input = document.getElementById("date");
        inputValue = input.value;
        var elem = document.getElementById("date2");
        elem.value = inputValue;
            function myFunction(buttonValue) { 
            console.log('Button value is: ' + buttonValue); 
            // You can now use the buttonValue parameter in your JavaScript function 
            let yesterday = new Date(new Date(buttonValue).setDate(new Date(buttonValue).getDate(buttonValue) - 1));
            if ((yesterday.getMonth(buttonValue) + 1)<10){
                 yesterdayMonth='0' +(yesterday.getMonth(buttonValue) + 1);
            }
            else{
                 yesterdayMonth=(yesterday.getMonth(buttonValue) + 1);
            }
            
            let formattedDate = yesterday.getFullYear(buttonValue) + '-' + yesterdayMonth + '-' + yesterday.getDate(buttonValue);
            let currentDay = (formattedDate);
            var elem = document.getElementById("date2");
            elem.value = currentDay;
            alert (currentDay);
            var elem = document.getElementById('date');
             elem.value = (currentDay);
            
            } 
            function hello(buttonValue) { 
            console.log('Button value is: ' + buttonValue); 
            // You can now use the buttonValue parameter in your JavaScript function 
            let tomorrow = new Date(new Date(buttonValue).setDate(new Date(buttonValue).getDate(buttonValue) + 1));
            if ((tomorrow.getMonth(buttonValue) + 1)<10){
                 tomorrowMonth='0' +(tomorrow.getMonth(buttonValue) + 1);
            }
            else{
                 tomorrowMonth=(tomorrow.getMonth(buttonValue) + 1);
            }
            let formattedDate = tomorrow.getFullYear(buttonValue) + '-' + tomorrowMonth + '-' + tomorrow.getDate(buttonValue);
            let currentDay = (formattedDate);
            alert (currentDay);
            var elem = document.getElementById('date');
             elem.value = (currentDay);
             var elem = document.getElementById('date2');
             elem.value = (currentDay);
            } 
        </script>
        <?php 
            $timeDayBefore=$_GET["day"];
            if($timeDayBefore<10){
                $timeDay="0".$timeDayBefore;
            }
            else{
                $timeDay=$timeDayBefore;
            }
            $timeMonth=$_GET["month"];
            $timeYear=$_GET["year"];
            if ($timeMonth<10){
                $time=$timeYear."-0".$timeMonth."-".$timeDay;
            }
            else{
            $time=$timeYear."-".$timeMonth."-".$timeDay;
            }
            if (isset($_GET['prev'])){
                $time=$_GET['prev'];
            }
            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "rotiyou";
            $con = mysqli_connect($host, $user, $password, $db_name);
            $itemList = mysqli_query($con, "select * from item");
            $totalItem = mysqli_num_rows($itemList);
            $itemQuantityList = mysqli_query($con, "select * from itemQuantity where time = '$time'");
            $checkTransaction = mysqli_num_rows($itemQuantityList);
            $totalDailySales=0;
            
            echo ("Date: ".$time);
            date_default_timezone_set('Australia/Melbourne');
            if ($checkTransaction==0){
                echo "<br><h2>".("No result Found")."</h2>";
            }
            else{
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
            <th><h4><u>Total Price</u></h4></th></tr>";
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
                $totalPrice[$i]=$itemPrice[$i]*$quantitySellDaily[$i];
                    echo "<tr>
                    <td>".$IDItem[$i]."</td>
                    <td>".$itemPrice[$i]."</td>
                    <td>".$itemName[$i]."</td>
                    <td>".$quantityOld[$i]."</td>
                    <td>".$quantityBaked[$i]."</td>
                    <td>".$quantityBeforeSell[$i]."</td>
                    <td>".$quantityLeftAfterSell[$i]."</td>
                    <td>".$quantitySellDaily[$i]."</td>
                    <td>".$totalPrice[$i]."</td>
                    </tr>";
                    $totalDailySales=$totalDailySales+$totalPrice[$i];
            }
            echo "</table>"; 
            echo "<div style ='position: absolute; top: 370px; right:60px;'><h3 style='color:MediumSeaGreen;'><u> Daily Earned:  RM  $totalDailySales </u></h3></div>";
        }
            ?>        
               
        </div>
        
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" onclick="history.back()">Return</button>
            </div>
            
        </div>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>