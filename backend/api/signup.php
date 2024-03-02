<?php
require_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //รับค่าจากหน้าบ้านมา
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    //ทำการคิวรี่ข้อมูลจาก database
    //ทำการเช็คว่า username or email มีค่าซ้ำใน DB อยู่แล้วหรือป่าว
    $check_query = "SELECT * FROM users WHERE id = ? OR email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->execute([$username, $email]);
    $existing_user = $check_stmt->fetch(PDO::FETCH_ASSOC);

    //ถ้าซ้ำจะทำการคือค่านี้ไป ตรวจสอบได้ใน console
    if ($existing_user) {
        $object = new stdClass();
        $object->RespCode = 400;
        $object->RespMessage = 'Username or email already exists';
        echo json_encode($object);
    } else {
        $query = "insert into users (id, password, email, firstName, lastName, address, telephone, groupID) values (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        if ($stmt->execute([
            $username, $password, $email, $firstname, $lastname, $address, $phone, 1
        ])) {
            $object = new stdClass();
            $object->RespCode = 200;
            $object->RespMessage = 'good';
            $object->RespUsername = $username;
        } else {
            $object = new stdClass();
            $object->RespCode = 400;
            $object->RespMessage = 'bad';
            $object->Log = 1;
        }
        echo json_encode($object);
    }
} else {
    http_response_code(405);
}
