<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Enhanced Website Footer Example</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         min-height: 100vh;
         display: flex;
         flex-direction: column;
      }

      .content {
         flex: 1;
      }

      footer {
         background-color: #1e0342;
         color: #ecf0f1;
         padding: 40px 0 20px;
      }

      .footer-content {
         max-width: 1200px;
         margin: 0 auto;
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
         gap: 30px;
         padding: 0 20px;
      }

      .footer-section h3 {
         color: #3498db;
         margin-bottom: 20px;
      }

      .footer-section p {
         line-height: 1.6;
      }

      .social-icons {
         display: flex;
         gap: 15px;
         margin-top: 15px;
      }

      .social-icons a {
         color: #ecf0f1;
         text-decoration: none;
         transition: color 0.3s ease;
      }

      .social-icons a:hover {
         color: #3498db;
      }

      .newsletter-form {
         display: flex;
         flex-wrap: wrap;
         gap: 10px;
      }

      .newsletter-form input[type="email"] {
         flex: 1;
         min-width: 120px;
         padding: 10px;
         border: none;
         border-radius: 4px;
      }

      .newsletter-form button {
         padding: 10px 20px;
         background-color: #3498db;
         color: white;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      .newsletter-form button:hover {
         background-color: #2980b9;
      }

      .footer-bottom {
         text-align: center;
         margin-top: 40px;
         padding-top: 20px;
         border-top: 1px solid #34495e;
      }

      li {
         list-style: none;
      }

      @media (max-width: 768px) {
         .footer-content {
            grid-template-columns: 1fr;
         }

         .footer-section {
            text-align: center;
         }

         .social-icons {
            justify-content: center;
         }
      }

      ul.social_icon {
         width: 780px !important;
         position: relative;
         left: 330px;
         border-bottom: #FFF solid 1px;
      }
      h3{
         font-size: 30px !important;
      }
   </style>
</head>

<body>
   <footer>
      <div class="col">
         <ul class="social_icon text_align_center">
            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
            <li> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
         </ul>
      </div>
      <div class="footer-content">

         <div class="footer-section">
            <h3>About Us</h3>
            <p>We are a company dedicated to creating amazing websites and digital experiences that inspire and engage.</p>
         </div>
         <div class="footer-section">
            <h3>Contact</h3>
            <p>Email: Watch@gmail.com</p>
            <p>Phone: 9904995897</p>
            <p>Address: Rajkamal chowk,Amreli,365601</p>
         </div>
         <div class="footer-section">
            <h3>Explore</h3>
            <ul class="xple_menu">
               <li><a href="index.php">Home</a></li>
               <li><a href="aboutus.php">About</a></li>
               <li><a href="services.php">Services</a></li>
               <li><a href="contact_us.php">Contact Us</a></li>
            </ul>

         </div>
         <div class="footer-section">
            <h3>Newsletter</h3>
            <p>Subscribe to our newsletter for exclusive content and offers.</p>
            <form class="newsletter-form">
               <input type="email" placeholder="Enter your email" required>
               <button type="submit">Subscribe</button>
            </form>
         </div>
      </div>
      <div class="footer-bottom">
         <p>&copy; 2024 Watch Empire. All rights reserved.</p>
      </div>
   </footer>
</body>

</html>