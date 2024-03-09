<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <link
        href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&family=Permanent+Marker&display=swap"
        rel="stylesheet">

    <!-- Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="managerPage.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/JQuery/3.5.1/JQuery.min.js" charset="UTF-8"></script>

    <style>
        <?php
        include "managerPage.css";
        include "staff.css";
        ?>
    </style>

</head>

<body>
    <script>
        function clickMenu(menuType) {
            var order01 = document.getElementById('order');
            var payment01 = document.getElementById('payment');
            var order_history01 = document.getElementById('order-history');

            if (menuType == "order") {
                order01.style.display = 'block';
                payment01.style.display = 'none';
                order_history01.style.display = 'none';
            } else if (menuType == "payment") {
                order01.style.display = 'none';
                payment01.style.display = 'block';
                order_history01.style.display = 'none';
            } else if (menuType == "order_history") {
                order01.style.display = 'none';
                payment01.style.display = 'none';
                order_history01.style.display = 'block';
            }
        }

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

        document.addEventListener('DOMContentLoaded', function () {
            updateDateTime();
            setInterval(updateDateTime, 1000);
        });

        function viewPay(clickImg) {

            // var img = document.getElementById('img-payment');
            var modal_img = document.getElementById('modalBodyContent');
            var delImg = modal_img.querySelector('img');
            // console.log(img);
            // console.log(view_payment);
            if (delImg) {
                delImg.remove();
            }
            var imgClone = clickImg.cloneNode(true);
            modal_img.appendChild(imgClone);
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLabel">หลักฐานการชำระเงิน</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                    <!-- ร -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal Info -->
    <div class="modal fade" id="infoModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body modal-body-info" id="modal-body-info" style="width: 100%;margin-left: 10px;">
                    <div class="row">
                        <div class="col">
                            <h5>ชื่อ: นายธีรภัทร์ สังข์สี</h5>
                        </div>
                        <div class="col">
                            <h5>เบอร์โทร : 095-xxxxx-xxxx</h5>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <p>ที่อยู่ Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci provident eum
                                Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>จังหวัด: กรุงเทพมหานคร</p>
                        </div>
                        <div class="col">
                            <p>อำเภอ/แขวง: ลาดบัง</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>ตำบล/เขต: ลาดบัง</p>
                        </div>
                        <div class="col">
                            <p>รหัสไปรษณีย์: 85000</p>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- --------- -->

    <div class="adminmain">
        <div class="sidebar">
            <div class="head-bar">KhunGame-Restaurant</div>
            <div class="datetime" id="datetime">
                <i class="fa-regular fa-clock"></i>
                <span id="clock-icon"></span>
            </div>
            <div class="menu">
                <div class="item" onclick="clickMenu('order')"><a><i class="fa-solid fa-user-pen"></i></i>ORDER</a>
                </div>
                <div class="item" onclick="clickMenu('payment')"><a><i
                            class="fa-solid fa-cash-register"></i>CONFIRM-ORDER</a></div>
                <!-- <div class="item">
                    <a class="sub-btn"><i class="fa-regular fa-user"></i>STAFF <i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu" id="sub-menu">
                        <a class="sub-item" onclick=""><span>All Staff</span></a>
                        <a class="sub-item" onclick=""><span>Add Staff</span></a>
                    </div>
                </div> -->
                <div class="item"><a><i class="fa-solid fa-arrow-right-from-bracket"></i>LOG OUT</a></div>
            </div>
        </div>

        <div class="outputspace">
            <div class="mainbar">
                <div class="account-staff">Staff1</div>
            </div>
            <div class="content" id="order"> <!--  -->
                <h1>รายการคำสั่งซื้อ</h1>
                <div class="box-list-order">
                    <div class="order">
                        <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                            <h6>หมายเลขคำสั่งซื้อ</h6>
                            <h1>0001</h1>
                        </div>
                        <div class="content-order order-detail"> <!-- รายการอาหาร -->
                            <h6>รายการอาหาร</h6>
                            <p>ข้าวไข่เจียว x2 | กะเพราหมู x2 | น้ำเปล่า x2</p>
                        </div>

                        <div class="content-order order-img-payment" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                            <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                        </div>

                        <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#infoModal">
                            <h5>Delivery</h5> <!-- ประเภทของการสั่งซื้อ -->
                        </div>

                        <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                            <h4>Total</h4>
                            <h5>120.00฿</h5>
                        </div>
                        <div class="content-order order-btn">
                            <button class="btn btn-success">Accept</button>
                            <button class="btn btn-danger mt-2">Decline</button>
                        </div>
                    </div>

                    <div class="order">
                        <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                            <h6>หมายเลขคำสั่งซื้อ</h6>
                            <h1>0002</h1>
                        </div>
                        <div class="content-order order-detail"> <!-- รายการอาหาร -->

                        </div>

                        <div class="content-order order-img-payment" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                            <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                        </div>

                        <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#infoModal"
                            style="cursor: pointer;">
                            <h5>Self/Pick-up</h5> <!-- ประเภทของการสั่งซื้อ -->
                        </div>

                        <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                            <h4>Total</h4>
                            <h5>299.00฿</h5>
                        </div>
                        <div class="content-order order-btn">
                            <button class="btn btn-success">Accept</button>
                            <button class="btn btn-danger mt-2">Decline</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="content" id="payment">
                <h1>ยืนยันรายการสั่งซื้อ</h1>
                <div class="status-payment">
                    <div class="box-list-order">
                        <div class="order">
                            <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                                <h6>หมายเลขคำสั่งซื้อ</h6>
                                <h1>0001</h1>
                            </div>
                            <div class="content-order order-detail"> <!-- รายการอาหาร -->
                                <h6>รายการอาหาร</h6>
                                <p>ข้าวไข่เจียว x2 | กะเพราหมู x2 | น้ำเปล่า x2</p>
                            </div>

                            <div class="content-order order-img-payment" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                                <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                            </div>

                            <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#infoModal">
                                <h5>Delivery</h5> <!-- ประเภทของการสั่งซื้อ -->
                            </div>

                            <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                                <h4>Total</h4>
                                <h5>120.00฿</h5>
                            </div>
                            <div class="content-order order-btn">
                                <button class="btn btn-success">Confirm</button>
                            </div>
                        </div>

                        <div class="order">
                            <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                                <h6>หมายเลขคำสั่งซื้อ</h6>
                                <h1>0002</h1>
                            </div>
                            <div class="content-order order-detail"> <!-- รายการอาหาร -->

                            </div>

                            <div class="content-order order-img-payment" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                                <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                            </div>

                            <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#infoModal"
                                style="cursor: pointer;">
                                <h5>Self/Pick-up</h5> <!-- ประเภทของการสั่งซื้อ -->
                            </div>

                            <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                                <h4>Total</h4>
                                <h5>299.00฿</h5>
                            </div>
                            <div class="content-order order-btn">
                                <button class="btn btn-success">Confirm</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="content" id="order-history"> <!--  -->
                <h1>รายการคำสั่งซื้อ</h1>
                <div class="box-list-order">
                    <div class="order">
                        <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                            <h6>หมายเลขคำสั่งซื้อ</h6>
                            <h1>0199</h1>
                        </div>
                        <div class="content-order order-detail"> <!-- รายการอาหาร -->
                            <h6>รายการอาหาร</h6>
                            <p>ข้าวไข่เจียว x2 | กะเพราหมู x2 | น้ำเปล่า x2</p>
                        </div>
                        <div class="content-order order-type">
                            <h5>Delivery</h5> <!-- ประเภทของการสั่งซื้อ -->
                        </div>
                        <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                            <h4>Total</h4>
                            <h5>120.00฿</h5>
                        </div>
                        <div class="content-order order-btn">
                            <!-- <button class="btn btn-success">Accept</button>
                            <button class="btn btn-danger mt-2">Decline</button> -->
                        </div>
                    </div>

                    <div class="order">
                        <div class="content-order order-num"> <!-- หมายเลขคำสั่งซื้อ -->
                            <h6>หมายเลขคำสั่งซื้อ</h6>
                            <h1>0200</h1>
                        </div>
                        <div class="content-order order-detail"> <!-- รายการอาหาร -->

                        </div>
                        <div class="content-order order-type">
                            <h5>Self/Pick-up</h5> <!-- ประเภทของการสั่งซื้อ -->
                        </div>
                        <div class="content-order order-price"> <!-- ราคารวมสินค้า -->
                            <h4>Total</h4>
                            <h5>299.00฿</h5>
                        </div>
                        <div class="content-order order-btn">
                            <!-- <button class="btn btn-success">Accept</button>
                            <button class="btn btn-danger mt-2">Decline</button> -->
                        </div>
                    </div>

                </div>
            </div>


        </div>
</body>

</html>