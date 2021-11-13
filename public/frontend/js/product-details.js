window.addEventListener("load", () => {
//handle click menu
const navItems = document.querySelectorAll(".nav-item");
[...navItems].forEach((item) => {
    item.addEventListener("click", () => {
        [...navItems].forEach((element) =>
            element.classList.remove("active")
            );
        item.classList.add("active");
        document.title = `${item.innerText} - G2 SHOES`;
        console.log(item.innerText);
    });
});

//select rating star of shoes
const rateElm = document.querySelectorAll(".rating-score");
[...rateElm].forEach((elm) =>
    elm.addEventListener("click", (e) => {
        [...rateElm].forEach((item) => item.classList.remove("active"));
        e.target.classList.add("active");
    })
);

//Add comment
function addComment() 
{
    $('#review-form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData(this),
        dataType: 'json',
        contentType:false,
        processData:false,
        success: function(data){ 
            if(data.error !== undefined){
                alert(data.error);
            }else{
                alert(data.message);
                setTimeout(function(){
                    location.reload();
                },1);
            }
        },
        error: function(data){
            console.log(data);
        }
    })
})};
addComment();


// validation form
const usernameText = document.querySelector('#review_author');
const commentText = document.querySelector('#review_body');
const form = document.querySelector('#review-form');

// rating star
let ratingScore = document.querySelectorAll('input[name=rating]:not(:checked)');
let star = 0;
[...ratingScore].forEach((elm) =>
    elm.addEventListener("change", (e) => {
        if(e.target.value > 0)
        {
            star = e.target.value;
            console.log(star);
        }
    })
);

// disable submit button when first load file

const checkUsername = () => {

    let valid = false;
    const username = usernameText.value.trim();
    if (!isRequired(username)) {
        showError(usernameText, 'Họ tên không được để trống!');
    } else if (!isUsernameValid(removeAscent(username))) {
        showError(usernameText, 'Họ tên không phù hợp định dạng!')
    } else {
        showSuccess(usernameText);
        valid = true;
    }
    return valid;
};

const checkComment = () => {
    let valid = false;
    const comment = commentText.value.trim();
    if (!isRequired(comment)) {
        showError(commentText, 'Comment không được để trống!');
    } else {
        showSuccess(commentText);
        valid = true;
    }
    return valid;
}

const isRequired = value => value === '' ? false : true;

const removeAscent = (str) => {
    if (str === null || str === undefined) return str;
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
}
const isUsernameValid = (username) => {
    const re = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9\s]{2,}$/;
    return re.test(username);
}

const showError = (input, message) => {
    // disable submit when have error
    document.querySelector('.btn-new-review').setAttribute('disabled', true);
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('.error-fields');
    error.textContent = message;
};

const showSuccess = (input) => {
    // allow submit form
    document.querySelector('.btn-new-review').removeAttribute('disabled');
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('.error-fields');
    error.textContent = '';
}

const debounce = (fn, delay = 100) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'review_author':
            checkUsername();
            break;
        case 'review_body':
            checkComment();
            break;
    }

    if (checkUsername() == true && checkComment() == true && star > 0) {
        document.querySelector('.btn-new-review').removeAttribute('disabled');
    }
    else {
        document.querySelector('.btn-new-review').setAttribute('disabled', true);
    }
}));
})

//slider product details page
if(document.getElementsByClassName("slider-item") !== "") {
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
}