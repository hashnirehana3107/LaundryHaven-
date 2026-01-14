<button id="cancel-signup-btn">
        <span class="material-symbols-outlined"> close </span>
      </button>
      <div id="signup-content-container">
        <h1 id="signup-header">Sign Up</h1>


        <?php

          if (isset($_SESSION['signup_error']) || isset($_SESSION['signup-error-messages'])) {
            // echo "<script>
            //     document.addEventListener('DOMContentLoaded', function() {
            //         showPopup(document.getElementById('signup-popup'));
            //     });
            // </script>";
            
            echo "<div id='error-messages'>";
            if (isset($_SESSION['signup-error-messages'])) {
                foreach ($_SESSION['signup-error-messages'] as $error) {
                    echo "<div class='error-alert'>$error</div>";
                }
                unset($_SESSION['signup-error-messages']);
            }
            echo "</div>";
            
            unset($_SESSION['signup_error']); 
          }

        ?>

        <form id="signup-form" method="post" action="./process_sanila.php">
          <div class="input-field">
            <input
              type="text"
              name="first-name"
              id="signup-first-name"
              autocomplete="off"
              required
            />
            <label for="signup-first-name">First Name</label>
          </div>

          <div class="input-field">
            <input
              type="text"
              name="last-name"
              id="signup-last-name"
              autocomplete="off"
              required

            />
            <label for="signup-last-name">Last Name</label>
          </div>

          <div class="input-field">
            <input
              type="email"
              name="email"
              id="signup-email"
              autocomplete="off"
              required

            />
            <label for="signup-email">Email</label>
          </div>

          <div class="input-field">
            <input
              type="password"
              name="password"
              id="signup-password"
              minlength="8"
              required

            />
            <label for="signup-password">Password</label>
          </div>

          <div class="input-field">
            <input
              type="password"
              name="confirm-password"
              id="signup-confirm-password"
              minlength="8"
              required

            /> 
              <label for="signup-confirm-password">Confirm Password</label>
          </div>

          <input
            id="signup-btn"
            type="submit"
            name="signup"
            value="Sign Up"
          />
        </form>

        <div class="login-signin-using">
          <p>----or----</p>
          <div class="login-signin-icons-wrapper">
            <div class="login-signin-icon-img-wrapper">
              <a href="https://www.google.com/"
                ><img src="./Assets/IMG/google.png" alt="Google Icon"
              /></a>
            </div>
            <div class="login-signin-icon-img-wrapper">
              <a href="https://www.apple.com/"
                ><img src="./Assets/IMG/apple.png" alt="Apple Icon"
              /></a>
            </div>

            <div class="login-signin-icon-img-wrapper">
              <a href="https://www.facebook.com/"
                ><img src="./Assets/IMG/facebook (2).png" alt="Facebook Icon"
              /></a>
            </div>
          </div>
        </div>

        <div id="login">
          <span>Already have an account?</span>
          <a href="#" id="sign-up-to-log-in">Log in</a>
        </div>
      </div>