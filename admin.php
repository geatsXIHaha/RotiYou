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
                width: 650px;
                height:370px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 183px;
                margin-top: 70px;
                padding-top: 0px;
                font-size: 17px;
            }
            .fontsize{
                color: #2d3332;  
                border: none;  outline: none;  
                border-radius: 5px;  
                padding-top: 1px;
            }
            .buttonSize{
                display: inline-block; 
                padding-top: 4px;
                width: 40px;
                height: 40px;
                background: #dbd8ad;  
                font-weight: bold;  
                color: #2b2b26;  
                border: none;  outline: none;  
                border-radius: 3px;  
                cursor: pointer;  
                transition: ease .3s; 
                text-align:center;
            }  

            .buttonSize:hover {  
                background: #b0a615;  
                color: #ffffff; 
            }
            .buttonSizeIcon{
                font-size:30px;
                text-align:center;
            }
            .size{
                position: absolute;
                right: 42px;
                bottom: 8px;
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
        <div class ="isi">
            <div style="text-align:center;">
                <h2><u>即烘您の面包</u></h2>
            </div>
            <p id="size">
            📍槟城 Georgetown #即烘面包 💌
            【Roti You】不只有面包，还售卖各式各样的酥饼爱吃 #菠萝包 #蛋挞 #烧包 的绝对不要错过了！虽然外观不够完美 但味道却是一级棒！👍
            我们的面包<br>
            🍞现场即烘<br>
            🍞真材实料<br>
            🍞价格实惠<br>
            🍞不含防腐剂<br>
            🍞不含柔软剂<br>
            【Roti You】• 帅帅美食坊 
            38, Lebuh Cecil, 10300 George Town, Pulau Pinang.<br><br>
            <?php
            echo "Total Item: $totalItem ";
            ?>                                                           
            </p>
            
        </div>
        
        <script>
            function myFunctionincrease() {
                txt = document.getElementById('size');
                style = window.getComputedStyle(txt, null).getPropertyValue('font-size');
                currentSize = parseFloat(style);
                if (currentSize <= 34){
                txt.style.fontSize = (currentSize + 2) + 'px';
                }
            }
            
            function myFunctiondecrease() {
                txt = document.getElementById('size');
                style = window.getComputedStyle(txt, null).getPropertyValue('font-size');
                currentSize = parseFloat(style);
                if (currentSize >= 18){
                txt.style.fontSize = (currentSize - 1) + 'px';
                }
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>