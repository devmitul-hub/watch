<?php
include 'connection.php';

if (isset($_POST['admin_login_btn'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $select = "select * FROM registration where email='" . $email . "' AND password='" . md5($password) . "'";
    $query = $conn->query($select);

    $login_fetch = $query->fetch_array();
    if ($login_fetch) {

        session_start();
        $_SESSION['user_data'] = $login_fetch;

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Login Successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error',
                    text: 'Username And Password Are Wrong',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            });
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="js/semantic.min.html" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f9fafb;
            display: grid;
            height: 100vh;
            place-items: center;
        }

        .containers {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px,
                rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
            max-width: 750px;
            background-color: white;
            padding: 2.3em;
            width: 100%;
            height: 470px;
            border-radius: 7px;
            position: relative;
        }

        .btn {
            padding: 15px 100px;
            border: 1px solid #1e0342;
            background-color: #1e0342;
            color: white;
            border-radius: 50px;
            margin-top: 11px;
            transition: all 0.2s ease-in-out;
        }
        hr {
      margin: 1rem 0;
      border: 0;
      opacity: 1;
      width: 50%;
      margin: 0 auto;
      border-color: #1E0342 !important;
    }
    </style>
</head>

<body>
    <div class="containers">
        <div class="heading text-center">
            <h1 class="heading-text">Login</h1>
            <hr class="border-top  border-4 mb-3  rounded" />
        </div>
        <div class="sign_in">
            <form id="loginForm" method="POST">
                <div class="mb-4">
                    <h4 for="exampleFormControlInput1" class="form-label">Email</h4>
                    <input type="text" class="form-control" name="email" style="padding: 13px" placeholder="Enter Admin name" required/>
                </div>
                <div class="mb-4">
                    <h4 for="exampleFormControlTextarea1" class="form-label">Password</h4>
                    <input type="password" name="password" class="form-control" style="padding: 13px" placeholder="Enter Admin password" required />
                </div>
                <div class="row">
          <div class="pt-1  text-center">
            <button class="btn btn-primary btn-block" type="submit" name="admin_login_btn">Login</button>
          </div>
        </div>
                <br>
                <p>Don't have an account?<a href="registration.php">Register here</a> </p>
            </form>
        </div>
    </div>
    <script src="js/custom.js"></script>
    <script src="../admin/../js/sweetalert2@11.js"></script>

</body>

</html>