<?php
    session_start();
    require_once('menuController.php');
    $db_handle = new MenuControll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>

    <style>
        <?php
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
        function acceptOrd(billID) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "acceptStaff.php?action=accept&bill_id=" + billID, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.reload();
                    // $('.content').load(location.href + ' .content');
                }
            };
            xhr.send();
        }
        function declineOrd(billID) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "acceptStaff.php?action=decline&bill_id=" + billID, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.reload();
                }
            };
            xhr.send();
        }
        function confirmOrd(billID) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "acceptStaff.php?action=confirm&bill_id=" + billID, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.reload();
                }
            };
            xhr.send();
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
                <div class="item" onclick="gotologout('staff')"><a><i class="fa-solid fa-arrow-right-from-bracket"></i>LOG OUT</a></div>
            </div>
        </div>
        
        <div class="outputspace">
            <div class="mainbar">
                <div class="account-staff">
                    <?php
                    // $username = $_SESSION['username'];
                    // echo $username;
                    ?>
                </div>
            </div>
            <div class="content" id="order"> <!--  -->
                <h1>รายการคำสั่งซื้อ</h1>
                <div class="box-list-order">

                <?php
                    $bill_array = $db_handle->runQuery("SELECT * FROM bill where status=1");
                    if (!empty($bill_array)) {
                        foreach ($bill_array as $key => $bill) {
                            $total_quantity2 = 0;
                            $total_price2 = 0;
                            $foodL = '';
                            if (isset($_SESSION["cart_item2"])) {
                                foreach ($_SESSION["cart_item2"] as $item) {
                                    $item_food = $item["foodName"];
                                    $item_quantity = $item["quantity"];
                                    $total_price2 += $item["price"] * $item_quantity;
                                    $total_quantity2 += $item_quantity;
                                    $foodL .= $item_food . ' x' . $item_quantity . ' | ';
                                }

                            }
                            $billID = $bill["bill_id"];
                ?>
                                <!-- The Modal Info -->
                                <div class="modal fade" id="s<?php echo $billID ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Information</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <?php
                                                $bill_array2 = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, address.address, address.province, address.district,
                                                address.sub_district, address.postcode FROM bill 
                                                INNER JOIN address ON bill.addr_id=address.addr_id 
                                                INNER JOIN users ON bill.uid=users.uid
                                                where status=1 and bill_id=$billID");
                                                if (!empty($bill_array2)) {
                                                    foreach ($bill_array2 as $key => $bill2) {
                                            ?>
                                            <div class="modal-body modal-body-info" id="modal-body-info" style="width: 100%;margin-left: 10px;">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>ชื่อ: <?php echo $bill2["firstName"].' '.$bill2["lastName"]; ?></h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>เบอร์โทร : <?php echo $bill2["telephone"]; ?></h5>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col">
                                                        <p><?php echo $bill2["address"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <p>ตำบล/เขต: <?php echo $bill2["sub_district"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>อำเภอ/แขวง: <?php echo $bill2["district"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <p>จังหวัด: <?php echo $bill2["province"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>รหัสไปรษณีย์: <?php echo $bill2["postcode"]; ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                                    }
                                                }
                                                ?>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="order">
                                <div class="content-order order-num">
                                    <h6>หมายเลขคำสั่งซื้อ</h6>
                                    <h1><?php echo $bill["bill_id"]; ?></h1>
                                </div>

                                <div class="content-order order-detail">
                                    <h6>รายการอาหาร</h6>
                                    <p><?php echo $foodL?></p>
                                </div>

                                <div class="content-order order-img-payment" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                                    <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                                </div>
                            <?php
                                if($bill["type"] == "delivery"){
                            ?>
                                <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#s<?php echo $billID ?>">
                                    <h5>Delivery</h5>
                                </div>
                            <?php
                                }else{
                            ?>
                                <div class="content-order order-type"
                                    style="cursor: pointer;">
                                    <h5>Self/Pick-up</h5> <!-- ประเภทของการสั่งซื้อ -->
                                </div>
                            <?php
                                }
                            ?>
                                <div class="content-order order-price">
                                    <h4>Total</h4>
                                    <h5><?php echo $bill["totalPrice"]; ?> ฿</h5>
                                </div>
                                <?php
                                    $_SESSION['bill_id']=$bill['bill_id'];
                                ?>
                                <div class="content-order order-btn">
                                        <button class="btn btn-success" id="btn-order" data-target="custom-select3"
                                        onclick="acceptOrd('<?php echo $bill['bill_id'];?>')">Accept</button>
                                        <button class="btn btn-danger mt-2" onclick="declineOrd('<?php echo $bill['bill_id'];?>')">Decline</button>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="content" id="payment">
                <h1>ยืนยันรายการสั่งซื้อ</h1>
                <div class="status-payment">
                    <div class="box-list-order">

                    <?php
                        $bill_array = $db_handle->runQuery("SELECT * FROM bill where status=2");
                        if (!empty($bill_array)) {
                            foreach ($bill_array as $key => $bill) {
                                $total_quantity2 = 0;
                                $total_price2 = 0;
                                $foodL = '';
                                if (isset($_SESSION["cart_item2"])) {
                                    foreach ($_SESSION["cart_item2"] as $item) {
                                        $item_food = $item["foodName"];
                                        $item_quantity = $item["quantity"];
                                        $total_price2 += $item["price"] * $item_quantity;
                                        $total_quantity2 += $item_quantity;
                                        $foodL .= $item_food . ' x' . $item_quantity . ' | ';
                                    }
                                    $billID = $bill["bill_id"];
                                } ?>

                                <!-- The Modal Info -->
                                <div class="modal fade" id="s<?php echo $billID ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Information</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <?php
                                                $bill_array2 = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, address.address, address.province, address.district,
                                                address.sub_district, address.postcode FROM bill 
                                                INNER JOIN address ON bill.addr_id=address.addr_id 
                                                INNER JOIN users ON bill.uid=users.uid
                                                where status=2 and bill_id=$billID");
                                                if (!empty($bill_array2)) {
                                                    foreach ($bill_array2 as $key => $bill2) {
                                            ?>
                                            <div class="modal-body modal-body-info" id="modal-body-info" style="width: 100%;margin-left: 10px;">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>ชื่อ: <?php echo $bill2["firstName"].' '.$bill2["lastName"]; ?></h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>เบอร์โทร : <?php echo $bill2["telephone"]; ?></h5>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col">
                                                        <p><?php echo $bill2["address"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <p>ตำบล/เขต: <?php echo $bill2["sub_district"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>อำเภอ/แขวง: <?php echo $bill2["district"]; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <p>จังหวัด: <?php echo $bill2["province"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>รหัสไปรษณีย์: <?php echo $bill2["postcode"]; ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                                    }
                                                }
                                                ?>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="order">
                                <div class="content-order order-num">
                                    <h6>หมายเลขคำสั่งซื้อ</h6>
                                    <h1><?php echo $bill["bill_id"]; ?></h1>
                                </div>

                                <div class="content-order order-detail">
                                    <h6>รายการอาหาร</h6>
                                    <p><?php echo $foodL?></p>
                                </div>

                                <div class="content-order order-img-payment" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="viewPay(this)" id="imgpayment">
                                    <img src="Image_inventory/billtest.png" alt="" id="img-payment">
                                </div>
                            <?php
                                if($bill["type"] == "delivery"){
                            ?>
                                <div class="content-order order-type" data-bs-toggle="modal" data-bs-target="#s<?php echo $billID?>">
                                    <h5>Delivery</h5>
                                </div>
                                
                            <?php
                                }else{
                            ?>
                                <div class="content-order order-type"
                                    style="cursor: pointer;">
                                    <h5>Self/Pick-up</h5> <!-- ประเภทของการสั่งซื้อ -->
                                </div>
                            <?php
                                }
                            ?>
                                <div class="content-order order-price">
                                    <h4>Total</h4>
                                    <h5><?php echo $bill["totalPrice"]; ?> ฿</h5>
                                </div>
                                <?php
                                    $_SESSION['bill_id2']=$bill['bill_id'];
                                ?>
                            <div class="content-order order-btn">
                                <button class="btn btn-success" onclick="confirmOrd('<?php echo $bill['bill_id'];?>')">Confirm</button>
                            </div>
                        </div>
                        <?php
                            }
                        }
                    ?>
        </div>
</body>

</html>