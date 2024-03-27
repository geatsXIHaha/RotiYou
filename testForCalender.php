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
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
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
                position: absolute;
                right: 350px;  
            }
            
            .all{
                margin: 0px;
                padding: 0;
                box-sizing: border-box;
                font-family: 'poppins', sans-serif;
            }
            
        .wrapper{
        width: 450px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        .wrapper header{
        display: flex;
        align-items: center;
        padding: 25px 30px 0px;
        justify-content: space-between;
        }
        header .icons{
        display: flex;
        }
        header .icons span{
        height: 38px;
        width: 38px;
        margin: 0 1px;
        cursor: pointer;
        color: #878787;
        text-align: center;
        line-height: 38px;
        font-size: 1.9rem;
        user-select: none;
        border-radius: 50%;
        }
        .icons span:last-child{
        margin-right: -10px;
        }
        header .icons span:hover{
        background: #f2f2f2;
        }
        header .current-date{
        font-size: 1.45rem;
        font-weight: 500;
        }
        .calendar{
        padding: 10px;
        }
        .calendar ul{
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        text-align: center;
        }
        .calendar .days{
        margin-bottom: 20px;
        }
        .calendar li{
        color: #333;
        width: calc(100% / 7);
        font-size: 1.07rem;
        }
        .calendar .weeks li{
        font-weight: 500;
        cursor: default;
        }
        .calendar .days li{
        z-index: 1;
        cursor: pointer;
        position: relative;
        margin-top: 30px;
        }
        .days li.inactive{
        color: #aaa;
        }
        .days li.active{
        color: #fff;
        }
        .days li::before{
        position: absolute;
        content: "";
        left: 50%;
        top: 50%;
        height: 40px;
        width: 40px;
        z-index: -1;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        }
        .days li.active::before{
        background: #9B59B6;
        }
        .days li:not(.active):hover::before{
        background: #f2f2f2;
        }
        .button5 {border-radius: 100%;}
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
        <div class ="all">
        <input type = "date" id = "datepicker">
            <div class="wrapper">
                <header>
                    <p class="current-date"> September 2024</p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded"><ion-icon name="arrow-dropleft-circle"></ion-icon></span>
                        <span id="next" class="material-symbols-rounded"><ion-icon name="arrow-dropright-circle"></ion-icon></span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
            </div>          
        </div>
        <script>
            const daysTag = document.querySelector(".days"),
            currentDate = document.querySelector(".current-date"),
            prevNextIcon = document.querySelectorAll(".icons span");
            // getting new date, current year and month
            let date = new Date(),
            currYear = date.getFullYear(),
            currMonth = date.getMonth();
            // storing full name of all months in array
            const months = ["January", "February", "March", "April", "May", "June", "July",
                        "August", "September", "October", "November", "December"];
            const renderCalendar = () => {
                let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
                let liTag = "";
                for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
                    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
                }
                for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
                    // adding active class to li if the current day, month, and year matched
                    let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                                && currYear === new Date().getFullYear() ? "active" : "";
                    liTag += `<li class="${isToday}"><form method="get" action="adminReport.php"><button class = "button5" type = "submit" name = "${i}" value ="${i}">${i}</button></form></li>`;
                }
                for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
                }
                currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
                daysTag.innerHTML = liTag;
            }
            renderCalendar();
            prevNextIcon.forEach(icon => { // getting prev and next icons
                icon.addEventListener("click", () => { // adding click event on both icons
                    // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                    if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                        // creating a new date of current year & month and pass it as date value
                        date = new Date(currYear, currMonth, new Date().getDate());
                        currYear = date.getFullYear(); // updating current year with new date year
                        currMonth = date.getMonth(); // updating current month with new date month
                    } else {
                        date = new Date(); // pass the current date as date value
                    }
                    renderCalendar(); // calling renderCalendar function
                });
            });
            $(function() {
            $( "#datepicker" ).datepicker();
            });
        </script>
        
        <form method="post" action="adminbutton.php">
            <div style="text-align:center; padding-top: 18px;">
                <button class = "buttonDaftar" type = "submit" name = "adminRegisterItem">Add Item</button>
                <button class = "buttonDaftar" type = "submit" name = "adminEditItem">Edit Price</button>
            </div>
           
        </form>
        </div>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>