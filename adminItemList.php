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
                width: 750px;
                height:400px;  
                margin: auto;
                background: #efefef;
                -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
                box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
                position: absolute;
                right: 100px;
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
                width: 90px;
                height: 25px;
                cursor: pointer;  
                transition: ease .3s; 
            }
            .buttonDelete:hover {  
                background: #994040;  
                color: #ffffff; 
            }
            .form-popup {
            display: none;
            border-radius: 8px;
            border: 1.5px solid #818b96;
            padding: 15px; 
            width: 200px;
            height:70px;  
            margin: auto;
            background: #efefef;
            -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1); 
            box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
            position: absolute;
            right: 215px;
            top: 150px;
            margin-top: 0px;
            padding-bottom: 0px;
            font-size: 17px;
            }

            /* Add styles to the form container */
            .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
            background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
            opacity: 1;
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
                <h2>Item List</h2>
            </div>
        </div>
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
        <div class ="isi"> 
        <div class="search">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Find item name.." title="Type in a name">
        </div>
        <div style="height:370px; overflow-y: scroll;">
            <?php
                $i = 1;
                echo "<table style = 'text-align: center; margin-left:auto; margin-right:auto;  border-spacing: 40px 10px;' id = 'table'>";
                echo "<tr><th><h3><u>Bil.</u></h3></th><th><h3><u>ID Item</u></h3></th><th><h3><u>Item Name</u></h3></th>
                <th><h3><u>Original Price</u></h3></th><th><h3><u>Edit</u></h3></th></tr>";
                while ($row = mysqli_fetch_array($itemList))
                {
                    $idItem = htmlspecialchars($row['idItem']);
                    echo 
                    "<tr>
                    <td>" . $i . ". " . "</td>
                    <td>"  . htmlspecialchars($row['idItem'])  . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['price']) . "</td>
                    <form method='get' action='adminEditItemPage.php'>
                    <input type='hidden' name='idItem' value='$idItem'>
                    <td>" . "<button class = 'buttonDelete' name = '$idItem' > Edit </button>" . "</td> </input></form>
                    </tr>";
                    ++$i;
                    
                }
                echo "</table>";    
            ?>        
               
        </div>
        </form>
        <form method="post" action="adminbutton.php">
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" type = "submit" name = "adminRegisterItem">Add Item</button>
                <button class = "buttonDaftar" type = "submit" name = "adminEditItem">Promotion</button>
            </div>
        </form>
        </div>
        
    </body>
</html>