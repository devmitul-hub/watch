<?php
include("connection.php");
include("header.php");
if (isset($_POST['contact'])) {
  // Sanitize input values
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $number = $conn->real_escape_string($_POST['number']);
  $message = $conn->real_escape_string($_POST['message']);

  // Build contact array
  $contact = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'contact' => $_POST['number'],
    'message' => $_POST['message'],
  ];



  // Prepare column and value strings
  $col = implode(',', array_keys($contact));
  $val = implode("','", array_values($contact));

  // Insert query
  $insert_data = $conn->query("INSERT INTO contact ($col) VALUES ('$val')");

  // Check if the data was inserted successfully
  if ($insert_data) {
    echo "<script>alert('Contact information successfully inserted');</script>";
  } else {
    echo "<script>alert('Try again');</script>";
  }
}

?>
<section class="page__title__wrapper text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page__title__inner">
          <h1 class="text-white">CONTACT US</h1>
        </div>
      </div>
      <div class="col-md-12 d-flex align-items-center justify-content-center">
        <h3 class="mb-0 me-3 text-white">Home</h3>
        <i class="fa-solid fa-chevrons-right me-2 text-white"></i>
        <h3 class="mb-0 text-white">Contact Us</h3>
      </div>
    </div>
  </div>
</section>

<div class="container mt-5">
  <h1 class="mb-4 text-center">Contact Us</h1>
  <hr class="new1 mb-5 mt-4">

  <div class="row">
    <div class="col-md-6 mb-4  mt-5 mb-md-0">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59354.47778012819!2d71.17985091733672!3d21.5993912800711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395880c72d516845%3A0x4e950cffb505bb12!2sAmreli%2C%20Gujarat%20365601!5e0!3m2!1sen!2sin!4v1728561839430!5m2!1sen!2sin"
        width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-md-6">
      <form method="POST">
        <div class="mb-3">
          <label for="name" class="form-label text-dark">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-dark">Email address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="number" class="form-label text-dark">Number</label>
          <input type="number" class="form-control" name="number" id="number" placeholder="Enter number" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label text-dark">Message</label>
          <textarea class="form-control" name="message" id="message" rows="5"
            placeholder="Enter your message" required></textarea>
        </div>
        <input type="submit" class="btn btn-primary mb-5 w-100" name="contact" value="Submit">
      </form>
    </div>
  </div>
</div>
<!-- end book section -->
<?php
include("footer.php");
?>