const paymentContent = document.querySelectorAll('.payment-content');
const paymentNav = document.querySelector('.payment-nav');
//validate form
const convertChars = (str) => {
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
  str = str.replace(/đ/g, "d");
  str = str.replace(/Đ/g, "D");
  return str;
};

const Validator = (options) => {
  const formElement = document.querySelector(options.form);
  let ruleList = {};

  if (formElement) {
    formElement.addEventListener("submit", (e) => {
      let isFormValid = true;
      e.preventDefault();
      options.rules.forEach((rule) => {
        const inputElement = formElement.querySelector(rule.selector);
        const isValid = validateForm(inputElement, rule);
        if (!isValid) {
          isFormValid = false;
        }
      });

      if (isFormValid) {
        paymentContent[0].style.display = "none";
        paymentContent[1].style.display = "block";
        paymentNav.querySelector('li:nth-child(2)').classList.add('active');
        paymentNav.querySelector('li:last-child').classList.add('active');
      }
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

    return !message;
  };
};

Validator.isRequired = (selector, message) => {
  return {
    selector,
    checkValue: (value) => {
      return value.trim() ? undefined : message || "Vui lòng nhập trường này";
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

Validator.isPhoneNumber = (selector, message) => {
  return {
    selector,
    checkValue: (value) => {
      const reg = /((^(\+84|84|0|0084){1})(3|5|7|8|9))+([0-9]{8})$/;
      return reg.test(value) ? undefined : message;
    },
  };
};

Validator.stringLength = (selector, min, max, minMessage, maxMessage) => {
  return {
    selector,
    checkValue: (value) => {
      if (value.length < parseInt(min)) {
        return minMessage || `Vui lòng nhập tối thiểu ${min} ký tự`;
      } else if (value.length > parseInt(max)) {
        return maxMessage || `Vui lòng nhập tối đa ${max} ký tự`;
      } else {
        return undefined;
      }
    },
  };
};

Validator({
  form: "#form-infor",
  formMessage: ".form-message",
  formButtonSubmit: ".form-submit",
  rules: [
  Validator.isRequired("#fullname", "Vui lòng nhập đầy đủ họ và tên"),
  Validator.isRequired("#email", "Vui lòng nhập email"),
  Validator.isRequired("#phone", "Vui lòng nhập số điện thoại"),
  Validator.isRequired("#address", "Vui lòng nhập địa chỉ"),
  Validator.isFullName("#fullname", "Họ và tên không đúng định dạng"),
  Validator.isEmail("#email", "Email không đúng định dạng"),
  Validator.isPhoneNumber("#phone", "Số điện thoại sai định dạng"),
  ],
});

const getBackUserInfor = document.querySelector("#form-user-infor");
getBackUserInfor.addEventListener("click", () => {
  paymentContent[1].style.display = "none";
  paymentContent[0].style.display = "block";
  paymentNav.querySelector('li:nth-child(2)').classList.remove('active');
})



