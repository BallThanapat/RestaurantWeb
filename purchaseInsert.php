<?php
require_once('./backend/api/config.php');
require_once('menuController.php');
$db_handle = new MenuControll();
session_start();
    if(isset($_SESSION["cart_item"])){
        $total_quantity2 = 0;
        $total_price2 = 0;
        foreach($_SESSION["cart_item"] as $item) {
            $item_price = $item["quantity"] * $item["price"];
            $total_quantity2 += $item["quantity"];
            $total_price2 += $item["price"]*$item["quantity"];
        }
        $_SESSION["cart_item2"] = $_SESSION["cart_item"];
    }
    if (!isset($_SESSION['type'])) {
        $_SESSION['type'] = "delivery";
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // $total_price2 = $_SESSION['tPrice'];
        $uID1 = $_SESSION['uID'];
        $type1 = $_SESSION['type'];
        // if (!isset($_SESSION['addrID2'])) { //เช็ค addr ถ้าไม่กดเลือกจะตั้งอันแรกให้
        //     $addr_array = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, 
        //     address.address, address.province, address.district, address.sub_district, address.postcode, address.addr_id
        //     FROM users
        //     INNER JOIN address ON users.uid=address.uid where users.uid=$uID1;");
        //     $first_address = reset($addr_array);
        //     $first_key = key($addr_array);
        //     $addrN1 = $first_address["addr_id"];
        //     $_SESSION['addrID2'] = $addrN1;
        // }
        $addr1 = $_SESSION["addrID2"];
        $query = "insert into bill (totalPrice ,uid, type, addr_id) values (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            $total_price2,
            $uID1,
            $type1,
            $addr1]);
        echo "<script>window.location.href='menu.php';</script>";
        unset($_SESSION["cart_item"]);
        unset($_SESSION["type"]);
        unset($_SESSION["addrID2"]);
    }else {
        http_response_code(405);
    }
?>
