<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Header-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Font Common-text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="managerPage.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/JQuery/3.5.1/JQuery.min.js" charset="UTF-8"></script>
    
    <script><?php include "managerPage.css" ?></script>
    
    <title>Document</title>
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
        var staffMenuItem = document.querySelector('.sub-btn');
        var subMenu = document.querySelector('.sub-menu');

        staffMenuItem.addEventListener('click', function(){
            subMenu.style.display = (subMenu.style.display === "block") ? "none" : "block";
            staffMenuItem.classList.toggle('active');
        });
    });

    function getCurrentDateTime() {
            var currentDateTime = new Date();
            var year = currentDateTime.getFullYear();
            var month = (currentDateTime.getMonth() + 1).toString().padStart(2, '0');
            var day = currentDateTime.getDate().toString().padStart(2, '0');
            var hours = currentDateTime.getHours().toString().padStart(2, '0');
            var minutes = currentDateTime.getMinutes().toString().padStart(2, '0');
            var seconds = currentDateTime.getSeconds().toString().padStart(2, '0');
            
            return hours + ':' + minutes + ':' + seconds + ' '+ year + '/' + month + '/' + day;
        }

        function updateDateTime() {
            var datetimeElement = document.getElementById('clock-icon');
            datetimeElement.textContent = getCurrentDateTime();
        }

        document.addEventListener('DOMContentLoaded', function(){
            updateDateTime();
            setInterval(updateDateTime, 1000);
        });

    </script>
    <div class="adminmain">
        <div class="sidebar">
            <div class="head-bar">KhunGame-Restaurant</div>
            <div class="datetime" id="datetime">
                <i class="fa-regular fa-clock"></i>
                <span id="clock-icon"></span>
            </div>
            <div class="menu">
                <div class="item"><a href=""><i class="fa-solid fa-desktop" onclick=""></i>DASHBOARD</a></div>
                <div class="item"><a href=""><i class="fa-regular fa-file" onclick=""></i>MANAGE</a></div>
                <div class="item">
                    <a class="sub-btn"><i class="fa-regular fa-user"></i>STAFF <i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu" id="sub-menu">
                        <a class="sub-item" onclick=""><span>All Staff</span></a>
                        <a class="sub-item" onclick=""><span>Add Staff</span></a>
                    </div>
                </div>
                <div class="item" onclick=""><a href=""><i class="fa-solid fa-utensils"></i>MENU</a></div>
                <div class="item" onclick=""><a href=""><i class="fa-solid fa-bullhorn"></i>ANNOUNCEMENT</a></div>
            </div>
        </div>

        <div class="outputspace">
            <div class="mainbar">
                <div class="account2">ADMIN1</div>
            </div>
            <div class="content">
                Dashboard
            </div>
        </div>
    </div>
</body>
</html>