//select item-image
const chooseImage = document.querySelectorAll(".demo");
[...chooseImage].forEach((img) => 
    img.addEventListener("click", (e) => {
        [...chooseImage].forEach((item) => item.classList.remove("active"));
        e.target.classList.add("active");
    })
)

//slider product details page
let slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  const slides = document.getElementsByClassName("slider-item");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

//select size of shoes
const sizeElm = document.querySelectorAll(".size-item");
[...sizeElm].forEach((elm) =>
elm.addEventListener("click", (e) => {
    [...sizeElm].forEach((item) => item.classList.remove("active"));
    e.target.classList.add("active");
})
);