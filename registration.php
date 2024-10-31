<?php
session_start();
include("connection.php");
if (isset($_POST['register_btn'])) {
  // $path = 'image/';
  // $filename = $_FILES["user_image"]["name"];
  // $tempname = $_FILES["user_image"]["tmp_name"];
  // $uploadOk = true;

  $userdata = [
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => md5($_POST['password']),
    'number' => $_POST['number'],
    'address' => $_POST['address'],
    'gender' => $_POST['gender'],
    // 'image' => $filename,
    'date_time' => date("Y-m-d H:i:s")
  ];
  $col = implode(',', array_keys($userdata));
  $val = implode("','", array_values($userdata));

  $inserdata_query = "INSERT INTO registration ($col) VALUES ('$val')";
  $insert_data = $conn->query($inserdata_query);

  if ($insert_data) {
    // if (!is_null($filename)) {
    //   move_uploaded_file($tempname, $path . $filename);
    // }
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              title: 'Registration Successfully',
              icon: 'success',
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
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
      height: 600px;
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
      <h1 class="heading-text">Registration</h1>
      <hr class="border-top border-4 mb-3 rounded" />
    </div>
    <div class="sign_in">
      <form id="loginForm" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-outline ">
              <h4 class="form-h4 mt-4" for="form2Example17">Username</h4>
              <input type="text" id="form2Example17" class="form-control pt-2 pb-2" name="username" placeholder="Enter Your Username" required />
              <div class="invalid-feedback">
                Please provide a Username.
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="form-outline">
              <h4 class="form-h4">Password</h4>
              <input type="password" name="password" class="form-control" required pattern=".{4,}" placeholder="Enter your password" title="Four or more characters" />
              <div class="invalid-feedback">
                Please provide a password.
              </div>
            </div>
          </div>



        </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <h4 class="form-h4 mt-4">Email</h4>
              <input type="email" name="email" class="form-control pt-2 pb-2" required placeholder="Enter Your Email" />
              <div class="invalid-feedback">
                Please provide an Email.
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-4 mb-4">
            <div class="form-outline">
              <h4 class="form-h4" for="phoneNumber">Phone Number</h4>
              <input type="tel" id="phoneNumber" name="number" class="form-control" required pattern="\d{10}" placeholder="Enter your Phone Number" title="Enter 10 digits" />
              <div class="invalid-feedback">
                Please provide a valid phone number.
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <h4 class="form-h4" for="address">Address</h4>
              <textarea class="form-control" name="address" required placeholder="address"></textarea>
              <div class="invalid-feedback">
                Please provide your Address.
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="form-outline">
              <h4 class="mb-2 pb-1">Gender</h4>
              <div class="form-check form-check-inline">
                <input class="form-check-input mt-3" type="radio" name="gender" value="male" checked />
                <h4 class="form-check-h4 mt-2">Male</h4>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input mt-3" type="radio" name="gender" value="female" />
                <h4 class="form-check-h4 mt-2">Female</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="pt-1 mb-4 text-center">
            <button class="btn btn-primary btn-block" type="submit" name="register_btn">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()

    const imageInput = document.querySelector('#imageInput');
    const previewImage = document.getElementById('previewImage');
    const imgElement = previewImage.querySelector('img');

    imageInput.addEventListener('change', () => {
      if (imageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          imgElement.src = e.target.result;
          previewImage.classList.remove("d-none");
        };
        reader.readAsDataURL(imageInput.files[0]);
      } else {
        previewImage.classList.add("d-none");
      }
    });
  </script>
</body>

</html>