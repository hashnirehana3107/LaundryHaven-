<!DOCTYPE html>
<html>
<head>
    <title>
        cart page
    </title>
<link rel="stylesheet" href="./CSS/cart.css">
<link rel="stylesheet" href="header-footer.css">
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
<div class="cart-item-txt">Cart Item</div>
<div class="discount-text">(10% discount for all items)</div>


      <center>
     
        <table>
            <tr>
                <td class="cart-td">
                    <button class="card-button" onclick="addItem(29.99, 'Cleaning')">
                        <img src="./Assets//IMG/cleaning.png" alt="Item 1" width="200px" height="200px"><br>
                        <b class="cart-items">Cleaning<br> 29.99$</b>
                    </button>
                </td>
                <td class="cart-td">
                    <button class="card-button" onclick="addItem(39.99, 'Dry Clean')">
                        <img src="./Assets/IMG/dryclean.png" alt="Item 2" width="200px" height="200px"><br>
                        <b class="cart-items">Dry Clean<br> 39.99$</b>
                    </button>
                </td>
               
            
      
            
            <td class="cart-td">
                <button  class="card-button" onclick="addItem(49.99, 'iron')">
                    <img src="./Assets//IMG/iron.png" alt="Item 3" width="200px" height="200px"><br>
                    <b class="cart-items">Iron<br> 49.99$</b>
                </button>
            </td>
            <td class="cart-td">
                <button class="card-button" onclick="addItem(59.99, 'shirt')">
                    <img src="./Assets//IMG/shirts.png" alt="Item 4" width="200px" height="200px"><br>
                    <b class="cart-items">Cleaning Shirts<br> 59.99$</b>
                </button>
            </td>
        </tr>
        <tr>
            <td class="cart-td">
                <button class="card-button" onclick="addItem(19.99, 'stain-remover')">
                    <img src="./Assets//IMG/stain-remover.png" alt="Item 5" width="200px" height="200px"><br>
                    <b class="cart-items">Stain Remove<br> 19.99$</b>
                </button>
            </td>
            <td class="cart-td">
                <button class="card-button" onclick="addItem(24.99, 'sundry')">"
                    <img src="./Assets//IMG/sundry.png" alt="Item 6" width="200px" height="200px"><br>
                    <b class="cart-items">Sun Dry<br> 24.99$</b>
                </button>
            </td>
            <td class="cart-td">
                <button class="card-button" onclick="addItem(29.99, 'shoes')">"
                    <img src="./Assets//IMG/shoes.png" alt="Item 7" width="200px" height="200px"><br>
                    <b class="cart-items">Shoe clean<br> 9.99$</b>
                </button>
            </td>
            <td class="cart-td">
                <button class="card-button" onclick="addItem(14.99, 'washnfold')">
                    <img src="./Assets//IMG/washnfold.png" alt="Item 8" width="200px" height="200px"><br>
                    <b class="cart-items">Wash and Fold<br> 14.99$</b>
                </button>
            </td>
        </tr>
      </table>
    </center>
<div class="total-value-txt"><center>Total Value:
    <div class="display-price" id="display-price">0.00$</div></center>
</div>

<div class="discount-value-txt"><center>
    Discounted Price:<br>
    <div class="discount-price" id="discount-price">0.00$</div></center>
</div>



<div class="cart-container">
  <h2>Your Cart</h2>
  <ul id="cart-items"></ul>
</div>

<script>
  var total = 0;
  var discountRate = 0.10;
  var cartItems = [];

  function addItem(price, name) {
      var result = confirm("Press OK to confirm adding " + name + " to cart");

      if (result) {
          cartItems.push({ name: name, price: price });
          total += price;
          updateCart();
      }
  }

  function removeItem(index) {
      var item = cartItems[index];
      total -= item.price;
      cartItems.splice(index, 1);
      updateCart();
  }

  function updateCart() {
      var cartList = document.getElementById("cart-items");
      cartList.innerHTML = "";

      cartItems.forEach((item, index) => {
          var li = document.createElement("li");
          li.innerHTML = `${item.name} - $${item.price.toFixed(2)} 
              <button class="remove-button"onclick="removeItem(${index})">Remove</button>`;
          cartList.appendChild(li);
      });

      document.getElementById("display-price").innerHTML = total.toFixed(2) + "$";
      updateDiscountedPrice();
  }

  function updateDiscountedPrice() {
      var discountedPrice = total - (total * discountRate);
      document.getElementById("discount-price").innerHTML = discountedPrice.toFixed(2) + "$";
      document.getElementById("discounted-price-input").value = discountedPrice.toFixed(2);
  }
  
  
</script>
<form action="Payment.php" method="POST">
    <input type="hidden" id="discounted-price-input" name="discounted_price" value="0.00">
    <button type="submit" class="pay-now-btn">Pay Now</button>
</form>


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