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
            .daftar2{
                position: absolute;
                right: 160px;
                padding-top: 15px;
            }

            /* The popup form - hidden by default */
            .form-popup {
                display: none;
                border-radius: 10px;
                border: 1.5px solid #818b96;
                padding: 30px; 
                width: 200px;
                height:70px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 0px;
                margin-top: 70px;
                padding-top: 0px;
                font-size: 17px;
                top:210px;
            }
            
            .button-form1{
                position: absolute;
                right: 290px;
            }
            .button-form2{
                position: absolute;
                right: 160px;
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
        <div class ="isi">    
        <form method="post" action="adminRegisterItem.php">    
            <label>
                <input type="hidden" class="input"  name='IDItem' value='<?php echo $_GET["idItem"] ?>'><?php echo $_GET["idItem"] ?></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>   
            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter Item New Name" name="itemNewName"
                pattern="[a-zA-Z\s]{1,50}" title="Name must filled with characters" value="<?php 
                $host = "localhost";  
                $user = "root";  
                $password = '';  
                $db_name = "RotiYou";
                $con = mysqli_connect($host, $user, $password, $db_name);
                $idItem=$_GET["idItem"];
                $sqlInfoItem = "SELECT * FROM item WHERE idItem = '$idItem'"; 
                $result = $con->query($sqlInfoItem);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo $row["name"];                       
                    }
                }?>"required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>
            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter Item New Price" name="itemNewPrice"
                pattern="[0-9]+\.[0-9]{2}" title="Eg: 7.00" value="<?php 
                $host = "localhost";  
                $user = "root";  
                $password = '';  
                $db_name = "RotiYou";
                $con = mysqli_connect($host, $user, $password, $db_name);
                $idItem=$_GET["idItem"];
                $sqlInfoItem = "SELECT * FROM item WHERE idItem = '$idItem'"; 
                $result = $con->query($sqlInfoItem);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo $row["price"];                       
                    }
                }?>" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>
            <div class = "daftar">
                <button class = "buttonDaftar" type = "submit" name = "adminUpdateItemPrice">Update</button>
            </div>
            </form>
            <div class = "daftar1">
                <button class = "buttonBalik" onclick="history.back()" name = "return">Return</button>
            </div>
            <div class = "daftar2">
                <button class = "buttonDaftar"  name = "DeleteItem" onclick="openForm()">Delete</button>
            </div>
            <div class="form-popup" id="myForm">
            <form method="post" action="adminDeleteItem.php">
                    <input type="hidden" class="input"  name='IDItemDelete' value='<?php echo $_GET["idItem"] ?>'></input>
                    <b>Password</b>
                    <input type="password" placeholder="Enter Password" name="psw" required></input>
                    <div class = "button-form1">
                    <button type="submit" class="button-form1" name="deleteData">Delete</button></div>
                    <div class = "button-form2">
                    <button class="button-form2" onclick="closeForm()">Close</button></div>
                </form>
            </div>
        </div>
        <script>
            function openForm() {
              document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>
        
    </body>
</html>
