const stars = document.querySelectorAll(".star");

stars.forEach((star) => {
  star.addEventListener("click", function () {
    stars.forEach((s) => s.classList.remove("checked"));

    this.classList.add("checked");
    let prevStar = this.previousElementSibling;
    while (prevStar && prevStar.classList.contains("star")) {
      prevStar.classList.add("checked");
      prevStar = prevStar.previousElementSibling;
    }
  });
});
