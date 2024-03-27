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
            </style>
            <h1>PENGURUSAN <br> ROTI YOU</h1>
            <img src="rotiYouImage.jfif"width="235" height="300">
            <h2>Login Page</h2>
            
                <button class="button" onclick="goSeller()"> Seller </button>
                <button class="button" onclick="goAdmin()">Admin</button>          
        </div>
    </body>
</html>