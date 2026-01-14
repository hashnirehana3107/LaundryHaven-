<!DOCTYPE html>
<html>
<head>
<title>Contact us </title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link
      rel="icon"
      href="./Assets/IMG/favicon_io/favicon.ico"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./CSS/header-footer.css" />
    <link rel="stylesheet" href="./CSS/homepage.css" />
    <link rel="stylesheet" href="./CSS/login-form.css" />
  
<link rel="stylesheet" href="./CSS/contactUs.css">
</head>
<body>
    <!-- Header Section -->
    <div id="full-page-overlay"></div>
    <header>
      <div id="small-navbar">
        <span>Sign Up to receive a discount today</span>
        <span id="login-link">SIGN IN </span>
        <span><a href="./faq-page.html">FAQs</a></span>
      </div>
      <div id="main-navbar">
        <span>
          <img
            id="logo-main-nav"
            src="./Assets/IMG/logo.png"
            alt="company-logo"
          />
        </span>
        <span><a href="./homepage.php">Home</a></span>
        <span><a href="./Services.php">Our Services</a></span>
        <span><a href="./about-us.html">About Us</a></span>
        <span><a href="./contactUs.php">Contact Us</a></span>
        <span id="wash-basket" class="material-symbols-outlined">
          <a href="./cart.php">shopping_basket</a>
        </span>
        <!-- <span id="account-button" class="material-symbols-outlined">
          <a href="#">account_circle</a>
        </span> -->
      </div>
    </header>
<main>

</section>
<div class="contactUs_part2" id="contactUs_part2">
    <form action="./cusindex.php" method="post">
    <label for="Fname"><b>First Name:</b></label><br>
    <input type="text" name="fname" id="Fname"class="inputs" ><br>
    <label for="Lname"><b>Last Name:</b></label><br>
    <input type="text" name="lname" id="Lname"class="inputs" ><br>
    <label for="Email"><b>Email:</b></label><br>
    <input type="email" name="email" id="Email" class="inputs"><br>
    <label for="ContactNo"><b>Contact Number:</b></label><br>
    <input type="tel" name="contactNo" id="ContactNo"class="inputs"><br>
    <label for="Inquiry"><b>Inquire:</b></label><br>
    <textarea name="inquiry" id="Inquiry"class="input_box" rows="10" cols="30"></textarea><br>
    
    <input type="submit" value="Submit" id=""class="input_button">
    
    
    <input type="reset" value="Reset " id=""class="input_button">
</form>
</div>

<div class="contactUs_part1" id="contactUs_part1">
    <h1>Contact Us</h1>
        <table>
        <tr><td><img src="https://www.lineex.es/wp-content/uploads/2016/06/phone-icon.png" alt="tele" width="100px" height="100px"></td>
        <td ><h2 class="td1">Call Now </h2><b class="td1">Tel:+123455665</b></td>
        </tr>
        <tr><td><img src="https://tse2.mm.bing.net/th?id=OIP.j8N7dLYIpiJYj7qjYUhfMgHaHa&pid=Api&P=0&h=220" alt="tele" width="100px" height="100px"></td>
            <td ><h2 class="td1">Email</h2><b class="td1">mail to:info@laundryheaven.au</b></td>
            </tr>
    </table>
    

</div>
<form action=""></form>

</main>


<footer>
      <div id="footer-content-wrapper">
        <div class="footer-content"> 
          <p><a href="./homepage.php">Home</a></p>
          <p><a href="./Services.php">Our Services</a></p>
          <p><a href="./about-us.html">About Us</a></p>
          <p><a href="./contactUs.php">Contact Us</a></p>
        </div>
        <div class="footer-content">
          <h2></h2>
          <p><a href="#">News</a></p>
          <p><a href="./faq-page.html">FAQs</a></p>
          <p><a href="./Terms and Conditions.html">T&Cs</a></p>
          <p><a href="./Privacy policy.html">Privacy Policy</a></p>
        </div>
        <div class="footer-content">
          <h2>Our Services</h2>
          <p><a href="./service - Wash and Fold.html">Wash &amp; Fold</a></p>
          <p><a href="./service - Dry Cleaning.html">Dry Cleaning</a></p>
          <p><a href="./service - Wash Dry and Iron.html">Wash, Dry &amp; Iron</a></p>
          <p><a href="./service - iron only.html">Iron Only</a></p>
          <p><a href="./Services.php">More</a></p>
        </div>
        <div class="footer-content">
          <h2>Contact Us</h2>
          <div id="mail-container">
            <img class="footer-icon" src="./Assets/IMG/mail.png" alt="" />
            <span
              ><a href="mailto:info@laundryhaven.au"
                >info@laundryhaven.au</a
              ></span
            >
          </div>
          <div id="phone-container">
            <img class="footer-icon" src="./Assets/IMG/phone.png" alt="" />
            <span><a href="tel:+61 4 1234 5678">+61 4 1234 5678</a></span>
          </div>
        </div>
      </div>
      <div id="footer-copyright">
        <p>&copy; 2024 laundryhaven.au All rights reserved.</p>
      </div>
    </footer>

</body>




</html>