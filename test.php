<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="mainPage.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var radio1 = document.getElementById("btnradio1");
            var radio2 = document.getElementById("btnradio2");
            var form1 = document.getElementById("form1");
            var form2 = document.getElementById("form2");
            var buttonBar1 = document.getElementById("buttonBar1");
            var buttonBar2 = document.getElementById("buttonBar2");
            // var btnLogin = document.getElementById("btnlogin");
            // var btnRegis = document.getElementById("btnsignup");

            radio1.addEventListener("change", function () {
                if (radio1.checked) {
                    form1.style.display = "block";
                    form2.style.display = "none";
                    // btnLogin.style.display = "block";
                    // btnRegis.style.display = "none";
                    buttonBar1.style.backgroundColor = "orange";
                    buttonBar2.style.backgroundColor = "white";
                    buttonBar1.style.color = "white";
                    buttonBar2.style.color = "black";
                }
            });

            radio2.addEventListener("change", function () {
                if (radio2.checked) {
                    form1.style.display = "none";
                    form2.style.display = "block";
                    // btnLogin.style.display = "none";
                    // btnRegis.style.display = "block";
                    buttonBar2.style.backgroundColor = "orange";
                    buttonBar1.style.backgroundColor = "white";
                    buttonBar1.style.color = "black";
                    buttonBar2.style.color = "white";
                }
            });
        });
    </script>

    <title>Home</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-xxl navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="header-link">KITCHENHOME</a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="navbar01 collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="index.html" class="links nav-link" id="">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a href="promotion.html" class="links nav-link" id="">โปรโมชั่น</a>
                        </li>
                        <li class="nav-item">
                            <a href="menu.html" class="links nav-link" id="">เมนูทั้งหมด</a>
                        </li>
                        <?php
                        if (isset($_SESSION["username"])) {
                            $username = $_SESSION["username"];
                            echo "<li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle links\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            $username
                            </a>
                            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                <li><a class=\"dropdown-item\" href=\"user_profile/user_profile.html\">โปรไฟล์</a></li>
                                <li><hr class=\"dropdown-divider\"></li>
                                <li><a class=\"dropdown-item text-danger\" href=\"#\" onclick=\"gotologout()\">logout</a></li>
                            </ul>
                        </li>";
                        } else {
                            echo "<li class=\"nav-item\">
                            <a href=\"\" class=\"links nav-link\" data-bs-toggle=\"modal\"
                            data-bs-target=\"#loginRegisModal\">เข้าสู่ระบบ/สมัครสมาชิก</a>
                            </li>";
                        }
                        ?>
                        <!-- <li class="nav-item">
                            <a href="" class="links nav-link" data-bs-toggle="modal"
                                data-bs-target="#loginRegisModal">เข้าสู่ระบบ/สมัครสมาชิก</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="contractUs.html" class="links nav-link" id="">ติดต่อเรา</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Login/Register Modals -->
    <div class="modal fade" id="loginRegisModal" tabindex="-1" aria-labelledby="loginRegisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRegisModalLabel">
                        KhunGame Restaurant
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check w-50" name="btnradio" id="btnradio1" autocomplete="off"
                            checked />
                        <label class="btn btn-outline-warning" id="buttonBar1" for="btnradio1">Login</label>

                        <input type="radio" class="btn-check w-50" name="btnradio" id="btnradio2" autocomplete="off" />
                        <label class="btn btn-outline-warning" id="buttonBar2" for="btnradio2">Register</label>
                    </div>

                    <!-- Login Form -->
                    <form id="form1">
                        <div class="mb-3">
                            <label for="uNameOrEmail" class="col-form-label">Username/Email:</label>
                            <input type="text" class="form-control" id="uNameOrEmail" />
                        </div>
                        <div class="mb-3">
                            <label for="lPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="lPassword" />
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-success" id="btnlogin" onclick="gotologin()">
                                Submit
                            </button>
                        </div>
                    </form>

                    <!-- Register Form -->
                    <form id="form2" style="display: none">
                        <div class="mb-3">
                            <label for="uName" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="uName" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" />
                        </div>
                        <div class="mb-3">
                            <label for="rPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="rPassword" />
                        </div>
                        <div class="mb-3">
                            <label for="fName" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="fName" />
                        </div>
                        <div class="mb-3">
                            <label for="lName" class="col-form-label">นามสกุล:</label>
                            <input type="text" class="form-control" id="lName" />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">เบอร์โทร:</label>
                            <input type="text" class="form-control" id="phone" />
                        </div>
                        <!-- <div class="mx -->
                        <div class="mb-3">
                            <label for="address" class="col-form-label">สถานที่จัดส่งสินค้า:</label>
                            <input type="text" class="form-control" id="address" />
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button onclick="gotosignup()" type="button" class="btn btn-warning" id="btnsignup">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer d-flex justify-content-center">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-success" id="btnlogin">Submit</button>
            <button onclick="gotosignup()" type="button" class="btn btn-warning" id="btnsignup" style="display: none">Submit</button>
          </div> -->
            </div>
        </div>
    </div>

    <div class="bgImg">
        <img src="Image_inventory/Home/BGRestau1.webp" alt="" width="100%" />
        <div class="box-text">
            <h1>Let Me Cook!</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est,
                asperiores nulla? Temporibus iste perspiciatis, excepturi error,
                ducimus labore facilis saepe nostrum, repellendus distinctio quaerat
                similique? Similique alias cum eos! Fuga optio facilis itaque velit
                omnis soluta distinctio, delectus veritatis suscipit debitis nam
                accusantium eum! Veritatis velit provident eaque quis laudantium!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis
                debitis quasi dolorem officiis nesciunt reprehenderit est molestiae
                culpa itaque minima aperiam labore expedita assumenda, inventore
                quidem eum, magni reiciendis quis nisi veritatis perspiciatis ipsa
                eius facilis eaque. Quam minus eligendi laborum facilis, consectetur
                minima in non. Facere enim obcaecati mollitia!
            </p>
            <button type="button" class="btn btn-warning" id="btn1">
                ติดต่อเรา
            </button>
            <button type="button" class="btn btn-outline-warning" id="btn2">
                เกี่ยวกับเรา
            </button>
        </div>
    </div>

    <!-- หน้าแนะนำเมนูรูปสไลด์ -->
    <div class="bgImg page2">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="Image_inventory/Home/BGRestau2.webp" alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Image_inventory/Home/BGRestau3.jpg" alt="Second slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Image_inventory/Home/BGRestau4.jpg" alt="Third slide" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="box-text">
                <h1>PROMOTION</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est,
                    asperiores nulla? Temporibus iste perspiciatis, excepturi error,
                    ducimus labore facilis saepe nostrum, repellendus distinctio quaerat
                    similique? Similique alias cum eos! Fuga optio facilis itaque velit
                    omnis soluta distinctio, delectus veritatis suscipit debitis nam
                    accusantium eum! Veritatis velit provident eaque quis laudantium!
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis
                    debitis quasi dolorem officiis nesciunt
                </p>
                <button type="button" class="btn btn-warning" id="btn1">
                    โปรโมชั่น
                </button>
                <button type="button" class="btn btn-outline-warning" id="btn2">
                    สมัครสมาชิก
                </button>
            </div>
        </div>
    </div>

    <div class="bgImg page3">
        <div class="shadow-tab"></div>
        <img src="Image_inventory/Home/BGRestau5.png" alt="" width="100%" />
        <div class="box-text">
            <h1>Menu</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est,
                asperiores nulla? Temporibus iste perspiciatis, excepturi error,
                ducimus labore facilis saepe nostrum, repellendus distinctio quaerat
                similique? Similique alias cum eos! Fuga optio facilis itaque velit
                omnis soluta distinctio, delectus veritatis suscipit debitis nam
                accusantium eum! Veritatis velit provident eaque quis laudantium!
                Lorem,
            </p>
            <button type="button" class="btn btn-warning" id="btn1">
                ดูเมนูทั้งหมด
            </button>
            <!-- <button type="button" class="btn btn-outline-warning" id="btn2">โปรโมชั่</button> -->
        </div>
    </div>

    <div class="bgImg page4">
        <img src="Image_inventory/Home/BGRestau6.jpg" alt="" width="100%" />
        <div class="box-text">
            <h1>Delivery / Pickup</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est,
                asperiores nulla? Temporibus iste perspiciatis, excepturi error,
                ducimus labore facilis saepe nostrum, repellendus distinctio quaerat
                similique? Similique alias cum eos! Fuga optio facilis itaque velit
                omnis soluta distinctio, delectus veritatis suscipit debitis nam
                accusantium eum! Veritatis velit provident eaque quis laudantium!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis
                debitis quasi dolorem officiis nesciunt reprehenderit est molestiae
                culpa itaque minima aperiam labore expedita assumenda, inventore
                quidem eum, magni reiciendis quis nisi veritatis perspiciatis ipsa
                eius facilis eaque. Quam minus eligendi laborum facilis, consectetur
                minima in non. Facere enim obcaecati mollitia!
            </p>
            <button type="button" class="btn btn-warning" id="btn1">
                สั่งเดลิเวอรี่
            </button>
            <button type="button" class="btn btn-outline-warning" id="btn1">
                รับที่ร้าน
            </button>
            <!-- <button type="button" class="btn btn-outline-warning" id="btn2">โปรโมชั่</button> -->
        </div>
    </div>

    <div class="bgImg page6">
        <img src="Image_inventory/Kitchen-Restaurant-1.png" alt="" width="100%" />
        <div class="box-text">
            <h1>Contact Us</h1>
            <p>
                คณะเทคโนโลยีสารสนเทศ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง 1
                ซอย ฉลองกรุง 1 แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520
            </p>
            <i class="bi bi-facebook"></i>
            <!-- <button type="button" class="btn btn-outline-warning" id="btn2">โปรโมชั่</button> -->
        </div>
    </div>

    <footer>
        <div class="footer d-flex justify-content-center w-100">
            <div class="box-footer container w-100">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <h2>KhunGame Restaurant</h2>
                        <br />
                        <p class="icontext">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad vero
                            vel quia facilis a hic aut laudantium, repudiandae doloribus
                            alias! Accusamus, asperiores similique voluptatum consequatur
                            dolorem praesentium modi
                        </p>
                        <div class="icon container">
                            <p class="row">
                                <a href="#" class="ic col-sm-3"><i class="fa-solid fa-phone"></i></a>
                                <a href="#" class="ic col-sm-3"><i class="fa-brands fa-square-facebook"></i></a>
                                <a href="#" class="ic col-sm-3"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="ic col-sm-3"><i class="fa-brands fa-youtube"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h2>FIND OUR RESTAURANT</h2>
                        <p class="icontext">
                            <i class="fa-solid fa-location-dot" id="locate"></i>คณะเทคโนโลยีสารสนเทศ
                            สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง 1 ซอย ฉลองกรุง 1
                            แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-12" id="col3">
                        <h2>WORKING HOURS</h2>
                        <br />
                        <p class="icontext">MONDAY UNTIL FRIDAY <br />09.00 - 23.00</p>
                        <br /><br />
                        <p>SATURDAY - SUNDAY <br />09.00 - 24.00</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //email valudation
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        // register example
        function gotosignup() {
            //ฝากไปทำ validate หน่อยนะ frontend
            var pass = true;
            if ($("#uName").val().length <= 8) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Username must be at least 8 characters!!",
                    timer: 1000,
                });
            } else if (!validateEmail($("#email").val())) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "email is invalid!!",
                    timer: 1000,
                });
            } else if ($("#rPassword").val().length <= 8) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Password must be at least 8 characters!!",
                    timer: 1000,
                });
            } else if ($("#fName").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "First name can't be empty!!",
                    timer: 1000,
                });
            } else if ($("#lName").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Last name can't be empty!!",
                    timer: 1000,
                });
            } else if ($("#phone").val().length <= 8) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Phone must be at least 8 characters!!",
                    timer: 1000,
                });
            } else if ($("#address").val().length <= 20) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Address must be at least 20 characters!!",
                    timer: 1000,
                });
            }

            if (pass) {
                $.ajax({
                    method: "post",
                    url: "./backend/api/signup.php",
                    data: {
                        username: $("#uName").val(),
                        password: $("#rPassword").val(),
                        email: $("#email").val(),
                        firstname: $("#fName").val(),
                        lastname: $("#lName").val(),
                        phone: $("#phone").val(),
                        address: $("#address").val(),
                    },
                    success: function (response) {
                        console.log("good", response);
                        var responseObject = JSON.parse(response);
                        console.log(responseObject.RespCode);
                        if (responseObject.RespCode == 200) {

                            Swal.fire({
                                icon: "success",
                                title: "Signup success!!",
                                timer: 1000,
                            });
                            window.location.href = "./test.php";

                        } else if (responseObject.RespCode == 400) {
                            Swal.fire({
                                icon: "error",
                                title: "Signup failed!!",
                                timer: 1000,
                            });
                        }
                    },
                    error: function (err) {
                        console.log("badmakmak", err);
                    },
                });
            }
        }

        function gotologin() {
            var pass = true;
            if ($("#uNameOrEmail").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Please insert username",
                    timer: 1000,
                });
            } else if ($("#lPassword").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Please insert username",
                    timer: 1000,
                });
            }
            if (pass) {
                console.log("go to login...");
                $.ajax({
                    method: "post",
                    url: "./backend/api/login.php",
                    data: {
                        username: $("#uNameOrEmail").val(),
                        password: $("#lPassword").val(),
                    },
                    success: (response) => {
                        console.log("valid", response);
                        console.log(response);
                        var responseObject = JSON.parse(response);
                        if (responseObject.RespCode == 200) {

                            localStorage.setItem("username", responseObject.RespUsername);
                            localStorage.setItem("uid", responseObject.RespUid);
                            Swal.fire({
                                icon: "success",
                                title: "Login success!!",
                                timer: 1000,
                            });
                            window.location.href = "./test.php";
                            // window.location.href = "./menu.html";
                        } else {
                            console.log('test1')
                            Swal.fire({
                                icon: "error",
                                title: "Something went wrong!",
                                timer: 1000,
                            });
                        }
                    },
                    error: (err) => {
                        console.log('test1')

                        console.log("error", err);
                    },
                });
            }
        }

        function gotologout() {
            console.log("go to logout");
            <?php
            unset($_SESSION['username']);
            unset($_SESSION['uID']);
            session_destroy();
            ?>
            window.location.href = "./test.php";
        }
    </script>
</body>

</html>