<button id="cancel-login-btn">
        <span class="material-symbols-outlined"> close </span>
      </button>
      <div id="login-content-container">
        <h1 id="login-header">Sign In</h1>
      
        <?php
            //signup

            if (isset($_SESSION['signup_success']) || isset($_SESSION['signup-success-message'])) {

              echo "<div id='success-message'>";
              if (isset($_SESSION['signup-success-message'])) {

                echo "<div class='success-alert'>Registration Successful</div>";
                echo "<div class='success-alert'>Please SignIn</div>";

                  unset($_SESSION['signup-success-message']);
              }
              echo "</div>";
              
              unset($_SESSION['signup_success']);
            }

            //login

            if(isset($_SESSION['login-error'])){

              echo "<div id='error-messages'>";
              echo "<div class='error-alert'>Invalid email or password</div>";
              echo "</div>";

            }

            unset($_SESSION['login-error']);
      ?>



        <form id="login-form" method="post"  action="./process_sanila.php">
          <div class="input-field">
            <input
              type="email"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
            <label for="email">Email</label>
          </div>

          <div class="input-field">
            <input
              type="password"
              name="signin-password"
              id="signin-password"
              required
            />
            <label for="signin-password">Password</label>
          </div>


          <div id="remember-me-and-forgot-password">
            <div id="checkbox-container">
              <input type="checkbox" name="remember-me" id="remember-me" />
              <label for="remember-me">Remember me</label>
            </div>
            <a href="#">forgot password?</a>
          </div>
          <input id="login-btn" type="submit" name="login" value="Log In" />
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

        <div id="signup">
          <span>Don't have an account?</span>
          <a id="log-in-to-sign-up" href="#">Sign up</a>
        </div>
      </div>