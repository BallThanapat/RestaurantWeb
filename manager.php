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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="managerPage.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/JQuery/3.5.1/JQuery.min.js" charset="UTF-8"></script>

    <style>
        <?php include "managerPage.css" ?>
    </style>

    <title>Document</title>
</head>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var staffMenuItem = document.querySelector('.sub-btn');
            var subMenu = document.querySelector('.sub-menu');

            staffMenuItem.addEventListener('click', function() {
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

            return hours + ':' + minutes + ':' + seconds + ' ' + year + '/' + month + '/' + day;
        }

        function updateDateTime() {
            var datetimeElement = document.getElementById('clock-icon');
            datetimeElement.textContent = getCurrentDateTime();
        }

        document.addEventListener('DOMContentLoaded', function() {
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

            <div class="content dashboard" style="display: none;">
                <div class="space-content">
                    <h1>Dashboard</h1>
                    <div class="dashboard-output">
                        <!-- Chart -->
                    </div>
                    <div class="sum">
                        <div class="sum-day">
                            <h2>รายได้ต่อวันสุทธิ</h2>
                        </div>
                        <div class="sum-month">
                            <h2>รายได้ต่อเดือนสุทธิ</h2>
                        </div>

                    </div>

                </div>
            </div>

            <div class="box-manage" style="display: none;">
                <div class="content manage" style="display: none;">
                    <h1>รายละเอียดคำสั่งซื้อ</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>หมายเลขออเดอร์</th>
                                <th>ประเภทคำสั่งซื้อ</th>
                                <th>จำนวนการสั่งซื้อ</th>
                                <th>ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>0001</td>
                                <td>Delivery</td>
                                <td>15 รายการ</td>
                                <td>1500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>0002</td>
                                <td>Self/Pick-up</td>
                                <td>5 รายการ</td>
                                <td>500.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="summarize-day">
                    <div class="count">
                        <h4>จำนวนคำสั่งซื้อ : </h4>
                    </div>
                    <div class="income">
                        <h4>ยอดขายสุทธิ : </h4>
                    </div>
                    <div class="mean-income">
                        <h4>ยอดขายเฉลี่ยต่อลูกค้า : </h4>
                    </div>
                </div>
            </div>

        <div class="box-list-staff" style="display: none;">
            <div class="content list-staff">
                <h2>รายชื่อพนักงาน</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>Email</th>
                            <th>ที่อยู่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>0001</td>
                            <td>Delivery</td>
                            <td>15 รายการ</td>
                            <td>1500.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box-add-staff">
            <div class="content add-staff">
                <div class="head-add-staff">
                    <h2>เพิ่ม-ลบรายชื่อพนักงาน</h2>
                    <button class="btn btn-success">เพิ่มรายชื่อ</button>
                </div>
                <table class="table">
                    <thead>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>Email</th>
                        <th>ที่อยู่</th>
                        <th>สถานะ</th>
                    </thead>
                    <tbody>
                        <th>1</th>
                        <th>AA AA</th>
                        <th>059xxxx</th>
                        <th>asd@gmail.com</th>
                        <th>5 ซอย 9</th>
                        <th><button class="btn btn-danger">ลบรายชื่อ</button></th>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>