<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet" />
    
    <!-- Font Common-text -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&family=Permanent+Marker&display=swap"
    rel="stylesheet" />
    
    <!-- Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <link rel="stylesheet" href="./menu.css">
</head>
<body>
    <style>
        body {
            background-image: url(../Image_inventory/WallPaper.webp);
        }
        .container {
            background-color: #ffffff;
        }
    </style>

    <header class="header">
        <a href="index.php" class="header-link">KITCHENHOME</a>
        <nav class="navbar01">
          <a href="index.php" class="links"><i class="fa-solid fa-house-chimney" id="backHome"></i></a>
          <a href="" class="links">โปรโมชั่น</a>
          <a href="" class="links" data-bs-toggle="modal" data-bs-target="#loginRegisModal">เข้าสู่ระบบ/สมัครสมาชิก</a>
          <i class="fa-solid fa-list-ul" id="list-menu"></i>
          <!-- class="links" id="" -->
        </nav>
    </header>

    <div class="pic-main">
        <span><a href="index.php" class="links" id="backHome2"><i class="fa-solid fa-house-chimney" id="icon-home">
          <span id="span-i">> Menu</span></i></a>
        </span>
      </div>
    <?php
        require_once('./backend/api/config.php');
        $foodID = $_GET['food'];
        // echo "The selected product is: " . $foodID;
        $query = "select * from menu where foodID = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$foodID]);
        $detail = $stmt->fetch(PDO::FETCH_ASSOC);
        
    ?>
    <div class="info-food">
        <div class="container">
          <div class="box-detail-menu">
            <div class="detail">
              <h1><?php echo $detail['foodName']; ?></h1> <!-- ชื่อเมนู -->
              <div class="menu-image1">
                  <img src="<?php echo $detail['picture']; ?>" alt="">
              </div>
              <div class="nav">
                  <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-outline-dark" onclick="minusNum()">-</button>
                      <input type="text" id="count" value= 1>
                      <button type="button" class="btn btn-outline-dark" onclick="addNum()">+</button>
                    </div><br>
                    <h3><?php echo $detail['price']; ?></h3>
                </div>
                <div class="detail-of-menu">
                    <p><?php echo $detail['foodDetail']; ?></p>
                </div>
              <button class="danger2">เพิ่มลงตะกร้า</button>
              <button class="btn btn-outline-dark" id="btn-cart" onclick="backPage()">ย้อนกลับ</button>
            </div>
          </div>
        </div>
    </div>

    <script>
        var countElement = document.getElementById('count');

        function backPage(){        
            window.location.href = 'menu.php';
        }
        
        function addNum(){
            var count = parseInt(countElement.value);
            count++;
            countElement.value = count;
        }

        function minusNum(){
            var count = parseInt(countElement.value);
            count--;
            countElement.value = count;
        }
    </script>
</body>
</html>