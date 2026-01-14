<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link rel="stylesheet" href="./CSS/Services.css" />
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <div id="small-navbar">
        <span>Sign Up to receive a discount today</span>
        <span id="login-link">SIGN IN </span>
        <span><a href="#">FAQs</a></span>
      </div>
      <div id="main-navbar">
        <span>
          <img
            id="logo-main-nav"
            src="./Assets/IMG/logo.png"
            alt="company-logo"
          />
        </span>
        <span><a href="#">Home</a></span>
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

    <!-- Services Section -->

    <h1>Services</h1>


    <section class="services">
      <div class="service-item">
        <div class="icon">
          <img src="./Assets/IMG/wash-and-fold.png.png" alt="Wash and Fold " width="100px" height="100px"/>
        </div>
        <h3>Wash and Fold</h3>
          <p>Standard</p>
      </div>
         
      <div class="service-item">
          <div class="icon">
            <img src="./Assets/IMG/iron.png" alt="Wash Dry and Iron" width="100px" height="100px"/>
          </div>
          <h3>Wash Dry and Iron</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/dryclean.png" alt="Dry Cleaning" width="100px" height="100px"/>
        </div>
          <h3>Dry Cleaning</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/iron-board.png" alt="Iron Only" width="100px" height="100px"/>
        </div>
          <h3>Iron Only</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/curtain.png" alt="Curtain Washing" width="100px" height="100px"/>
        </div>
          <h3>Curtain Washing</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/stain-remover.png" alt="Stain Removal" width="100px" height="100px"/>
        </div>
          <h3>Stain Removal</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/shoes.png" alt="Shoe Cleaning" width="100px" height="100px"/>
        </div>
          <h3>Shoe Cleaning</h3>
          <p>Standard</p>
      </div>
      <div class="service-item">
          <div class="icon">
          <img src="./Assets/IMG/urgent.png" alt="Urgency Services" width="100px" height="100px"/>
        </div>
          <h3>Urgency Services</h3>
          <p>Standard</p>
      </div>
    </section>



  







    <!--Socials section-->
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

    <!--Footer section-->

    <footer>
      <div id="footer-content-wrapper">
        <div class="footer-content">
          <p><a href="#">Home</a></p>
          <p><a href="#">Our Services</a></p>
          <p><a href="#">About Us</a></p>
          <p><a href="#">Contact Us</a></p>
        </div>
        <div class="footer-content">
          <h2></h2>
          <p><a href="#">News</a></p>
          <p><a href="#">FAQs</a></p>
          <p><a href="#">T&Cs</a></p>
          <p><a href="#">Privacy Policy</a></p>
        </div>
        <div class="footer-content">
          <h2>Our Services</h2>
          <p><a href="#">Wash &amp; Fold</a></p>
          <p><a href="#">Dry Cleaning</a></p>
          <p><a href="#">Wash, Dry &amp; Iron</a></p>
          <p><a href="#">Iron Only</a></p>
          <p><a href="#">More</a></p>
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
