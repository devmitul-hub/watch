<?php
require_once('connection.php');
session_start();

$session_id = $_SESSION['user_data']['user_id'];



if (isset($_POST['proccess_to_pay_btn'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $city = $_POST['select_city'];
    // $Pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $update_order = mysqli_query($conn, "update order_details set status='conform', first_name='" . $first_name . "', last_name='" . $last_name . "',contact_number='" . $number . "',email='" . $email . "',city='" . $city . "',address='" . $address . "'");
    // $order_select = $conn->query("SELECT * FROM `order_tbl` WHERE order_id='$session_id' AND status='pandding'");

    // while ($order_fetch = $order_select->fetch_assoc()) {
    //     $order_id = $order_fetch['order_id'];
    //     $payment_data = [
    //         'user_id' => $session_id,
    //         'order_id' => $order_id,
    //         'first_name' => $_POST['first_name'],
    //         'last_name' => $_POST['last_name'],
    //         'contact_number' => $_POST['number'],
    //         'email' => $_POST['email'],
    //         'city' => $_POST['select_city'],
    //         'pincode' => $_POST['pincode'],
    //         'address' => $_POST['address'],
    //     ];
    //     echo "<pre>";
    //     print_r($payment_data);
    //     $cols = implode(',', (array_keys($payment_data)));
    //     $vals = implode("','", (array_values($payment_data)));
    //     $payment = $conn->query("INSERT INTO payments ($cols) values('$vals')");
    // }
    // exit;
    if ($update_order) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'order comform',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'invoice.php';
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
    <title>Styled Bootstrap Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            color: #1e0342;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: 500;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            width: 100%;
        }
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
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Order details</h2>
            <form method="POST">
                <div class="row mb-3">
                    <div class="col">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="firstName"
                            placeholder="Enter first name" required />
                    </div>
                    <div class="col">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lastName"
                            placeholder="Enter last name" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                        required />
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">number</label>
                    <input type="number" name="number" class="form-control" id="email" placeholder="Enter number"
                        required />
                </div>

                <div class="form-group mb-3 p-0">
                    <label for="inputState" class="mb-2">City</label>
                    <select id="inputState" class="form-select " name="select_city" value="" required=""
                        fdprocessedid="wlpv3">
                        <option value="Amreli">Amreli</option>
                        <option value="Amreli">Rajkot</option>
                        <option value="Amreli">Bhavnagar</option>
                        <option value="Amreli">Surat</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter address"
                        required />
                </div>
                <input type="submit" name="proccess_to_pay_btn" class="btn btn-primary"></input>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>