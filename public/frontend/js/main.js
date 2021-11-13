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
            if(document.querySelector(".product-details-infomation")) {
                document.querySelector(".product-details-infomation").style = "top: 80px;";
            }
        } else {
            nav.classList.remove("active");
            if(document.querySelector(".product-details-infomation")) {
                document.querySelector(".product-details-infomation").style = "top: 0;";
            }
        }
    };

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
    }
    
    //select item-image
    const chooseImage = document.querySelectorAll(".demo");
    [...chooseImage].forEach((img) => 
        img.addEventListener("click", (e) => {
            [...chooseImage].forEach((item) => item.classList.remove("active"));
            e.target.classList.add("active");
        })
        )

    //select size of shoes
    const sizeElm = document.querySelectorAll(".size-item");
    [...sizeElm].forEach((elm) =>
        elm.addEventListener("click", (e) => {
            [...sizeElm].forEach((item) => item.classList.remove("active"));
            e.target.classList.add("active");
        })
        );
});