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
            }

            button {  
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

            button:hover {  
                background: #479e8a;  
                color: #ffffff; 
            }
            button:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
            .isi{
                border-radius: 10px;
                border: 1.5px solid #818b96;
                padding: 30px; 
                width: 500px;
                height:250px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 250px;
                margin-top: 80px;
                padding-top: 20px;
                font-size: 17px;
            }

            label {  
                display: block;  
                position: relative;  
                margin: 23px 10px; 
                color: #787878;
            }

            .input {  
                width: 100%;  
                padding: 10px;  
                background: transparent;  
                border: none;  
                outline: none; 
            }

            .line-box {  
                position: relative;  
                width: 100%;  
                height: 2px;  
                background: #BCBCBC; 
            }

            .line {  
                position: absolute;  
                width: 0%;  
                height: 2px;  
                top: 0px;  
                left: 50%;  
                transform: translateX(-50%);  
                background: #8BC34A;  
                transition: ease .6s; 
                padding-top: 7px;
            }     
            .buttonBalik{  
                display: inline-block; 
                padding: 12px 24px;  
                background: #86adac;  
                font-weight: bold;  
                color: #212626;  
                border: none;  outline: none;  
                border-radius: 3px;  
                cursor: pointer;  
                transition: ease .3s; 
                }  

            .buttonBalik:hover {  
                background: #147a77;  
                color: #ffffff; 
            }
            .buttonDaftar{  
                display: inline-block; 
                padding: 12px 10px;  
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
            .daftar{
                position: absolute;
                right: 440px;
                padding-top: 15px;
            }
            .daftar1{
                position: absolute;
                right: 300px;
                padding-top: 15px;
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
                <h2>Item List</h2>
            </div>
        </div>
        <form method="post" action="adminRegisterItem.php">
        <div class ="isi">        
            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter Item Code (Eg: I01)" name="newIDItem"
                pattern="[I]{1}[0-9]{1,3}" title="Item Code must begin with 'I' and not exceed 2 digit numbers" maxlength="3" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>   

            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter Item Name" name="newItemName"
                pattern="[a-zA-Z\s]{1,50}" title="Name must filled with characters" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>

            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter Item Price" name="newItemPrice"
                pattern="[0-9]+\.[0-9]{2}" title="Eg: 7.00" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>
            <div class = "daftar">
                <button class = "buttonDaftar" type = "submit" name = "adminRegisterItem">Add</button>
            </div>
            <div class = "daftar1">
                <button class = "buttonBalik" onclick="history.back()" name = "return">Return</button>
            </div>
        </div>
        </form>
        
    </body>
</html>
