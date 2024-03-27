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
                right: 454px;
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
                height:240px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 250px;
                margin-top: 80px;
                padding-top: 10px;
                font-size: 17px;
            }

            label {  
                display: block;  
                position: relative;  
                margin: 14px 10px; 
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
            .buttonKemasKini{  
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

            .buttonKemasKini:hover {  
                background: #b0a615;  
                color: #ffffff; 
            }
            .daftar{
                position: absolute;
                right: 440px;
                padding-top: 25px;
            }
            .daftar1{
                position: absolute;
                right: 300px;
                padding-top: 25px;
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
                <h2>Admin Update Page</h2>
            </div>
        </div>
        <div class ="isi">   
        <form method="post" action="adminUpdate.php">
            <label>
                <div class="input"><?php echo ($idAdmin)?></div>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>   

            <label> 
                <input type="text" class="input" autocomplete = "off" placeholder="Enter new password" name="newPasswordAdmin" value="<?php 
                $host = "localhost";  
                $user = "root";  
                $password = '';  
                $db_name = "RotiYou";
                $con = mysqli_connect($host, $user, $password, $db_name);
                $sqlInfoAdmin = "SELECT * FROM admin WHERE idAdmin = '$idAdmin'"; 
                $result = $con->query($sqlInfoAdmin);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo $row["passwordAdmin"];                       
                    }
                }?>" pattern="{1,20}" title="Password cannot exceed 20 digits" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>

            <label>
                <input type="text" class="input" autocomplete = "off" placeholder="Enter new name" name="newNameAdmin" value="<?php 
                $host = "localhost";  
                $user = "root";  
                $password = '';  
                $db_name = "RotiYou";
                $con = mysqli_connect($host, $user, $password, $db_name);
                $sqlInfoAdmin = "SELECT * FROM admin WHERE idAdmin = '$idAdmin'"; 
                $result = $con->query($sqlInfoAdmin);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo $row["name"];                       
                    }
                }?>" pattern="[a-zA-Z\s]{1,20}" title="Name must be filled by characters" required></input><br>
                <div class="line-box">         
                    <div class="line"></div>                            
                </div> 
            </label>

            <div class = "daftar">
                <button class = "buttonKemasKini" type = "submit" name = "updateAdmin">Update</button>
            </div>
            </form>
            <div class = "daftar1">
                <button class = "buttonBalik" onclick="history.back()" name = "return">Return</button>
            </div>
        </div>
        
        
    </body>
</html>