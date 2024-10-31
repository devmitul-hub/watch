<?php
include("connection.php");
session_start();
$u_id = $_SESSION['user_data']['user_id'];
$select = $conn->query("SELECT * FROM order_details WHERE user_id=" . $u_id);
$fetch = $select->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Timepieces Invoice</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .invoice-container {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #1a5f7a;
            padding-bottom: 20px;
        }

        .invoice-header h1 {
            color: #1a5f7a;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .invoice-header img {
            max-width: 150px;
            margin-bottom: 15px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .invoice-details>div {
            flex-basis: 48%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #1a5f7a;
        }

        .total {
            text-align: right;
            font-weight: bold;
            font-size: 1.1em;
        }

        .footer {
            text-align: left;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
            border-top: none;
            padding-top: 20px;
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

        @media print {
            body {
                background-color: #ffffff;
            }

            .invoice-container {
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <img src="./img/main_logo_2.png">
            <!-- <h1>Watch Empire</h1> -->
            <p>Rajkamal chowk ,Amreli,365601</p>
            <p>Phone: +9909909909 | Email: watchempire@gmail.com</p>
        </div>

        <div class="invoice-details">
            <div>
                <h3>Bill To:</h3>
                <p>Watch Empire<br>
                    Rajkamal chowk <br>
                    Amreli,365601</p>
            </div>
            <div>
                <h3>Invoice Details:</h3>
                <p><b>name: <?php echo $fetch['first_name'];
                            echo $fetch['last_name']; ?></b>
                    <br />email : <?php echo $fetch["email"]; ?><br>
                    address : <?php echo $fetch["address"]; ?> <br>
                    Phone : <?php echo $fetch["contact_number"]; ?>
                </p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = $conn->query("SELECT * FROM order_details WHERE user_id='" . $u_id . "'  AND order_status ='n' ");
                $count = 1;
                $total = 0;

                while ($fetch = $select->fetch_assoc()) {
                    $total += $fetch['total'];
                    $_SESSION["total"] = $fetch['grand_total'];

                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $fetch['pro_name']; ?></td>
                        <td><?php echo $fetch['pro_quantity']; ?></td>
                        <td><?php echo $fetch['pro_price']; ?></td>
                        <td><?php echo $fetch['total']; ?></td>
                    </tr>
                <?php
                    $count++;
                }
                ?>
            </tbody>
        </table>
        <?php
        $select = $conn->query("SELECT * FROM order_details WHERE user_id='" . $u_id . "'  AND order_status ='n' ");
        $fetch = $select->fetch_assoc();
        ?>
        <div class="total">
            <p>Subtotal: ₹<?php echo $total; ?></p>
            <p>Grand Total: ₹ <?php echo $_SESSION["total"] ?></p>
        </div>
        <div class="footer">
            <div class="terms">
                <p class="tc ">Your order delivery within 5 to 6 days.</p>
                <br>
                <?php

                if (isset($_POST['go_home'])) {
                    $update = $conn->query("UPDATE order_details set order_status='y'");
                    if ($update) {
                        // header("Location: indexsss.php");
                        echo "<script> window.location.href = 'index.php'</script>";
                        exit; // Stop execution after redirect
                    }
                }
                ?>

                <form method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" name="go_home" class="go_home btn" value="continew shopping">
                                <!-- <a href="index.php">Go to Home page</a> -->

                                <button onclick="window.print()" class="btn">Print</button>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
            <!-- <p>Thank you </p> -->

        </div>

    </div>
</body>

</html>