<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('./backend/api/config.php');
        $foodID = $_GET['food'];
        // echo "The selected product is: " . $foodID;
        $query = "select * from menu where foodID = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$foodID]);
        $detail = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $detail['foodName'] . "<br>";
        echo $detail['foodDetail'] . "<br>";
        echo $detail['price'] . "<br>";
        echo "<img src='" . $detail['picture'] . "' alt=''>";
    ?>

</body>
</html>