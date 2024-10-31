<?php
include("connection.php");
error_reporting(0);

session_start();
$u_id = $_SESSION['user_data']['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- csss -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstraplink -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- <script src="./bootstrap/js/bootstrap.bundle.js"></script> -->
    <!-- popinse second font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- alrt massage -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Watch Empire</title>
</head>


<body class="position-relative">
    <header>
        <div class="header-top-area  d-none d-md-block">
            <div class="container">
                <div class="row py-0 d-flex justify-content-center">

                    <div class="col-4 d-flex">
                        <i class="fa-sharp fa-solid fa-phone-rotary header_icon mt-3 mr-2"></i>
                        <p class="mt-3 ms-1 text-white" style="font-family: Poppins, sans-serif;font-size:14px"> 9904995897 | Watch@gmail.com
                        </p>
                    </div>

                    <div class="col-4 d-flex justify-content-center">
                        <i class="fa-sharp fa-solid fa-location-dot header_icon me-2 mt-3 mr-2"></i>
                        <p class="mt-3 ms-1 text-white" style="font-family: Poppins, sans-serif;font-size:14px;  margin-top: 10px;
    margin-right: 10px"> Rajkamal chowk ,Amreli</p>
                    </div>

                    <div class="col-4 d-flex justify-content-end text-white">
                        <h4 class="mt-2 py-3" style="position:reletive !important;top:10px;font-size:15px !important;">
                            <?php
                            $up_user = $conn->query("SELECT * FROM registration WHERE user_id='" . $u_id . "' ");
                            $fetch = mysqli_fetch_array($up_user);

                            echo $fetch["username"];
                            ?>
                        </h4>

                        <div class="nav-item navs_name d-flex">

                            <a class="nav-link" href="login.php"><i class="fa-solid fa-user text-white"></i>
                            </a>

                        </div>


                        <div class="nav-item navs_name ">
                            <span> <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart text-white"
                                        aria-hidden="true"></i>
                                    <em class="roundpoint" id="cartItemCount">
                                        <?php $select = "SELECT COUNT(cart_id) AS itemCount FROM cart WHERE user_id='" . $_SESSION['user_data']["user_id"] . "' AND status='cart'";
                                        $query = mysqli_query($conn, $select);
                                        $row = mysqli_fetch_assoc($query);
                                        $itemCount = $row['itemCount'];
                                        echo $itemCount;
                                        ?></em></a></span>
                        </div>
                        <div class="col-1 text-white text-end">
                            <form method="POST">
                                <?php if (isset($_SESSION['user_data'])) {
                                ?>
                                    <button type="submit" name="logout" class="logout">Logout</button>
                                <?php

                                } else {
                                ?>
                                 <a href="login.php" type="submit" name="login" class="login">LOGIN</a>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <?php
                        if (isset($_POST['logout'])) {
                            // Clear all session data
                            session_unset();
                            session_destroy();

                            // Output the SweetAlert script after destroying the session
                            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>"; // Ensure SweetAlert2 is included
                            echo "<script>
              Swal.fire({
                  title: 'Logout Successfully',
                  icon: 'success',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'index.php'; // Redirect after confirmation
                  }
              });
          </script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm  py-3 position-relative bg-white">
            <div class="container">
                <a class="navbar-brand logo-brand ms-3" href="index.php">
                    <img src="img/main_logo_2.png" data-aos="flip-left" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="
    position: relative;
    top: 7px;
" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-3">
                        <li class="nav-item navs_name me-3 p-0">
                            <a class="nav-link navs_name" aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item  navs_name me-3 p-0">
                            <a class="nav-link" href="aboutus.php">ABOUT US</a>
                        </li>



                        <li class="nav-item navs_name dropdown me-3 p-0">
                            <a class="nav-link dropdown-toggle" href="#" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BRANDS</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                // Ensure that $conn is properly connected to the database
                                // Assuming $conn is already initialized and connected elsewhere in your code

                                $select = $conn->query("SELECT * FROM category");
                                ?> <a class="dropdown-item" href="all_brand.php">All brand </a>
                                <?php while ($fetch = mysqli_fetch_array($select)) {
                                    // Display each category with a link (modify href as needed)
                                ?>
                                    <a class="dropdown-item"
                                        href="brand.php?cate_id=<?php echo $fetch['category_id']; ?>"><?php echo htmlspecialchars($fetch['category_name']); ?></a>
                        </li>
                    <?php
                                }

                    ?>
                    </ul>
                    </li>
                    <li class="nav-item  navs_name me-3 p-0">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item  navs_name me-3 p-0">
                        <a class="nav-link " href="contact_us.php">CONTACT US</a>
                    </li>
                    </ul>
                    <!-- <ul class="navbar-nav">
                        <h5 class="m-2">
                            <?php
                            if (isset($_SESSION['user_data']) && isset($_SESSION['user_data']['username'])) {
                                echo $_SESSION['user_data']['username'];
                            }
                            ?>
                        </h5>
                        <li class="nav-item navs_name d-flex">

                            <a class="nav-link"><i class="fa-solid fa-user"></i>
                            </a>

                        </li>

                        <li class="nav-item navs_name">
                            <a class="nav-link"><i class="fa-solid fa-cart-circle-plus"></i></a>
                        </li>
                        <li class="nav-item navs_name">
                            <a class="nav-link" href="logout.php" onclick="log()"><i class="fa-solid fa-right-from-bracket">
                                    <script>
                                        function log() {
                                            alert("are you ready for login out");
                                        }
                                    </script>
                                </i></a>
                        </li>

                    </ul> -->



                </div>
            </div>
        </nav>
    </header>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
        document.getElementById('decrease').addEventListener('click', function() {
            var quantityElement = document.getElementById('quantity');
            var quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantityElement.textContent = quantity - 1;
            }
        });

        document.getElementById('increase').addEventListener('click', function() {
            var quantityElement = document.getElementById('quantity');
            var quantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = quantity + 1;
        });
    </script>

    <script>
        AOS.init();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>