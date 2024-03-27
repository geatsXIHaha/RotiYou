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
                padding: 30px; 
                width: 900px;
                height:410px; 
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
                width: 150px;
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
            .add{
                width:80px;
            }
            .slidecontainer {
            width: 100%;
            }

            .slider {
           
            height: 10px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            }

            .slider:hover {
            opacity: 1;
            }

            .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 23px;
            height: 24px;
            border: 0;
            background: url('contrasticon.png');
            cursor: pointer;
            }

            .slider::-moz-range-thumb {
            width: 23px;
            height: 24px;
            border: 0;
            background: url('contrasticon.png');
            cursor: pointer;
            }
            .search{
                position: absolute;
                top:6px; 
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
                <h2>Transaction</h2>
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
                $i = 1;
                $t=time();
                $time=(date("Y-m-d",$t));
                echo "<table style = 'text-align: center; margin-left:auto; margin-right:auto;  border-spacing: 40px 10px;' id = 'table'>";
                echo "<tr><th><h3><u>Bil.</u></h3></th><th><h3><u>ID Item</u></h3></th><th><h3><u>Item Name</u></h3></th>
                <th><h3><u>Stock</u></h3></th><th><h3><u>Add</u></h3></th></tr>";
                while ($row = mysqli_fetch_array($itemList))
                {
                    $idItem = htmlspecialchars($row['idItem']);
                    echo 
                    "<tr>
                    <td>" . $i . ". " . "</td>
                    <td>"  . htmlspecialchars($row['idItem'])  . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>";
                    $quantityOldValue= "SELECT * FROM itemQuantity WHERE time ='$time' and idItem ='$idItem' ";
                    $result2 = mysqli_query($con, $quantityOldValue);
                    if (mysqli_num_rows($result2)==0){
                        echo "<td>".'0'."</td>";
                    }
                    while($row = mysqli_fetch_array($result2)){
                        
                        $quantityLeft = $row['quantityLeft'];
                        echo "<td>".$quantityLeft."</td>";
                    }
                    echo "</td><form method='post' action='adminMakeTransaction.php'>
                    <td>"."
                        <button id='buttonDecrease' class ='buttonChange' type='button' onclick='myFunctiondecrease()'>
                        <span class= 'buttonSizeIcon'>
                        <ion-icon name='caret-down-outline'></ion-icon>
                        </span></button>
                    <input id='input' type='range' min='0' max='10' value='0' class='slider' name='value[]'>
                        <button id='buttonIncrease' class ='buttonChange' type='button' onclick='myFunctionincrease()'>
                        <span class= 'buttonSizeIcon'>
                        <ion-icon name='caret-up-outline'></ion-icon>
                        </span></button>
                    <span class='slider-output'>0</span><p id='output'></p>
                    "."</td>
                    </tr>";
                    ++$i;
                    
                }
                echo "</table>";    
            ?>        
               
        </div>
        <script>    
        var sliders = document.getElementsByClassName("slider");
        var outputs = document.getElementsByClassName("slider-output");
        
        for (let i = 0; i < sliders.length; i++) {
            outputs[i].innerHTML = sliders[i].value;
            sliders[i].oninput = function() {
                outputs[i].innerHTML = this.value;
            }
            
        }
        
        
        </script>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" type = "submit" name = "adminMakeTransaction">Proceed to Payment</button>
            </div>
        </form>
        </div>
        
    </body>
</html>