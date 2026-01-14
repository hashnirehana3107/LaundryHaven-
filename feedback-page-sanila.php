<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Order</title>

    <link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

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

    <link rel="stylesheet" href="./CSS/header-footer.css">
    <link rel="stylesheet" href="./CSS/homepage.css">
    <link rel="stylesheet" href="./CSS/feedback.css">
    <link rel="stylesheet" href="./CSS/login-form.css" />

</head>
<body>


<?php

//signup 


if (isset($_SESSION['signup_success']) || isset($_SESSION['signup-success-message'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopup(document.getElementById('login-popup'));
            hidePopup(document.getElementById('signup-popup'));
        });
    </script>";
    unset($_SESSION['signup_success']); 
}

if (isset($_SESSION['signup_error']) || isset($_SESSION['signup-error-messages'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopup(document.getElementById('signup-popup'));
        });
    </script>";
    
    // echo "<div id='error-messages'>";
    // if (isset($_SESSION['signup-error-messages'])) {
    //     foreach ($_SESSION['signup-error-messages'] as $error) {
    //         echo "<div class='error-alert'>$error</div>";
    //     }
    //     unset($_SESSION['signup-error-messages']);
    // }
    // echo "</div>";
    
    unset($_SESSION['signup_error']); 
}

if(isset($_SESSION['login-error'])){
  echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopup(document.getElementById('login-popup'));
        });
    </script>";

  

    // unset($_SESSION['login-error']); 

}

?>



    <!-- Header Section -->
    <div id="full-page-overlay"></div>
    <header>
      <div id="small-navbar">
        <span>Sign Up to receive a discount today</span>
        <span id="login-link">SIGN IN </span>
        <span><a href="./feedback-page-sanila.php">FAQs</a></span>
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
        <span><a href="#">Our Services</a></span>
        <span><a href="#">About Us</a></span>
        <span><a href="#">Contact Us</a></span>
        <span id="wash-basket" class="material-symbols-outlined">
          <a href="#">shopping_basket</a>
        </span>
        <span id="account-button" class="material-symbols-outlined">
          <a href="#">account_circle</a>
        </span>
      </div>
    </header>


      <!-- Login popup -->
    <section id="login-popup">

<?php
    require "./login-form.php";
?>

</section>

<!--Signup popup -->
<section id="signup-popup">

<?php
    require "./signup-form.php";
?>

</section>



   <!-- feedback sectuon -->
    <section id="thank-you-section">
        <div id="headings">
            <h1>Thank You for Your Order</h1>
            <p>We value your feedback, Please take a moment to rate your experience.</p>
        </div>

        <div id="feedback-section">
        <form action="./submit_feedback.php" method="POST">
    <div class="star-rating">
        <input type="radio" id="5-stars" name="rating" value="5" />
        <label for="5-stars" class="star">&#9733;</label>
        
        <input type="radio" id="4-stars" name="rating" value="4" />
        <label for="4-stars" class="star">&#9733;</label>
        
        <input type="radio" id="3-stars" name="rating" value="3" />
        <label for="3-stars" class="star">&#9733;</label>
        
        <input type="radio" id="2-stars" name="rating" value="2" />
        <label for="2-stars" class="star">&#9733;</label>
        
        <input type="radio" id="1-star" name="rating" value="1" />
        <label for="1-star" class="star">&#9733;</label>
    </div>

    <label for="customer-name">Write your  name:</label>
    <input type="text" name="customer-name" id="customer-name">


    <label for="review">Write a review (optional):</label><br>
    <textarea id="review" name="review" rows="4" cols="50"></textarea>
    
    <div class="button-container">
        <input type="submit" value="Submit Feedback" name="submit-btn" class="button">
        <button type="button" class="button"><a href="./homepage.php">Maybe Later</a></button>
    </div>
    
</form>
        </div>
    </section>





    <!-- socials section -->
    <section id="socials-section">
      <img id="company-logo" src="./Assets/IMG/logo.png" alt="Company Logo" />
      <h2>
        At <span class="website-name-socials"> laundryhaven.au</span>, we are
        more than just a laundry service. We are your trusted partner in
        cleanliness and convenience.
      </h2>
      <div id="social-icons-wrapper">
        <div class="social-icon-img-wrapper">
          <a href="https://www.facebook.com/"
            ><img src="./Assets/IMG/facebook (1).png" alt="Facebook Icon"
          /></a>
        </div>
        <div class="social-icon-img-wrapper">
          <a href="https://www.instagram.com/"
            ><img src="./Assets/IMG/instagram.png" alt="Instagram Icon"
          /></a>
        </div>

        <div class="social-icon-img-wrapper">
          <a href="https://www.tiktok.com/"
            ><img src="./Assets/IMG/tiktok.png" alt="TikTok Icon"
          /></a>
        </div>
      </div>
    </section>
    
    <!-- footer section -->
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


    <script src="./JavaScript/feedback.js"></script>
    <script src="./JavaScript/homepage-carousel.js"></script>
    <script src="./JavaScript/login-signup-forms.js"></script>
</body>
</html>