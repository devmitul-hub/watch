<?php
include 'connection.php';

if (isset($_POST['admin_login_btn'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $select = "select * FROM admin_login where username='" . $username . "' AND password='" . $password . "'";
    $query = $conn->query($select);

    $login_fetch = $query->fetch_array();
    if ($login_fetch) {

        session_start();
        $_SESSION['admin_data'] = $login_fetch;

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
                        window.location.href = 'adm_login.php';
                    }
                });
            });
        </script>";
    }
}
?>
<html>

<head>
    <!-- csss -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootstraplink -->
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9">
    </script>


</head>

<body>
    <img src="./img/login.webp">
    <form method="POST" class="admin_form"> <!-- Set the correct action here -->
        <h1>Admin Login Here</h1>
        <hr class="border-top  border-4 mb-3  rounded" >

        <label for="username" class="text-dark">Username </label>
        <input type="text" name="username" placeholder="Enter your Email" id="email" required>

        <label for="password" class="text-dark">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required>

        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="Login" name="admin_login_btn">
        </div>
    </form>
</body>

</html>