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

        function updateCheckboxValue() {
            var checkbox = document.getElementById("recommendCheck");

            if (checkbox.checked) {
                checkbox.value = 1;
            } else {
                checkbox.value = 0;
            }

        }

        function menuList1(menuSelected){
            var dashboard = document.getElementById('dashboard');
            var manage = document.getElementById('manage');
            var list_staff = document.getElementById('list-staff');
            var add_staff = document.getElementById('add-staff');
            var add_menu = document.getElementById('add-menu');
            var add_promotion = document.getElementById('add-promotion');

            dashboard.style.display = 'flex';
            manage.style.display = 'none';
            list_staff.style.display = 'none';
            add_staff.style.display = 'none';
            add_menu.style.display = 'none';
            add_promotion.style.display = 'none';

            if (menuSelected == 'dashboard') {
                dashboard.style.display = 'flex';
            } else if (menuSelected == 'manage') {
                manage.style.display = 'flex';
                dashboard.style.display = 'none';
            } else if (menuSelected == 'listStaff') {
                list_staff.style.display = 'flex';
                dashboard.style.display = 'none';
            } else if (menuSelected == 'addStaff') {
                add_staff.style.display = 'flex';
                dashboard.style.display = 'none';
            } else if (menuSelected == 'addMenu') {
                add_menu.style.display = 'flex';
                dashboard.style.display = 'none';
            } else if (menuSelected == 'addPromotion') {
                add_promotion.style.display = 'flex';
                dashboard.style.display = 'none';
            }
        }
    </script>

    <div class="modal fade" id="addStaff">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มรายชื่อพนักงาน</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="form2">
                        <div class="mb-3">
                            <label for="uName" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="uName" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" />
                        </div>
                        <div class="mb-3">
                            <label for="rPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="rPassword" />
                        </div>
                        <div class="mb-3">
                            <label for="fName" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="fName" />
                        </div>
                        <div class="mb-3">
                            <label for="lName" class="col-form-label">นามสกุล:</label>
                            <input type="text" class="form-control" id="lName" />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">เบอร์โทร:</label>
                            <input type="text" class="form-control" id="phone" />
                        </div>
                        <!-- <div class="mx -->
                        <div class="row">
                            <div class="col">
                                <label for="address-home">บ้านเลขที่</label>
                                <input type="address-home" class="form-control">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="address-province">จังหวัด</label>
                                <input type="address-province" class="form-control">
                            </div>

                            <div class="col">
                                <label for="address-province">อำเภอ</label>
                                <input type="address-province" class="form-control">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="address-province">ตำบล</label>
                                <input type="address-province" class="form-control">
                            </div>

                            <div class="col">
                                <label for="address-province">รหัสไปรษณีย์</label>
                                <input type="address-province" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Close</button>
                    <button onclick="" type="button" class="btn btn-success mt-3">Add-staff</button>
                </div>

            </div>
        </div>
    </div>

    <div class="adminmain">
        <div class="sidebar">
            <div class="head-bar">KhunGame-Restaurant</div>
            <div class="datetime" id="datetime">
                <i class="fa-regular fa-clock"></i>
                <span id="clock-icon"></span>
            </div>
            <div class="menu">
                <div class="item"><a onclick="menuList1('dashboard')"><i class="fa-solid fa-desktop"></i>DASHBOARD</a></div>
                <div class="item"><a onclick="menuList1('manage')"><i class="fa-regular fa-file"></i>MANAGE</a></div>
                <div class="item">
                    <a class="sub-btn"><i class="fa-regular fa-user"></i>STAFF <i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu" id="sub-menu">
                        <a class="sub-item" onclick="menuList1('listStaff')"><span>All Staff</span></a>
                        <a class="sub-item" onclick="menuList1('addStaff')"><span>Add Staff</span></a>
                    </div>
                </div>
                <div class="item"><a onclick="menuList1('addMenu')"><i class="fa-solid fa-utensils"></i>MENU</a></div>
                <div class="item"><a onclick="menuList1('addPromotion')"><i class="fa-solid fa-bullhorn"></i>ANNOUNCEMENT</a></div>
                <div class="item"><a onclick=""><i class="fa-solid fa-arrow-right-from-bracket"></i>LOG OUT</a></div>
            </div>
        </div>

        <div class="outputspace">
            <div class="mainbar">
                <div class="account2">ADMIN1</div>
            </div>

            <div class="content dashboard" id="dashboard">
                <div class="space-content">
                    <h1>Dashboard</h1>
                    <div class="dashboard-output">
                        <!-- Chart -->
                    </div>
                    <div class="sum">
                        <div class="sum-day">
                            <h4>รายได้ต่อวันสุทธิ</h4>
                        </div>
                        <div class="sum-month">
                            <h4>รายได้ต่อเดือนสุทธิ</h4>
                        </div>

                    </div>

                </div>
            </div>

            <div class="box-manage" id="manage">
                <div class="content manage">
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

            <div class="box-list-staff" id="list-staff">
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

            <div class="box-add-staff" id="add-staff">
                <div class="content add-staff">
                    <div class="head-add-staff">
                        <h2>เพิ่ม-ลบรายชื่อพนักงาน</h2>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStaff">เพิ่มรายชื่อ</button>
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
                            <th><button class="btn btn-danger" style="margin: 0 auto;">ลบรายชื่อ</button></th>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box-add-menu" id="add-menu">
                <div class="content add-menu" >
                    <h2>เพิ่มเมนูอาหาร</h2>
                    <form action="" id="form-add-menu">
                        <div class="row">
                            <div class="col">
                                <label for="food" class="form-label">ชื่ออาหาร :</label>
                                <input type="food" class="form-control" id="food" name="food" placeholder="กรอกชื่ออาหาร">
                            </div>

                            <div class="col">
                                <label for="typeFood" class="form-label">ประเภทอาหาร :</label>
                                <select class="form-select" id="type-food" name="type-food">
                                    <option value="NULL" selected>----- เลือกประเภทอาหาร -----</option>
                                    <option value="soup">เมนูต้ม</option>
                                    <option value="yum">เมนูยำ</option>
                                    <option value="fried">เมนูทอด</option>
                                    <option value="seafood">อาหารทะเล</option>
                                    <option value="steak">สเต็ก</option>
                                    <option value="dessert">ของหวาน</option>
                                    <option value="drink">เครื่องดื่ม</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="price" class="form-label">ราคา :</label>
                                <input type="text" class="form-control" id="price" placeholder="กรอกราคาอาหาร" style="width: 20%;"><br>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="foodDetail" class="form-label">รายละเอียด :</label>
                                <textarea class="form-control" name="foodDetail" id="foodDetail" cols="30" rows="10"></textarea><br>
                                <label for="recommendCheck" class="form-label">Recommend</label>
                                <input class="form-check-input" type="checkbox" id="recommendCheck" name="recommendCheck" value="1" onclick="updateCheckboxValue()">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="formFile" class="form-label">แนบไฟล์รูปภาพ</label>
                            <input class="form-control" type="file" id="formFile" accept=".png, .webp, .jpeg" style="width: 30%;">
                        </div><br>

                        <div class="btn">
                            <button class="btn btn-success">Add Menu</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="box-add-promotion" id="add-promotion">
                <div class="content add-promotion">
                    <h2>เพิ่มโปรโมชั่น/โพสต์</h2>
                    <form action="" id="form-add-promotion">
                        <div class="row">
                            <div class="col">
                                <label for="promotion" class="form-label">ชื่อโปรโมชั่น/โพสต์ :</label>
                                <input type="promotion" class="form-control" id="promotion" name="promotion" placeholder="กรอกชื่อโปรโมชั่น">
                            </div>

                            <div class="col">
                                <label for="typeFood" class="form-label">ขั้นต่ำ :</label>
                                <input type="promotion" class="form-control" id="promotion" name="promotion" value="0">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="sales-price" class="form-label">ลดราคา :</label>
                                <input type="text" class="form-control" id="sales-price" placeholder="" style="width: 20%;"><br>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="foodDetail" class="form-label">รายละเอียด :</label>
                                <textarea class="form-control" name="foodDetail" id="foodDetail" cols="30" rows="10" placeholder="รายละเอียดของโปรโมชั่น...."></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="formFile" class="form-label">แนบไฟล์รูปภาพ</label>
                            <input class="form-control" type="file" id="formFile" accept=".png, .webp, .jpeg" style="width: 30%;">
                        </div><br>

                        <div class="btn">
                            <button class="btn btn-success">Add-Promotion</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</body>

</html>