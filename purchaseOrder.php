<?php
    session_start();
    require_once('menuController.php');
    $db_handle = new MenuControll();

    if(!empty($_GET["action"])){
        switch($_GET["action"]){
            case "remove";
                if(!empty($_SESSION["cart_item"])){
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["foodDetail"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
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
    <link rel="stylesheet" href="purchaseOrder.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function click1() {
            document.getElementById("num1").style.background = "white";
            document.getElementById("num1").style.color = "black";
            document.getElementById("num2").style.background = "#ff7b00";
            document.getElementById("num2").style.color = "white";
            document.getElementById("page1").style.display = "none";
            document.getElementById("page2").style.display = "block";
        }
        function click2() {
            document.getElementById("num2").style.background = "white";
            document.getElementById("num2").style.color = "black";
            document.getElementById("num3").style.background = "#ff7b00";
            document.getElementById("num3").style.color = "white";
            document.getElementById("page2").style.display = "none";
            document.getElementById("page3").style.display = "block";
        }
        function back1() {
            document.getElementById("num2").style.background = "white";
            document.getElementById("num2").style.color = "black";
            document.getElementById("num1").style.background = "#ff7b00";
            document.getElementById("num1").style.color = "white";
            document.getElementById("page1").style.display = "block";
            document.getElementById("page2").style.display = "none";
        }
        function back2() {
            document.getElementById("num3").style.background = "white";
            document.getElementById("num3").style.color = "black";
            document.getElementById("num2").style.background = "#ff7b00";
            document.getElementById("num2").style.color = "white";
            document.getElementById("page2").style.display = "block";
            document.getElementById("page3").style.display = "none";
        }

        function check() {

        }

        $(document).ready(function () {

            $(".select-option").click(function () {
                $(this).siblings().removeClass("selected");
                $(this).addClass("selected");
                var selectedValue = $(this).data("value");
                $(this).closest(".custom-select").next(".selected-option").val(selectedValue);

                if (selectedValue == "1" || selectedValue == "2") {
                    // Hide all item containers
                    $(".item-container").hide();
                    alert(selectedValue)

                    // Show the item container for the selected option
                    $("#div" + selectedValue).show();
                }


            });

            $(".get-selected-btn").click(function () { 
                var targetCustomSelect = $(this).data("target");
                var selectedValue = $("#" + targetCustomSelect).next(".selected-option").val();
                console.log("Selected value: " + selectedValue);
                // click2();
                var targetCustomSelect = $(this).data("target");
                if (targetCustomSelect === "custom-select1") { //ปุ่มเลือก addrs
                    alert("Button 1 was clicked.");
                } else if (targetCustomSelect === "custom-select2") { 
                    // alert("Button 2 was clicked.");
                    click2();
                };
            });
        });
    </script>

    <title>สั่งซื้อสินค้า</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-xxl navbar-dark">
            <div class="container-fluid">
                <a href="index.php" class="header-link">KITCHENHOME</a>
            </div>
        </nav>
    </header>

    <div class="d-flex justify-content-center h-100">
        <div class="w-75 mt-3">
            <!-- <h2>KitchenHOME</h2> -->
            <div class="mt-5 mb-2">
                <!-- <hr> -->
                <div class="numbered-hr">
                    <span class="number num1" id="num1">1</span>
                    <span class="number num2" id="num2">2</span>
                    <span class="number num3" id="num3">3</span>
                </div>
            </div>
            
            <!-- First Page -->
            <div class="mt-2" id="page1">
                <h4 class="mb-4">รายการของคุณ</h4>
                <div class="order p-2 w-80 d-flex justify-content-center">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <?php
                            if(isset($_SESSION["cart_item"])){
                                $total_quantity = 0;
                                $total_price = 0;
                                foreach($_SESSION["cart_item"] as $item) {
                                    $item_price = $item["quantity"] * $item["price"];
                            ?>

                                <div class="col-md-5 bg-white m-3"> <!-- Item of menu to order -->
                                    <div class="container">
                                        <div class="row row1">
                                            <div class="col-sm-5">
                                                <img src="Image_inventory/Menu/friedFood.png" alt="">
                                                <!-- รูปภาพจาก MENU -->
                                            </div>
                                            <div class="col-sm-6">
                                                <p><?php echo $item["foodName"]; ?></p> <!-- ชื่อของเมนู -->
                                                <hr>
                                                <div class="d-flex">
                                                    <p class="w-25"><?php echo "x" . $item["quantity"]; ?></p> <!-- จำนวน -->
                                                    <p class="w-25 ms-auto text-danger"><?php echo "THB". number_format($item["quantity"] * $item["price"], 2); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                                <?php
                                    $total_quantity += $item["quantity"];
                                    $total_price += $item["price"]*$item["quantity"];
                                    }
                                ?>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="d-flex mt-3" id="d-code">
                    <div>
                        <h6>โค้ดส่วนลด: </h6>
                    </div>
                    <div id="input-bar">
                        <input type="text">
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <div>
                        <h5>ราคารวม</h5>
                    </div>
                    <div class="ms-5">
                        <p><?php echo "THB". number_format($total_price, 2); ?></p>
                    </div>
                </div>

                <div class="d-flex below">
                    <button class="btn btn-warning" id="btn-order" onclick="click1()">สั่งซื้อสินค้า</button>
                </div>
            </div>

            <!-- Second Page -->
            <div class="mt-3" id="page2" style="display: none;">
                <h4>รายละเอียดการจัดส่ง</h4>
                <div class="mt-3">
                    <div>
                        <h5 style="text-align: center;">เลือกรูปแบบการรับสินค้า</h5>
                    </div>
                    <div class="ms-3">
                        <div class="custom-select" id="custom-select1">
                            <div class="container">
                                <div class="row5" id="row-select">
                                    <div class="select-option selected col-sm-5" data-value="1">
                                        <h6 class="delivery">เดลิเวอรี่ <i class="fa-solid fa-truck"></i></h6>
                                    </div>
                                    <div class="select-option col-sm-5" data-value="2">
                                        <h6 class="delivery">รับที่ร้าน <i class="fa-solid fa-shop"></i></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" class="selected-option" name="selected-option2">
                    </div>
                </div>
                <div id="div1" class="item-container">
                    <h4>ที่อยู่จัดส่ง</h4>
                    <a class="text-black address" data-bs-toggle="modal" data-bs-target="#addressModal">
                        <div class="container">
                            <div class="row d-flex justify-content-center mt-3 align-items-center" id="box-address">
                                
                                <?php 
                                    $addr_result = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, 
                                    address.address, address.province, address.district, address.sub_district, address.postcode
                                    FROM users
                                    INNER JOIN address ON users.uid=address.uid where users.uid=1 limit 1;"); //แก้ uid ต้องรับค่ามากจากการ login
                                    if(!empty($addr_result)){
                                        foreach($addr_result as $key => $value) {
                                ?>
                                <div class="col-sm-10">
                                    <p><?php echo $addr_result[$key]["firstName"].' '.$addr_result[$key]["lastName"]; ?><br>
                                        <?php echo 'Tel. '. $addr_result[$key]["telephone"]; ?><br>
                                        <?php echo $addr_result[$key]["address"].' '.$addr_result[$key]["province"].' '.$addr_result[$key]["district"]
                                        .' '.$addr_result[$key]["sub_district"].' '.$addr_result[$key]["postcode"]; ?></p>
                                </div>
                                <?php 
                                        }
                                    }
                                ?>
                                <div class="col-sm-2 ms-auto" id="change-address">
                                    <h6 class="change">เปลี่ยน</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="div2" class="item-container" style="display: none;">
                    <h3>ที่อยู่ร้าน</h3>
                    <p>คณะเทคโนโลยีสารสนเทศ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง 1 ซอย ฉลองกรุง 1
                        แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7751.638226068855!2d100.77202249284046!3d13.72939879664036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d66308ce98ffd%3A0xcb43a76f038c38ca!2z4LiE4LiT4Liw4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Liq4Liy4Lij4Liq4LiZ4LmA4LiX4LioIOC4quC4luC4suC4muC4seC4meC5gOC4l-C4hOC5guC4meC5guC4peC4ouC4teC4nuC4o-C4sOC4iOC4reC4oeC5gOC4geC4peC5ieC4suC5gOC4iOC5ieC4suC4hOC4uOC4k-C4l-C4q-C4suC4o-C4peC4suC4lOC4geC4o-C4sOC4muC4seC4hyAoSVRLTUlUTCk!5e0!3m2!1sth!2sth!4v1709218587479!5m2!1sth!2sth"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="mt-5">
                    <h2>สั่งซื้อสินค้าแล้ว</h2>
                    <?php
                        if(isset($_SESSION["cart_item"])){
                            $total_quantity = 0;
                            $total_price = 0;
                        
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">รายการ</th>
                                <th scope="col">ราคาต่อหน่วย</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">ราคารวม</th>
                            </tr>
                            <?php
                                foreach($_SESSION["cart_item"] as $item) {
                                    $item_price = $item["quantity"] * $item["price"];
                                
                            ?>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo $item["foodName"]; ?></td>
                                <td><?php echo $item["price"]; ?></td>
                                <td><?php echo $item["quantity"]; ?></td>
                                <td><?php echo number_format($item["quantity"] * $item["price"], 2); ?></td>
                            </tr>
                            <?php
                                $total_quantity += $item["quantity"];
                                $total_price += $item["price"]*$item["quantity"];
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                        }
                    ?>
                </div>

                <div class="d-flex mt-3">
                    <div class="ms-auto">
                        <h4>ราคารวม</h4>
                    </div>
                    <div class="ms-3">
                        <p><?php echo "THB". number_format($total_price, 2); ?></p>
                    </div>
                </div>

                <div class="d-flex below mt-3">
                    <button class="btn btn-secondary me-1" onclick="back1()">ย้อนกลับ</button>
                    <button class="btn get-selected-btn" id="btn-order" data-target="custom-select2">ชำระเงิน</button>
                    <!-- onclick="click2()" -->
                </div>

                <!-- Test -->
                

                <!-- Address Modals -->
                <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addressModalLabel">ที่อยู่ของคุณ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                                    class="scrollspy-example" tabindex="0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="custom-select" id="custom-select1">
                                                <?php 
                                                    $addr_array = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, 
                                                    address.address, address.province, address.district, address.sub_district, address.postcode
                                                    FROM users
                                                    INNER JOIN address ON users.uid=address.uid where users.uid=1;"); //แก้ uid ต้องรับค่ามากจากการ login
                                                    if(!empty($addr_array)){
                                                        foreach($addr_array as $key => $value) {
                                                ?>
                                                <div class="select-option selected" data-value="optionA"
                                                    id="option-address">
                                                    <p><?php echo $addr_array[$key]["firstName"].' '.$addr_array[$key]["lastName"]; ?><br>
                                                        <?php echo 'Tel. '. $addr_array[$key]["telephone"]; ?><br>
                                                        <?php echo $addr_array[$key]["address"].' '.$addr_array[$key]["province"].' '.$addr_array[$key]["district"]
                                                        .' '.$addr_array[$key]["sub_district"].' '.$addr_array[$key]["postcode"]; ?></p>
                                                </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <input type="hidden" class="selected-option" name="selected-option1">
                                            <!-- <button id="get-selected-btn">Get Selected Value</button> -->
                                        </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                <button type="button" class="btn get-selected-btn" id="custom-select1" style="background-color: #ff7b00; color: white;"
                                    data-target="custom-select1">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Page -->
            <div class="mt-2 mb-5" id="page3" style="display: none;">
                <h4 class="mt-5 mb-4">ชำระเงิน : QR พร้อมเพย์</h4>
                <div class="container">
                    <div class="row">
                        <div class="qr-payment">
                            <img src="Image_inventory/PurchaseOrder/payment.png">
                        </div>
                        <div class="col-sm-7 h-auto d-flex justify-content-center align-items-center">
                            <div class="contanier">
                                <div class="row">
                                    <h5 class="col-sm-8 mt-5">หลักฐานการโอนเงิน</h5>
                                    <form class="col-sm-8 d-flex justify-content-center">
                                        <input type="file" class="input-file" />
                                    </form>
                                    <div class="pay-btn">
                                        <button class="btn btn-secondary me-1" onclick="back2()">ย้อนกลับ</button>
                                        <button class="btn get-selected-btn" id="btn-order"
                                            data-target="custom-select2">ยืนยัน</button>
                                    </div>
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