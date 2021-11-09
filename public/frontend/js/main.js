window.addEventListener("load", () => {
    const main = document.querySelector(".main");
    //handle scroll menu
    const nav = document.querySelector(".nav");

    if (window.pageYOffset > 143) {
        nav.classList.add("active");
    } else {
        nav.classList.remove("active");
    }

    window.onscroll = () => {
        if (window.pageYOffset > 143) {
            nav.classList.add("active");
            document.querySelector(".product-details-infomation").style.cssText = "top: 80px;";
        } else {
            nav.classList.remove("active");
            document.querySelector(".product-details-infomation").style.cssText = "top: 0;";
        }
    };

    //handle click menu
    // const navItems = document.querySelectorAll(".nav-item");
    // [...navItems].forEach((item) => {
    //     item.addEventListener("click", () => {
    //         [...navItems].forEach((element) =>
    //             element.classList.remove("active")
    //         );
    //         item.classList.add("active");
    //         document.title = `${item.innerText} - G2 SHOES`;
    //         console.log(item.innerText);
    //     });
    // });

    //handle slider
    if (main.querySelector(".banner")) {
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
    }

    if (main.querySelector(".brand")) {
        //handle open/hide filter
        const filterBox = document.querySelectorAll(".js-filter");
        let openFilterBox = [];
        for (let i = 0; i < filterBox.length; i++) {
            openFilterBox.push(true);
        }

        [...filterBox].forEach((element, index) => {
            const iconElm = element.parentElement.querySelector(".bx");
            iconElm.addEventListener("click", () => {
                if (!openFilterBox[index]) {
                    iconElm.classList.add("bx-minus");
                    iconElm.classList.remove("bx-plus");
                    element.style = "display: block";
                    openFilterBox[index] = true;
                } else {
                    iconElm.classList.remove("bx-minus");
                    iconElm.classList.add("bx-plus");
                    element.style = "display: none";
                    openFilterBox[index] = false;
                }
            });
        });

        //handle sort
        const sortItem = document.querySelectorAll(".dropdown-item");
        const sortSelect = document.querySelector(".dropdown-select span");
        [...sortItem].forEach((item) => {
            item.addEventListener("click", () => {
                const textItem = item.querySelector(".dropdown-text");

                [...sortItem].forEach((element) =>
                    element.classList.remove("active")
                );
                item.classList.add("active");
                sortSelect.innerText = textItem.innerText;
            });
        });
    }

    // Start product-details

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

    

    // End product-details
});

//select rating star of shoes
const rateElm = document.querySelectorAll(".rating-score");
[...rateElm].forEach((elm) =>
elm.addEventListener("click", (e) => {
    [...rateElm].forEach((item) => item.classList.remove("active"));
    e.target.classList.add("active");
})
);