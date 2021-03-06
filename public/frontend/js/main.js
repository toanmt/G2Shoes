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
        document.querySelector('.response').style = "top: 80px;";
        if(document.querySelector(".product-details-infomation")) {
          document.querySelector(".product-details-infomation").style = "top: 80px;";
        }
      } else {
        nav.classList.remove("active");
        document.querySelector('.response').style = "top: 0;";
        if(document.querySelector(".product-details-infomation")) {
          document.querySelector(".product-details-infomation").style = "top: 0;";
        }
      }
    };

    //handle click menu
    const navLinks = document.querySelectorAll(".nav-link");
    [...navLinks].forEach((item) => {
      if(item.href === window.location.href) {
        const navItem = item.parentElement;
        navItem.classList.add('active');
        document.title = `${item.innerText} - G2 SHOES`;
      }
    });

    //open/hide modal product
    if (main.querySelector(".js-modal")) {
      const btnInfor = document.querySelectorAll(".product-quickview");
      const modal = document.querySelector(".js-modal");
      const modalContainer = document.querySelector(".js-modal-container");
      const modalClose = document.querySelector(".js-modal-close");

      [...btnInfor].forEach((btn) => {
        btn.addEventListener("click", () => {
          modal.classList.add("open");
        });
      });

      modalClose.addEventListener("click", () => {
        modal.classList.remove("open");
      });

      modal.addEventListener("click", () => {
        modal.classList.remove("open");
      });

      modalContainer.addEventListener("click", (e) => {
        e.stopPropagation();
      });
    }

    //handle slider
    if (main.querySelector(".banner")) {
      const banner = main.querySelector(".banner");
      const sliderMain = banner.querySelector(".slider-main");
      const sliderItems = banner.querySelectorAll(".slider-item");
      const sliderDots = banner.querySelector(".slider-dots");
      const sliderItemWidth = sliderItems[0].offsetWidth;
      const slidersLength = sliderItems.length;
      let positionX = 0;
      let index = 0;

      if (sliderDots) {
        for (let i = 0; i < slidersLength; i++) {
          const sliderDotItem = document.createElement("li");
          sliderDotItem.setAttribute("data-index", `${i}`);
          sliderDotItem.classList.add("slider-dot-item");
          sliderDots.appendChild(sliderDotItem);
        }

        const sliderDotItem = sliderDots.querySelectorAll(".slider-dot-item");

        sliderDotItem[0].classList.add("active");
        [...sliderDotItem].forEach((elm) => {
          elm.addEventListener("click", (e) => {
            sliderDots
            .querySelector(".slider-dot-item.active")
            .classList.remove("active");
            e.target.classList.add("active");

            index = parseInt(e.target.dataset.index);
            positionX = -1 * index * sliderItemWidth;
            sliderMain.style = `transform: translateX(${positionX}px)`;
          });
        });
      }

      const handleChangeSlide = () => {
        let turnBack = 0;
        if (index >= slidersLength - 1) {
          index = -1;
          turnBack = 1;
        }
        positionX = turnBack === 1 ? 0 : positionX - sliderItemWidth;
        sliderMain.style = `transform: translateX(${positionX}px);`;
        index++;

        if (sliderDots) {
          const sliderDotItem = sliderDots.querySelectorAll(".slider-dot-item");
          sliderDots.querySelector(".slider-dot-item.active").classList.remove("active");
          sliderDotItem[index].classList.add("active");
        }
      };

      setInterval(() => {
        handleChangeSlide();
      }, 5000);
    }

    if (main.querySelector(".brand")) {
        //handle open/hide filter
        const brand = main.querySelector(".brand");
        const filterBox = brand.querySelectorAll(".js-filter");
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

    //Add comment
    function addComment()
    {
      $('#review-form').on('submit',function(e){
        e.preventDefault();
        $('.error-fields').empty();
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: new FormData(this),
          dataType: 'json',
          contentType:false,
          processData:false,
          success: function(data){
            if(data.error !== undefined){
            $('.error-fields').append(data.error);
           }else{
            Swal.fire({title: data.message, icon: 'success', showConfirmButton: false, toast: true, position: 'top', timer: 3000});
            setTimeout(function(){
              location.reload();
            },1000);
          }
        },
        error: function(data){
          Swal.fire({title: data.error, icon: 'error', confirmButtonText: "OK", buttonsStyling: true});
          $('.error-fields').append(data.error);
        }
      })
      })
    };
    addComment();

    // rating star
    let ratingScore = document.querySelectorAll('input[name=rating]:not(:checked)');
    let star = 0;
    [...ratingScore].forEach((elm) =>
      elm.addEventListener("change", (e) => {
        if(e.target.value > 0)
        {
          star = e.target.value;
        }
      })
      );

    //validate form
    const convertChars = (str) => {
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "a");
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "A");
      str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "e");
      str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "E");
      str = str.replace(/??|??|???|???|??/g, "i");
      str = str.replace(/??|??|???|???|??/g, "I");
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "o");
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "O");
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "u");
      str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "U");
      str = str.replace(/???|??|???|???|???/g, "y");
      str = str.replace(/???|??|???|???|???/g, "Y");
      str = str.replace(/??/g, "d");
      str = str.replace(/??/g, "D");
      return str;
    };

    const Validator = (options) => {
      const formElement = document.querySelector(options.form);
      let ruleList = {};

      if (formElement) {
        formElement.addEventListener("submit", (e) => {
          e.preventDefault();
          options.rules.forEach((rule) => {
            const inputElement = formElement.querySelector(rule.selector);
            validateForm(inputElement, rule);
          });
        });

        options.rules.forEach((rule) => {
          const inputElement = formElement.querySelector(rule.selector);

          if (Array.isArray(ruleList[rule.selector])) {
            ruleList[rule.selector].push(rule.checkValue);
          } else {
            ruleList[rule.selector] = [rule.checkValue];
          }

          if (inputElement) {
            inputElement.addEventListener("blur", () => {
              validateForm(inputElement, rule);
            });

            inputElement.addEventListener("input", () => {
              const formGroupElement = inputElement.parentElement;
              const errorElement = formGroupElement.querySelector(options.formMessage);
              errorElement.innerText = "";
              formGroupElement.classList.remove("invalid");
            });
          }
        });
      }

      const validateForm = (inputElement, rule) => {
        let message;
        const formGroupElement = inputElement.parentElement;
        const errorElement = formGroupElement.querySelector(options.formMessage);
        const rules = ruleList[rule.selector];

        for (let i = 0; i < rules.length; i++) {
          message = rules[i](inputElement.value);
          if (message) break;
        }

        if (message) {
          errorElement.innerText = message;
          formGroupElement.classList.add("invalid");
        } else {
          errorElement.innerText = "";
          formGroupElement.classList.remove("invalid");
        }
      };
    };

    Validator.isRequired = (selector, message) => {
      return {
        selector,
        checkValue: (value) => {
          return value.trim() ? undefined : message || "Vui l??ng nh???p tr?????ng n??y";
        },
      };
    };

    Validator.isFullName = (selector, message) => {
      return {
        selector,
        checkValue: (value) => {
          const reg = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9\s]{2,}$/;
          return reg.test(convertChars(value.trim())) ? undefined : message;
        },
      };
    };

    Validator.isEmail = (selector, message) => {
      return {
        selector,
        checkValue: (value) => {
          const reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          return reg.test(value) ? undefined : message;
        },
      };
    };

    Validator({
      form: "#form-infor",
      formMessage: ".form-message",
      rules: [
      Validator.isRequired("#fullname", "Vui l??ng nh???p ?????y ????? h??? v?? t??n"),
      Validator.isRequired("#email", "Vui l??ng nh???p email"),
      Validator.isRequired("#phone", "Vui l??ng nh???p s??? ??i???n tho???i"),
      Validator.isRequired("#address", "Vui l??ng nh???p ?????a ch???"),
      Validator.isFullName("#fullname", "H??? v?? t??n kh??ng ????ng ?????nh d???ng"),
      Validator.isEmail("#email", "Email kh??ng ????ng ?????nh d???ng"),
      ],
    });

    Validator({
        form: "#review-form",
        formMessage: ".form-message",
        rules: [
        Validator.isRequired("#review_author", "Vui l??ng nh???p ?????y ????? h??? v?? t??n"),
        Validator.isRequired("#review_body", "Vui l??ng nh???p ????nh gi??"),
        ],
      });
  });
