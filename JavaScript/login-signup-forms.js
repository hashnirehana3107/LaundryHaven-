//login
let loginLink = document.getElementById("login-link");

let popupLogin = document.getElementById("login-popup");

let closeBtnLogin = document.getElementById("cancel-login-btn");

let signUptoLogin = document.getElementById("sign-up-to-log-in");

//ovrlay
let fpoverlay = document.getElementById("full-page-overlay");

//signup
let logintoSignup = document.getElementById("log-in-to-sign-up");

let popupSignup = document.getElementById("signup-popup");

let closeBtnSignup = document.getElementById("cancel-signup-btn");

//fuction to display popup
function showPopup(popup) {
  if (popup.style.display === "none" || popup.style.display === "") {
    popup.style.display = "flex";
    popup.style.animation = "slideDown 0.5s ease-in-out forwards";

    fpoverlay.style.display = "flex";
    fpoverlay.style.animation = "fadeIn 0.5s ease-in-out forwards";
    document.body.style.overflowY = "hidden";

    popup.style.zIndex = "12";
    fpoverlay.style.zIndex = "11";
  }
}

//function to hide popup
function hidePopup(popup) {
  if (popup.style.display === "flex") {
    popup.style.animation = "slideUp 0.5s ease-in-out forwards";
    setTimeout(() => {
      popup.style.display = "none";

      fpoverlay.style.display = "none";
      fpoverlay.style.animation = "fadeOut 0.5s ease-in-out forwards";
      document.body.style.overflowY = "auto";
    }, 500);
  }
}

//function to switch popups with a delay for animation
function switchPopup(currentPopup, newPopup) {
  hidePopup(currentPopup);
  setTimeout(() => {
    showPopup(newPopup);
  }, 500);
}

//initiallly enable the login form from hp
loginLink.addEventListener("click", function (event) {
  event.preventDefault();
  showPopup(popupLogin);
});

//close btn for login
closeBtnLogin.addEventListener("click", function () {
  hidePopup(popupLogin);
});

//switch login to signup
logintoSignup.addEventListener("click", function (event) {
  event.preventDefault();
  switchPopup(popupLogin, popupSignup);
});

//switch signup to login
signUptoLogin.addEventListener("click", function (event) {
  event.preventDefault();
  switchPopup(popupSignup, popupLogin);
});

//signup close btnn
closeBtnSignup.addEventListener("click", function () {
  hidePopup(popupSignup);
});
