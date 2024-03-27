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
                right: 472px;
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
                width: 400px;
                height:170px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 295px;
                margin-top: 70px;
                padding-top: 0px;
                font-size: 17px;
                top: 110px;
            }
            .buttonUpdate{  
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

            .buttonUpdate:hover {  
                background: #b0a615;  
                color: #ffffff; 
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
            <?php
                $host = "localhost";  
                $user = "root";  
                $password = '';  
                $db_name = "RotiYou";
                $con = mysqli_connect($host, $user, $password, $db_name);
                $sqlInfoAdmin = "SELECT * FROM admin WHERE idAdmin = '$idAdmin'"; 
                $result = $con->query($sqlInfoAdmin);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<table style = 'text-align: center; margin-left:auto; margin-right:auto;  border-spacing: 50px 10px;'>";
                        echo "<tr><th><h3><u>ID Admin</u></h3></th><th><h3><u>Name</u></h3></th></tr>";
                        echo 
                        "<tr>
                        <td>" . $row["idAdmin"]  . "</td>
                        <td>" . $row["name"] . "</td>
                        </tr>";
                        echo "</table>";
                        
                    }
                } else {
                    echo "0 results";
                }
    
            ?>  
 
        <form method="post" action="adminbutton.php">
            <div style="text-align:center; padding-top: 30px;">
                <button class = "buttonUpdate" type = "submit" name = "adminUpdate">Update</button>
            </div>
        </div>        
        </form>
        
    </body>
</html>