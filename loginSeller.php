<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script>
            function goAdmin() {
                document.location = 'loginadmin.php';
            }
            function goSeller() {
                document.location = 'loginseller.php'; 
            }
        </script>
    </head>
    <body>
        <div style="text-align:center; margin-top: 30px;">
        <style>
                body {
                    background-image: url('bg.jpg');
                }
                .button {
                    background-color: #3e8e72;  
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    
                }
                .button:hover {background-color: #3e8e41;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);}

                .button:active {
                    background-color: #3e8e41;
                    box-shadow: 0 5px #666;
                    transform: translateY(4px);
                }
                .button2 {background-color: #3e8e72; color: white;} 
                .button3 {background-color: #3e8e72; color: white;}
                #rcorners2 {
                    border-radius: 25px;
                    border: 2px solid #818b96;
                    padding: 40px; 
                    padding-top: 15px;
                    width: 350px;
                    height:155px;  
                    margin: auto;
                    background: #efefef;
                }
                label {  
                display: block;  
                position: relative;  
                margin: 20px 10px; 
                }

                .label-txt {  
                    position: absolute;  
                    top: -1.6em;  
                    padding: 10px;  
                    font-family: sans-serif;  
                    font-size: .8em;  
                    letter-spacing: 1px;  
                    color: rgb(120,120,120);  
                    transition: ease .3s; 
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


                button {  
                    display: inline-block; 
                    padding: 12px 24px;  
                    background: rgb(220,220,220);  
                    font-weight: bold;  
                    color: rgb(120,120,120);  
                    border: none;  outline: none;  
                    border-radius: 3px;  
                    cursor: pointer;  
                    transition: ease .3s; 
                }  

                button:hover {  
                    background: #8BC34A;  
                    color: #ffffff; 
                }


            </style>
            <h1>PENGURUSAN <br> ROTI YOU</h1>
            <img src="rotiYouImage.jfif"width="235" height="300">
            <h2>Login Page</h2>
                <button class="button" onclick="goSeller()"> Seller </button>
                <button class="button" onclick="goAdmin()">Admin</button>
                <form method="post" action="login.php">
                <div id="rcorners2">
                    <label>
                        <input type="text" class="input" autocomplete = "off" placeholder="Enter ID Seller" name="IDSeller" pattern="[S]{1}[0-9]{1,2}" 
                        title="ID Seller must begin with 'S' and not exceed 2 digits number" maxlength="3" required></input><br>
                        <div class="line-box">         
                            <div class="line"></div>                            
                        </div> 
                    </label>   

                    <label> 
                        <input type="password" class="input" autocomplete = "off" placeholder="Enter password" name="passwordSeller" required></input><br>
                        <div class="line-box">         
                            <div class="line"></div>                            
                        </div> 
                    </label>      
                    <button name = "loginSeller">Log Masuk</button>
                </div>
                <br><br><br>
            </form>       
   
        </div>
    </body>
</html>

