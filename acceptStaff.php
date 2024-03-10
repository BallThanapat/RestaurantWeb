<?php
require_once('./backend/api/config.php');
require_once('menuController.php');
    $db_handle = new MenuControll();
session_start();
    $_SESSION["cart_item3"] = $_SESSION["cart_item2"];
    $billID = $_GET['bill_id'];
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "accept":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $query = "UPDATE bill SET status=? WHERE bill_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([2, $billID]);

                    $run_array = $db_handle->runQuery("SELECT address.uid FROM address INNER JOIN bill ON bill.addr_id = address.addr_id WHERE bill_id = $billID");
                    if (!empty($run_array)) {
                        foreach ($run_array as $key => $run1){
                            $uid = $run1["uid"];
                        }
                    }

                    $query = "INSERT INTO log (date_log, uid, bill_id) VALUES (?,?,?)";
                    $stmt = $conn->prepare($query);
                    date_default_timezone_set('Asia/Bangkok');
                    $currentTime = date("Y-m-d H:i:s");
                    $stmt->execute([
                        $currentTime,
                        $uid,
                        $billID
                    ]);

                }else {
                    http_response_code(405);
                }
                break;
            case "decline":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $query = "UPDATE bill SET status=? where bill_id = $billID ";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                    0]);
                    // echo "<script>window.location.href='staff.php';</script>";
                }else {
                    http_response_code(405);
                }
                break;
            case "confirm":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $query = "UPDATE bill SET status=? where bill_id = $billID ";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                    3]);
                    // echo "<script>window.location.href='staff.php';</script>";
                }else {
                    http_response_code(405);
                }
                break;
        }
    }
?>
