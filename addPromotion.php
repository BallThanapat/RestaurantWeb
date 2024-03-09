<?php
require_once('./backend/api/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $filename = $_FILES['fileImg']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed = array('jpg', 'png', 'jpeg', 'webp');
    $promoName = $_POST["promoName"];
    $promoDetail = $_POST["promoDetail"];
    $promoMin = intval($_POST["promoMin"]);
    $code = $_POST["code"];
    $discount = intval($_POST["discount"]);

    if (!in_array($ext, $allowed)) {
        $object = new stdClass();
        $object->RespCode = 400;
        $object->RespMessage = 'bad';
    } else {
        $name = explode(".", $filename);
        $ext = $name[1];
        $milliseconds = round(microtime(true) * 1000);
        $newfilename = $milliseconds . "." . $ext;

        $tmpname = $_FILES['fileImg']['tmp_name'];
        $moveto = './upload_image/promotion/' . $newfilename;
        $promoPicture = $moveto;

        if (move_uploaded_file($tmpname, $moveto)) {
            chmod('./upload_image/promotion/' . $newfilename, 0777);
            $query1 = "insert into promotion(min_price, discount, prDetail, prPicture, codetext, prName) values (?,?,?,?,?,?)";
            $stmt1 = $conn->prepare($query1);
            if ($stmt1->execute([$promoMin, $discount, $promoDetail, $promoPicture, $code, $promoName])) {
                $object = new stdClass();
                $object->RespCode = 200;
                $object->RespMessage = 'good';
            }
        }
    }
    echo json_encode($object);
} else {
    http_response_code(405);
}
