<?php
session_start();
require_once('menuController.php');
$db_handle = new MenuControll();

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_GET["foodDetail"]) && !empty($_GET["quantity"])) {
                $productByDetail = $db_handle->runQuery("SELECT * FROM menu where foodDetail='" . $_GET["foodDetail"] . "'");
                $itemArray = array($productByDetail[0]["foodDetail"] => (array(
                    'foodName' => $productByDetail[0]["foodName"],
                    'foodDetail' => $productByDetail[0]["foodDetail"],
                    'quantity' => $_GET["quantity"],
                    'price' => $productByDetail[0]["price"],
                    'picture' => $productByDetail[0]["picture"]
                )));

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
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

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

    <title>Document</title>
</head>
<body>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var radio1 = document.getElementById('btnradio1');
            var radio2 = document.getElementById('btnradio2');
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');
            var buttonBar1 = document.getElementById('buttonBar1');
            var buttonBar2 = document.getElementById('buttonBar2');

            radio1.addEventListener('change', function () {
                if (radio1.checked) {
                    form1.style.display = 'block';
                    form2.style.display = 'none';
                    buttonBar1.style.backgroundColor = 'orange';
                    buttonBar2.style.backgroundColor = 'white';
                    buttonBar1.style.color = 'white';
                    buttonBar2.style.color = 'black';
                }
            });

            radio2.addEventListener('change', function () {
                if (radio2.checked) {
                    form1.style.display = 'none';
                    form2.style.display = 'block';
                    buttonBar2.style.backgroundColor = 'orange';
                    buttonBar1.style.backgroundColor = 'white';
                    buttonBar1.style.color = 'black';
                    buttonBar2.style.color = 'white';
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
            menuBarTopic.innerHTML = '<h2> เมนูแนะนำ </h2>';
            recommend.style.display = 'flex';
            fried.style.display = 'none';
            soup.style.display = 'none';
            seafood.style.display = 'none';
            steak.style.display = 'none';
            dessert.style.display = 'none';
            drink.style.display = 'none';

        } else if (menuType == "fried") {
            menuBarTopic.innerHTML = '<h2> เมนูทอด </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'flex';
            soup.style.display = 'none';
            seafood.style.display = 'none';
            steak.style.display = 'none';
            dessert.style.display = 'none';
            drink.style.display = 'none';

        } else if (menuType == "soup"){
            menuBarTopic.innerHTML = '<h2> เมนูยำ/ต้ม </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'none';
            soup.style.display = 'flex';
            seafood.style.display = 'none';
            steak.style.display = 'none';
            dessert.style.display = 'none';
            drink.style.display = 'none';

        } else if (menuType == "seafood"){
            menuBarTopic.innerHTML = '<h2> อาหารทะเล </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'none';
            soup.style.display = 'none';
            seafood.style.display = 'flex';
            steak.style.display = 'none';
            dessert.style.display = 'none';
            drink.style.display = 'none';

        } else if (menuType == "steak"){
            menuBarTopic.innerHTML = '<h2> สเต็ก/เนื้อ </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'none';
            soup.style.display = 'none';
            seafood.style.display = 'none';
            steak.style.display = 'flex';
            dessert.style.display = 'none';
            drink.style.display = 'none';

        } else if (menuType == "dessert"){
            menuBarTopic.innerHTML = '<h2> ของหวาน </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'none';
            soup.style.display = 'none';
            seafood.style.display = 'none';
            steak.style.display = 'none';
            dessert.style.display = 'flex';
            drink.style.display = 'none';

        } else if (menuType == "drink"){
            menuBarTopic.innerHTML = '<h2> เครื่องดื่ม </h2>';
            recommend.style.display = 'none';
            fried.style.display = 'none';
            soup.style.display = 'none';
            seafood.style.display = 'none';
            steak.style.display = 'none';
            dessert.style.display = 'none';
            drink.style.display = 'flex';
        }

    }
    function addToCart(foodDetail) {
            var quantity = document.getElementById("quantity_" + foodDetail).value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "menu.php?action=add&foodDetail=" + foodDetail + "&quantity=" + quantity, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert("เพิ่มสินค้าสำเร็จ");
                }
            };
            xhr.send();
        }
    </script>

    <header class="header">
        <a href="index.html" class="header-link">KITCHENHOME</a>
        <nav class="navbar01">
            <a href="index.html" class="links"><i class="fa-solid fa-house-chimney" id="backHome"></i></a>
            <a href="" class="links">โปรโมชั่น</a>
            <a href="" class="links" data-bs-toggle="modal"data-bs-target="#loginRegisModal">เข้าสู่ระบบ/สมัครสมาชิก</a>
            <i class="fa-solid fa-list-ul" id="list-menu"></i>
            <!-- class="links" id="" -->
        </nav>
    </header>

    <!-- Login/Register Modals -->
    <div class="modal fade" id="loginRegisModal" tabindex="-1" aria-labelledby="loginRegisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRegisModalLabel">KhunGame Restaurant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check w-50" name="btnradio" id="btnradio1" autocomplete="off"
                            checked>
                        <label class="btn btn-outline-warning" id="buttonBar1" for="btnradio1">Login</label>

                        <input type="radio" class="btn-check w-50" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-warning" id="buttonBar2" for="btnradio2">Register</label>
                    </div>
                    
                    <!-- Login Form -->
                    <form id="form1">
                        <div class="mb-3">
                            <label for="uNameOrEmail" class="col-form-label">Username/Email:</label>
                            <input type="text" class="form-control" id="uNameOrEmail">
                        </div>
                        <div class="mb-3">
                            <label for="lPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="lPassword">
                        </div>
                    </form>

                    <!-- Register Form -->
                    <form id="form2" style="display: none;">
                        <div class="mb-3">
                            <label for="uName" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="uName">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="rPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="rPassword">
                        </div>
                        <div class="mb-3">
                            <label for="fName" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="fName">
                        </div>
                        <div class="mb-3">
                            <label for="lName" class="col-form-label">นามสกุล:</label>
                            <input type="text" class="form-control" id="lName">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">เบอร์โทร:</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="col-form-label">วันเกิด:</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="col-form-label">สถานที่จัดส่งสินค้า:</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning">Submit</button>
                </div>
            </div>
        </div>
    </div>

        <div class="pic-main">
            <span><a href="index.html" class="links" id="backHome2"><i class="fa-solid fa-house-chimney" id="icon-home">
                <span id="span-i">> Menu</span></i></a>
            </span>
            <span class="shopping-cart"><a href="cart.php" id="sum-cost"><i class="fa-solid fa-cart-shopping"></i>THB 0.00</a></span>
        </div>
        <div class="menu-bar">
            <div class="menu-box-bar" id="recomm-menu" onclick="showMenu('recommend')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/recommend.png" alt=""></div>
                <div class="menu-box-bar-content">เมนูแนะนำ</div>
            </div>

            <div class="menu-box-bar" id="fried-menu" onclick="showMenu('fried')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/friedFood.png" alt=""></div>
                <div class="menu-box-bar-content">เมนูทอด</div>
            </div>

            <div class="menu-box-bar" id="soup-menu" onclick="showMenu('soup')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/Tomyumkung4.png" alt=""></div>
                <div class="menu-box-bar-content">ยำ/ต้ม</div>
            </div>
            <div class="menu-box-bar" id="seafood-menu" onclick="showMenu('seafood')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/Seafood2.png" alt="" id="pic-sea"></div>
                <div class="menu-box-bar-content">อาหารทะเล</div>
            </div>
            <div class="menu-box-bar" id="steak-menu" onclick="showMenu('steak')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/Steak.png" alt="" id="pic-steak"></div>
                <div class="menu-box-bar-content">สเต็ก</div>
            </div>
            <div class="menu-box-bar" id="dessert" onclick="showMenu('dessert')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/dessert2.png" alt=""></div>
                <div class="menu-box-bar-content">ของหวาน</div>
            </div>
            <div class="menu-box-bar" id="drink" onclick="showMenu('drink')">
                <div class="menu-box-bar-image"><img src="Image_inventory/Menu/drinks2.png" alt="" id="pic-drink"></div>
                <div class="menu-box-bar-content">เครื่องดื่ม</div>
            </div>
        </div>
        <div class="menu-bar-recommend" id="menu-bar-topic">
            <h2>เมนูแนะนำ</h2>
        </div>

        <div class="col-menu recommend-menu" id="recommend-menu">
            <div class="row1" id="row-recommend-menu">
                <div class="col1">
                    <div class="col1-sub"><img src="Image_inventory/Menu/TomyumChonChon.webp" alt=""></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1">ต้มยำปลาช่อน</div>
                        <div class="col1-sub-content-2">THB 229.00</div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"><a href=""><img src="Image_inventory/Menu/TalayHot.jpg" alt="" id="rec-1"></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1">เจ้าทะเลเผาหม้อไฟ</div>
                        <div class="col1-sub-content-2">THB 429.00</div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"><img src="Image_inventory/Menu/TalayHot1.webp" alt=""></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1">ทะเลเดือด</div>
                        <div class="col1-sub-content-2">THB 329.00</div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>

                <div class="col1">
                    <div class="col1-sub"></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"></div>
                        <div class="col1-sub-content-2"></div>
                    </div>
                </div>
            
            </div>
        </div>

<!-- เมนูทอด -->
        <div class="col-menu fried-menu" id="fried-menu">
            <div class="row1" id="row-fried-menu" style="display: none;">
            <?php
                    $product_array = $db_handle->runQuery("SELECT * From menu where type = 'fried' order by foodID asc");
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub" ><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt="" ></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('fried');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
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
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub"><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('soup');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
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
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub"><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('seafood');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
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
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub"><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('steak');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
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
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub"><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('dessert');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
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
                    if(!empty($product_array)){
                        foreach($product_array as $key => $value) {
                ?> 
                <div class="col1">
                    <div class="col1-sub"><a href="./infoFood.php?food=<?php echo $product_array[$key]["foodID"]; ?>"><img src="<?php echo $product_array[$key]["picture"]; ?>" alt=""></a></div>
                    <div class="col1-sub-content">
                        <div class="col1-sub-content-1"><?php echo $product_array[$key]["foodName"]; ?></div>
                        <div class="cart-action">
                            <input style="margin-top:20%" type="text" id="quantity_<?php echo $product_array[$key]["foodDetail"]; ?>" name="quantity" value="1" size="1">
                        </div>
                        <div class="col1-sub-content-2"><button style="background-color: transparent;border: none;" onclick="addToCart('<?php echo $product_array[$key]['foodDetail']; ?>'); showMenu('drink');">
                            <?php echo "THB ". $product_array[$key]["price"]; ?></button>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            
            </div>
        </div>

    <div class="footer">
        <footer>
            <div class="box-footer">
                <div class="row">
                    <div class="col">
                        <h2>KhunGame Restaurant</h2><br>
                        <p class="icontext">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Ad vero vel quia facilis a hic aut laudantium, repudiandae doloribus alias!
                            Accusamus, asperiores similique voluptatum consequatur dolorem praesentium modi
                        </p>
                        <p class="icon">
                            <a href="#"><i class="fa-solid fa-phone"></i></a>
                            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </p>
                    </div>
                    <div class="col">
                        <h2>FIND OUR RESTAURANT</h2>
                        <p class="icontext"><i class="fa-solid fa-location-dot" id="locate"></i>คณะเทคโนโลยีสารสนเทศ
                            สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง
                            1 ซอย ฉลองกรุง 1 แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520</p>
                    </div>
                    <div class="col" id="col3">
                        <h2>WORKING HOURS</h2><br>
                        <p class="icontext">MONDAY UNTIL FRIDAY <br>09.00 - 23.00 </p><br><br>
                        <p>SATURDAY - SUNDAY <br>09.00 - 24.00</p>
                    </div>
                </div>
                <!-- <h1>LET ME COOK Restaurant</h1><br> -->
            </div>
        </footer>
    </div>

</body>
</html>