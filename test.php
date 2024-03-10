<?php
session_start();
require_once('menuController.php');
$db_handle = new MenuControll();

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_GET["foodDetail"]) && !empty($_GET["quantity"])) {
                $productByDetail = $db_handle->runQuery("SELECT * FROM menu where foodDetail='" . $_GET["foodDetail"] . "'");
                $itemArray = array(
                    $productByDetail[0]["foodDetail"] => (
                        array(
                            'foodID' => $productByDetail[0]["foodID"],
                            'foodName' => $productByDetail[0]["foodName"],
                            'foodDetail' => $productByDetail[0]["foodDetail"],
                            'quantity' => $_GET["quantity"],
                            'price' => $productByDetail[0]["price"],
                            'picture' => $productByDetail[0]["picture"]
                        )
                    )
                );

                if (!empty($_SESSION["cart_item"])) {
                    if (array_key_exists($productByDetail[0]["foodDetail"], $_SESSION["cart_item"])) {
                        $_SESSION["cart_item"][$productByDetail[0]["foodDetail"]]["quantity"] += $_GET["quantity"];
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove";
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["foodDetail"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty";
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
        <?php
        include "menu.css";
        include "managerPage.css";
        include "staff.css";
        ?>
    </style>

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

    <!-- User Authentication -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="userAuthen.js"></script>

    



</head>

<body>
    <script>
        function clickMenu(menuType) {
            var order01 = document.getElementById('order');
            var payment01 = document.getElementById('payment');
            var order_history01 = document.getElementById('order-history');
            var menu = document.getElementById('menu');

            if (menuType == "order") {
                order01.style.display = 'block';
                payment01.style.display = 'none';
                order_history01.style.display = 'none';
                menu = 'none';
            } else if (menuType == "payment") {
                order01.style.display = 'none';
                payment01.style.display = 'block';
                order_history01.style.display = 'none';
                menu = 'none';
            } else if (menuType == "order_history") {
                order01.style.display = 'none';
                payment01.style.display = 'none';
                order_history01.style.display = 'block';
                menu = 'none';
            } else if (menuType == "menu") {
                order01.style.display = 'none';
                payment01.style.display = 'none';
                order_history01.style.display = 'none';
                menu = 'block';
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
        document.addEventListener("DOMContentLoaded", function () {
            var radio1 = document.getElementById("btnradio1");
            var radio2 = document.getElementById("btnradio2");
            var form1 = document.getElementById("form1");
            var form2 = document.getElementById("form2");
            var buttonBar1 = document.getElementById("buttonBar1");
            var buttonBar2 = document.getElementById("buttonBar2");

            radio1.addEventListener("change", function () {
                if (radio1.checked) {
                    form1.style.display = "block";
                    form2.style.display = "none";
                    buttonBar1.style.backgroundColor = "orange";
                    buttonBar2.style.backgroundColor = "white";
                    buttonBar1.style.color = "white";
                    buttonBar2.style.color = "black";
                }
            });

            radio2.addEventListener("change", function () {
                if (radio2.checked) {
                    form1.style.display = "none";
                    form2.style.display = "block";
                    buttonBar2.style.backgroundColor = "orange";
                    buttonBar1.style.backgroundColor = "white";
                    buttonBar1.style.color = "black";
                    buttonBar2.style.color = "white";
                }
            });
        });

        function showMenu(menuType) {
            var menuBarTopic = document.getElementById("menu-bar-topic");
            var recommend = document.getElementById("row-recommend-menu");
            var fried = document.getElementById("row-fried-menu");
            var soup = document.getElementById("row-soup-menu");
            var seafood = document.getElementById("row-seafood-menu");
            var steak = document.getElementById("row-steak-menu");
            var dessert = document.getElementById("row-dessert-menu");
            var drink = document.getElementById("row-drink-menu");

            if (menuType == "recommend") {
                menuBarTopic.innerHTML = "<h2> เมนูแนะนำ </h2>";
                recommend.style.display = "flex";
                fried.style.display = "none";
                soup.style.display = "none";
                seafood.style.display = "none";
                steak.style.display = "none";
                dessert.style.display = "none";
                drink.style.display = "none";
            } else if (menuType == "fried") {
                menuBarTopic.innerHTML = "<h2> เมนูทอด </h2>";
                recommend.style.display = "none";
                fried.style.display = "flex";
                soup.style.display = "none";
                seafood.style.display = "none";
                steak.style.display = "none";
                dessert.style.display = "none";
                drink.style.display = "none";
            } else if (menuType == "soup") {
                menuBarTopic.innerHTML = "<h2> เมนูยำ/ต้ม </h2>";
                recommend.style.display = "none";
                fried.style.display = "none";
                soup.style.display = "flex";
                seafood.style.display = "none";
                steak.style.display = "none";
                dessert.style.display = "none";
                drink.style.display = "none";
            } else if (menuType == "seafood") {
                menuBarTopic.innerHTML = "<h2> อาหารทะเล </h2>";
                recommend.style.display = "none";
                fried.style.display = "none";
                soup.style.display = "none";
                seafood.style.display = "flex";
                steak.style.display = "none";
                dessert.style.display = "none";
                drink.style.display = "none";
            } else if (menuType == "steak") {
                menuBarTopic.innerHTML = "<h2> สเต็ก/เนื้อ </h2>";
                recommend.style.display = "none";
                fried.style.display = "none";
                soup.style.display = "none";
                seafood.style.display = "none";
                steak.style.display = "flex";
                dessert.style.display = "none";
                drink.style.display = "none";
            } else if (menuType == "dessert") {
                menuBarTopic.innerHTML = "<h2> ของหวาน </h2>";
                recommend.style.display = "none";
                fried.style.display = "none";
                soup.style.display = "none";
                seafood.style.display = "none";
                steak.style.display = "none";
                dessert.style.display = "flex";
                drink.style.display = "none";
            } else if (menuType == "drink") {
                menuBarTopic.innerHTML = "<h2> เครื่องดื่ม </h2>";
                recommend.style.display = "none";
                fried.style.display = "none";
                soup.style.display = "none";
                seafood.style.display = "none";
                steak.style.display = "none";
                dessert.style.display = "none";
                drink.style.display = "flex";
            }
        }

        function addToCart(foodDetail) {
            var quantity = document.getElementById("quantity_" + foodDetail).value;
            var xhr = new XMLHttpRequest();
            $('.modal-cart').load(location.href + ' .modal-cart');
            xhr.open("POST", "menu.php?action=add&foodDetail=" + foodDetail + "&quantity=" + quantity, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert("เพิ่มสินค้าสำเร็จ");
                }
            };
            xhr.send();
        }

        function deleteItem(foodDetail) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "menu.php?action=remove&foodDetail=" + foodDetail, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $('.modal-cart').load(location.href + ' .modal-cart');
                    alert("ลบสำเร็จ");
                }
            };
            xhr.send();
        }

        function clear_cart() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "menu.php?action=empty", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $('.modal-cart').load(location.href + ' .modal-cart');
                    alert("ล้างตะกร้าสำเร็จ");
                }
            };
            xhr.send(); // ส่งพารามิเตอร์ foodDetail และ quantity ไปยัง menu.php
        }

        function addNum(foodDetail) {
            var inputElement = document.getElementById("quantity_" + foodDetail);
            var count = parseInt(inputElement.value);
            count++;
            inputElement.value = count;
        }

        function minusNum(foodDetail) {
            var inputElement = document.getElementById("quantity_" + foodDetail);
            var count = parseInt(inputElement.value);
            if (count > 1) { // Ensure count doesn't go below 1
                count--;
                inputElement.value = count;
            }
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
                <div class="item" onclick="clickMenu('menu')"><a><i class="fa-solid fa-cash-register"></i>Menu</a></div>
                <!-- <div class="item">
                    <a class="sub-btn"><i class="fa-regular fa-user"></i>STAFF <i class="fas fa-angle-right dropdown"></i></a>
                    <div class="sub-menu" id="sub-menu">
                        <a class="sub-item" onclick=""><span>All Staff</span></a>
                        <a class="sub-item" onclick=""><span>Add Staff</span></a>
                    </div>
                </div> -->
                <div class="item" onclick="gotologout('staff')"><a><i
                            class="fa-solid fa-arrow-right-from-bracket"></i>LOG OUT</a></div>
            </div>
        </div>

        <div class="outputspace" id="outputspace">
            <div class="mainbar">
                <div class="account-staff">
                    <?php
                    $username = $_SESSION['username'];
                    echo $username;
                    ?>
                </div>
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

            <div class="content" id="menu">
                <div class="menu-bar test1">
                    <div class="menu-box-bar" id="recomm-menu" onclick="showMenu('recommend')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/recommend.png" alt="" />
                        </div>
                        <div class="menu-box-bar-content">เมนูแนะนำ</div>
                    </div>

                    <div class="menu-box-bar" id="fried-menu" onclick="showMenu('fried')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/friedFood.png" alt="" />
                        </div>
                        <div class="menu-box-bar-content">เมนูทอด</div>
                    </div>

                    <div class="menu-box-bar" id="soup-menu" onclick="showMenu('soup')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/Tomyumkung4.png" alt="" />
                        </div>
                        <div class="menu-box-bar-content">ยำ/ต้มยำ</div>
                    </div>
                    <div class="menu-box-bar" id="seafood-menu" onclick="showMenu('seafood')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/Seafood2.png" alt="" id="pic-sea" />
                        </div>
                        <div class="menu-box-bar-content">อาหารทะเล</div>
                    </div>
                    <div class="menu-box-bar" id="steak-menu" onclick="showMenu('steak')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/Steak.png" alt="" id="pic-steak" />
                        </div>
                        <div class="menu-box-bar-content">สเต็ก</div>
                    </div>
                    <div class="menu-box-bar" id="dessert" onclick="showMenu('dessert')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/dessert2.png" alt="" />
                        </div>
                        <div class="menu-box-bar-content">ของหวาน</div>
                    </div>
                    <div class="menu-box-bar" id="drink" onclick="showMenu('drink')">
                        <div class="menu-box-bar-image">
                            <img src="Image_inventory/Menu/drinks2.png" alt="" id="pic-drink" />
                        </div>
                        <div class="menu-box-bar-content">เครื่องดื่ม</div>
                    </div>
                </div>

                <div class="swiper test2">
                    <div class="swiper-wrapper menu-bar">
                        <div class="swiper-slide menu-box-bar" id="recomm-menu" onclick="showMenu('recommend')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/recommend.png" alt="" />
                            </div>
                            <div class="menu-box-bar-content">เมนูแนะนำ</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="fried-menu" onclick="showMenu('fried')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/friedFood.png" alt="" />
                            </div>
                            <div class="menu-box-bar-content">เมนูทอด</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="soup-menu" onclick="showMenu('soup')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/Tomyumkung4.png" alt="" />
                            </div>
                            <div class="menu-box-bar-content">ยำ/ต้มยำ</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="seafood-menu" onclick="showMenu('seafood')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/Seafood2.png" alt="" id="pic-sea" />
                            </div>
                            <div class="menu-box-bar-content">อาหารทะเล</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="steak-menu" onclick="showMenu('steak')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/Steak.png" alt="" id="pic-steak" />
                            </div>
                            <div class="menu-box-bar-content">สเต็ก</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="dessert" onclick="showMenu('dessert')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/dessert2.png" alt="" />
                            </div>
                            <div class="menu-box-bar-content">ของหวาน</div>
                        </div>
                        <div class="swiper-slide menu-box-bar" id="drink" onclick="showMenu('drink')">
                            <div class="menu-box-bar-image">
                                <img src="Image_inventory/Menu/drinks2.png" alt="" id="pic-drink" />
                            </div>
                            <div class="menu-box-bar-content">เครื่องดื่ม</div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>


                <div class="menu-bar-recommend" id="menu-bar-topic">
                    <h2>เมนูแนะนำ</h2>
                </div>

                <!-- Swiper JS -->
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                <!-- Initialize Swiper -->
                <script>

                    var swiper = new Swiper('.swiper', {
                        slidesPerView: getSlidesPerView(),
                        direction: getDirection(),
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        on: {
                            resize: function () {
                                swiper.params.slidesPerView = getSlidesPerView();
                                swiper.changeDirection(getDirection());
                            },
                        },
                    });

                    function getDirection() {
                        var windowWidth = window.innerWidth;
                        var direction = window.innerWidth <= 760 ? 'horizontal' : 'horizontal';

                        return direction;
                    }

                    function getSlidesPerView() {
                        var windowWidth = window.innerWidth;
                        if (windowWidth <= 430) {
                            return 2;
                        } else if (windowWidth <= 600) {
                            return 3;
                        } else if (windowWidth <= 768) {
                            return 4;
                        } else {
                            return 6; // Default value
                        }
                    }

                </script>



                <!-- เมนูแนะนำ -->
                <div class="col-menu recommend-menu" id="recommend-menu">
                    <div class="row1" id="row-recommend-menu">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where recommend = 1 order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('recommend');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <!-- เมนูทอด -->
                <div class="col-menu fried-menu" id="fried-menu">
                    <div class="row1" id="row-fried-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'fried' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('fried');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- เมนูยำ/ต้ม -->
                <div class="col-menu soup-menu" id="soup-menu">
                    <div class="row1" id="row-soup-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'soup' or type = 'yum' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('soup');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- เมนูทะเล -->
                <div class="col-menu seafood-menu" id="seafood-menu">
                    <div class="row1" id="row-seafood-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'seafood' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('seafood');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- เมนูเสต็ก-->
                <div class="col-menu steak-menu" id="steak-menu">
                    <div class="row1" id="row-steak-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'steak' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('steak');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <!-- เมนูของหวาน -->
                <div class="col-menu dessert-menu" id="dessert-menu">
                    <div class="row1" id="row-dessert-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'dessert' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('dessert');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <!-- เมนูเครื่องดื่ม -->
                <div class="col-menu drink-menu" id="drink-menu">
                    <div class="row1" id="row-drink-menu" style="display: none;">
                        <?php
                        $product_array = $db_handle->runQuery("SELECT * From menu where type = 'drink' order by foodID asc");
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>
                                <div class="col1">
                                    <div class="col1-sub"><a
                                            href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img
                                                src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                                    <div class="col1-sub-content">
                                        <div class="col1-sub-content-1">
                                            <?php echo $product_array[$key]["foodName"]; ?>
                                        </div>
                                        <div class="cart-action">
                                            <button
                                                onclick="minusNum('<?php echo $product_array[$key]['foodDetail']; ?>')">-</button>
                                            <input type="text" class="quantity_input"
                                                id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity"
                                                value="1" size="1">
                                            <button
                                                onclick="addNum('<?php echo $product_array[$key]['foodDetail']; ?>')">+</button>
                                        </div>
                                        <div class="col1-sub-content-2"><button
                                                style="background-color: transparent;border: none;"
                                                onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('drink');">
                                                <?php echo "THB " . $product_array[$key]["price"]; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div>





                <a href="#" class="float" data-bs-toggle="modal" data-bs-target="#shoppingCartModal">
                    <i class="fa-solid fa-cart-shopping my-float"></i>
                </a>
                <!-- Shopping Cart Modals -->
                <div class="modal fade" id="shoppingCartModal" tabindex="-1" aria-labelledby="shoppingCartModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shoppingCartModalLabel">รายการของคุณ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-cart">
                                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                                        class="scrollspy-example" tabindex="0">
                                        <div class="container">
                                            <div class="row">
                                                <?php
                                                if (isset($_SESSION["cart_item"])) {
                                                    $total_quantity = 0;
                                                    $total_price = 0;
                                                    foreach ($_SESSION["cart_item"] as $item) {
                                                        $item_price = $item["quantity"] * $item["price"];
                                                        ?>
                                                        <div class="col-lg-6 mb-3"> <!-- Item of menu to order -->
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <img src="<?php echo $item["picture"]; ?>"
                                                                            class="w-100">
                                                                        <!-- รูปภาพจาก MENU -->
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <p>
                                                                            <?php echo $item["foodName"]; ?>
                                                                        </p> <!-- ชื่อของเมนู -->
                                                                        <hr>
                                                                        <div class="d-flex">
                                                                            <p class="w-25">
                                                                                <?php echo "x" . $item["quantity"]; ?>
                                                                            </p> <!-- จำนวน -->
                                                                            <p class="w-25 ms-auto text-danger">
                                                                                <?php echo "THB" . number_format($item["quantity"] * $item["price"], 2); ?>
                                                                            </p>
                                                                        </div>
                                                                        <!-- <p>
                                  <a href="#" class="btnRemoveAction"
                                    onclick="deleteItem('<?php echo $item['foodDetail']; ?>')">
                                    <img src="delete-icon.png" width="90%" alt="">
                                  </a>
                                </p> -->
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <a href="#" class="btnRemoveAction"
                                                                            onclick="deleteItem('<?php echo $item['foodDetail']; ?>')">
                                                                            <img src="delete-icon.png" width="50%" alt="">
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        $total_quantity += $item["quantity"];
                                                        $total_price += $item["price"] * $item["quantity"];
                                                    }
                                                    ?>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="no-records">ตระกร้าว่างเปล่า</div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        // function checkLog() {
                                            <?php
                                            // if (isset($_SESSION["uID"])) {
                                            //     echo "location.href='purchaseOrder.php'";
                                            // } else {
                                            //     echo "Swal.fire({
                                            //     icon: \"error\",
                                            //     title: \"You must login first. !!!\",
                                            //     timer: 5000,
                                            // });";
                                            // }
                                            ?>
                                        // }
                                    </script>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">ปิด</button>
                                        <button onclick="clear_cart()" class="btn btn-danger">ล้างตะกร้า</button>

                                        <button type="button" onclick="location.href='purchaseOrder.php'"
                  class="btn btn-warning">ทำการสั่งซื้อ</button>
                                        <!-- <button type="button" onclick="checkLog()"
                                            class="btn btn-warning">ทำการสั่งซื้อ</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
</body>

</html>