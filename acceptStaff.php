<?php
require_once('./backend/api/config.php');
session_start();
    $_SESSION["cart_item3"] = $_SESSION["cart_item2"];
    $billID = $_SESSION['bill_id'];
    $billID2 = $_SESSION['bill_id2'];
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "accept":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $query = "UPDATE bill SET status=? where bill_id = $billID ";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                    2]);
                    echo "<script>window.location.href='staff.php';</script>";
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
                    echo "<script>window.location.href='staff.php';</script>";
                }else {
                    http_response_code(405);
                }
                break;
            case "confirm":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $query = "UPDATE bill SET status=? where bill_id = $billID2 ";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                    3]);
                    echo "<script>window.location.href='staff.php';</script>";
                }else {
                    http_response_code(405);
                }
                break;
        }
    }
?>
