<?php
session_start()
?>
<style>
    .container {
        background-color: bisque;
        margin: 20px;
    }
</style>
<?php
require_once('./backend/api/config.php');

$query_1 = "select log.*, bill.* from log INNER JOIN bill ON log.bill_id = bill.bill_id WHERE log.uid = ? ORDER BY log.date_log ASC";
$stmt_1 = $conn->prepare($query_1);
$stmt_1->execute([$_SESSION['uID']]);
$userLogs = $stmt_1->fetchAll(PDO::FETCH_ASSOC);

if (!empty($userLogs)) {
    foreach ($userLogs as $key => $value) {
        $query_2 = "select orders.*, menu.* from orders inner join menu on orders.foodID = menu.foodID where orders.bill_id = ? order by menu.foodName ASC";
        $stmt_2 = $conn->prepare($query_2);
        $stmt_2->execute([$userLogs[$key]["bill_id"]]);
        $foodOrders = $stmt_2->fetchAll(PDO::FETCH_ASSOC);
?>
        <div class="container">
            <p><?php echo $userLogs[$key]["date_log"] ?></p>
            <p><?php echo $userLogs[$key]["uid"] ?></p>
            <p><?php echo $userLogs[$key]["bill_id"] ?></p>
            <p><?php echo $userLogs[$key]["totalPrice"] ?></p>
            <?php foreach ($foodOrders as $row => $val) { ?>
                <div class="container-2">
                    <img src="<?php echo $foodOrders[$row]["picture"] ?>" alt="">
                    <p><?php echo $foodOrders[$row]["foodID"] ?></p>
                    <p><?php echo $foodOrders[$row]["amount"] ?></p>
                </div>
        </div>
<?php
            }
        }
    }
?>