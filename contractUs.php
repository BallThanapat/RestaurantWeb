<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contractUs.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Font Common-text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&family=Permanent+Marker&display=swap"
        rel="stylesheet">

    <!-- Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var radio1 = document.getElementById('btnradio1');
            var radio2 = document.getElementById('btnradio2');
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');
            var buttonBar1 = document.getElementById('buttonBar1');
            var buttonBar2 = document.getElementById('buttonBar2');

            radio1.addEventListener('change', function () {
                if (radio1.checked) {
                    form1.style.display = 'block';
                    form2.style.display = 'none';
                    buttonBar1.style.backgroundColor = 'orange';
                    buttonBar2.style.backgroundColor = 'white';
                    buttonBar1.style.color = 'white';
                    buttonBar2.style.color = 'black';
                }
            });

            radio2.addEventListener('change', function () {
                if (radio2.checked) {
                    form1.style.display = 'none';
                    form2.style.display = 'block';
                    buttonBar2.style.backgroundColor = 'orange';
                    buttonBar1.style.backgroundColor = 'white';
                    buttonBar1.style.color = 'black';
                    buttonBar2.style.color = 'white';
                }
            });
        });
    </script>

    <title>Contract Us</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-xxl navbar-dark">
            <div class="container-fluid">
                <a href="index.php" class="header-link">KITCHENHOME</a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="navbar01 collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="index.php" class="links nav-link" id="">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a href="promotion.php" class="links nav-link" id="">โปรโมชั่น</a>
                        </li>
                        <li class="nav-item">
                            <a href="menu.php" class="links nav-link" id="">เมนูทั้งหมด</a>
                        </li>
                        <?php
                        if (isset($_SESSION["username"])) {
                            $username = $_SESSION["username"];
                            echo "<li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle links\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            $username
                            </a>
                            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                <li><a class=\"dropdown-item\" href=\"user_profile/user_profile.php\">โปรไฟล์</a></li>
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
                        <li class="nav-item">
                            <a href="contractUs.php" class="links nav-link" id="">ติดต่อเรา</a>
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
            </div>
        </div>
    </div>

    <div class="bgImg">
        <!-- <img src="Image_inventory/Home/BGRestau1.webp" alt="" width="100%"> -->
        <img src="Image_inventory/ContractUs/foodStrorage.jpg" alt="" width="100%">

        <div class="box-text w-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h1>ที่อยู่</h1>
                        <p>คณะเทคโนโลยีสารสนเทศ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง 1 ซอย ฉลองกรุง 1
                            แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7751.638226068855!2d100.77202249284046!3d13.72939879664036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d66308ce98ffd%3A0xcb43a76f038c38ca!2z4LiE4LiT4Liw4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Liq4Liy4Lij4Liq4LiZ4LmA4LiX4LioIOC4quC4luC4suC4muC4seC4meC5gOC4l-C4hOC5guC4meC5guC4peC4ouC4teC4nuC4o-C4sOC4iOC4reC4oeC5gOC4geC4peC5ieC4suC5gOC4iOC5ieC4suC4hOC4uOC4k-C4l-C4q-C4suC4o-C4peC4suC4lOC4geC4o-C4sOC4muC4seC4hyAoSVRLTUlUTCk!5e0!3m2!1sth!2sth!4v1709218587479!5m2!1sth!2sth"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-5 col-md-12 right ms-auto">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div>
                                        <p>Tel. 000-000-0000</p>
                                    </div>
                                    <div>
                                        <p>Email: xxx@gmail.com</p>
                                    </div>
                                    <div>
                                        <p>Facebook: กรุงศรีอยุธยาพาเจริญ</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <h1>วันเปิดทำการ</h1>
                                    <p>MONDAY UNTIL FRIDAY<br>
                                        09.00 - 23.00</p>
                                    <p>SATURDAY - SUNDAY<br>
                                        09.00 - 24.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="footer d-flex justify-content-center w-100">
            <div class="box-footer container w-100">
                <div class="row ">
                    <div class="col-lg-5 col-md-12">
                        <h2>KhunGame Restaurant</h2><br>
                        <p class="icontext">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Ad vero vel quia facilis a hic aut laudantium, repudiandae doloribus alias!
                            Accusamus, asperiores similique voluptatum consequatur dolorem praesentium modi
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
                        <p class="icontext"><i class="fa-solid fa-location-dot" id="locate"></i>คณะเทคโนโลยีสารสนเทศ
                            สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง
                            1 ซอย ฉลองกรุง 1 แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520</p>
                    </div>
                    <div class="col-lg-3 col-md-12" id="col3">
                        <h2>WORKING HOURS</h2><br>
                        <p class="icontext">MONDAY UNTIL FRIDAY <br>09.00 - 23.00 </p><br><br>
                        <p>SATURDAY - SUNDAY <br>09.00 - 24.00</p>
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
                    timer: 5000,
                });
            } else if (!validateEmail($("#email").val())) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "email is invalid!!",
                    timer: 5000,
                });
            } else if ($("#rPassword").val().length <= 8) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Password must be at least 8 characters!!",
                    timer: 5000,
                });
            } else if ($("#fName").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "First name can't be empty!!",
                    timer: 5000,
                });
            } else if ($("#lName").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Last name can't be empty!!",
                    timer: 5000,
                });
            } else if ($("#phone").val().length <= 8) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Phone must be at least 8 characters!!",
                    timer: 5000,
                });
            } else if ($("#address").val().length <= 20) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Address must be at least 20 characters!!",
                    timer: 5000,
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
                        try {
                            var responseObject = JSON.parse(response);
                            console.log(responseObject.RespCode);
                            if (responseObject.RespCode == 200) {

                                Swal.fire({
                                    icon: "success",
                                    title: "Signup success!!",
                                    timer: 5000,
                                });
                                window.location.href = "./index.php";

                            } else if (responseObject.RespCode == 400) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Signup failed!!",
                                    timer: 5000,
                                });
                            }
                        } catch (error) {
                            Swal.fire({
                                icon: "error",
                                title: "Something went wrong!",
                                timer: 5000,
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
                    timer: 5000,
                });
            } else if ($("#lPassword").val().length <= 0) {
                pass = false;
                Swal.fire({
                    icon: "error",
                    title: "Please insert username",
                    timer: 5000,
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
                        try {
                            var responseObject = JSON.parse(response);
                            if (responseObject.RespCode == 200) {

                                localStorage.setItem("username", responseObject.RespUsername);
                                localStorage.setItem("uid", responseObject.RespUid);
                                Swal.fire({
                                    icon: "success",
                                    title: "Login success!!",
                                    timer: 5000,
                                });
                                window.location.href = "./index.php";
                                // window.location.href = "./menu.html";
                            } else {
                                console.log('test1')
                                Swal.fire({
                                    icon: "error",
                                    title: "Something went wrong!",
                                    timer: 5000,
                                });
                            }
                        } catch (error) {
                            Swal.fire({
                                icon: "error",
                                title: "Something went wrong!",
                                timer: 5000,
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
            $.ajax({
                url: "./backend/api/logout.php", // URL of the server-side script to handle the logout
                type: "POST",
                success: function (response) {
                    // Redirect to the login page or perform any other actions after logout
                    Swal.fire({
                        icon: "success",
                        title: "Logout success!!",
                        timer: 5000,
                    });
                    window.location.href = "./index.php";
                },
                error: function (xhr, status, error) {
                    // Handle error if AJAX request fails
                    console.log("AJAX Error: " + error);
                }
            });
        }
    </script>
</body>

</html>