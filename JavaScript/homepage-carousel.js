document.addEventListener("DOMContentLoaded", () => {
  const prevButton = document.getElementById("carousel-prev");
  const nextButton = document.getElementById("carousel-next");
  const carouselItems = document.getElementsByClassName("carousel-item");
  let currentIndex = 0;
  let intervalId;

  function showItem(index) {
    for (let i = 0; i < carouselItems.length; i++) {
      carouselItems[i].classList.toggle("active", i === index);
    }
  }

  function nextItem() {
    currentIndex = currentIndex < carouselItems.length - 1 ? currentIndex + 1 : 0;
    showItem(currentIndex);
  }

  function prevItem() {
    currentIndex = currentIndex > 0 ? currentIndex - 1 : carouselItems.length - 1;
    showItem(currentIndex);
  }

  prevButton.addEventListener("click", () => {
    prevItem();
    resetInterval();
  });

  nextButton.addEventListener("click", () => {
    nextItem();
    resetInterval();
  });

  function startSlideshow() {
    intervalId = setInterval(nextItem, 3000);
  }

  function resetInterval() {
    clearInterval(intervalId);
    startSlideshow();
  }

  showItem(currentIndex);
  startSlideshow();
});

