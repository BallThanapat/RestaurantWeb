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
    <title>Document</title>
</head>
<body>
    <?php 
        $addr_array = $db_handle->runQuery("SELECT users.firstName, users.lastName, users.telephone, 
        address.address, address.province, address.district, address.sub_district, address.postcode
        FROM users
        INNER JOIN address ON users.uid=address.uid;");
        if(!empty($addr_array)){
            foreach($addr_array as $key => $value) { ?>
                <?php echo $addr_array[$key]["firstName"].' '.$addr_array[$key]["lastName"]; ?><br>
                <?php echo 'Tel. '. $addr_array[$key]["telephone"]; ?><br>
                <?php echo $addr_array[$key]["address"].' '.$addr_array[$key]["province"].$addr_array[$key]["district"].$addr_array[$key]["sub_district"].$addr_array[$key]["postcode"]; ?></p>
        <?php
            }}?>
</body>
</html>