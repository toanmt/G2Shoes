window.addEventListener("load", () => {
  //handle menu
  const nav = document.querySelector(".nav");

  if (window.pageYOffset > 143) {
    nav.classList.add("active");
  } else {
    nav.classList.remove("active");
  }

  window.onscroll = () => {
    if (window.pageYOffset > 143) {
      nav.classList.add("active");
    } else {
      nav.classList.remove("active");
    }
  };

  //handle slider
  const sliderMain = document.querySelector(".slider-main");
  const sliderItems = document.querySelectorAll(".slider-item");
  const prevBtn = document.querySelector(".slider-prev");
  const nextBtn = document.querySelector(".slider-next");
  const sliderItemWidth = sliderItems[0].offsetWidth;
  const slidersLength = sliderItems.length;
  let positionX = 0;
  let index = 0;

  prevBtn.addEventListener("click", () => {
    handleChangeSlide(-1);
  });

  nextBtn.addEventListener("click", () => {
    handleChangeSlide(1);
  });

  const handleChangeSlide = (direction) => {
    if (direction === 1) {
      if (index >= slidersLength - 1) {
        index = slidersLength - 1;
        return;
      }
      positionX = positionX - sliderItemWidth;
      sliderMain.style = `transform: translateX(${positionX}px)`;
      index++;
    } else if (direction === -1) {
      if (index <= 0) {
        index = 0;
        return;
      }
      positionX = positionX + sliderItemWidth;
      sliderMain.style = `transform: translateX(${positionX}px)`;
      index--;
    }
  };
});
