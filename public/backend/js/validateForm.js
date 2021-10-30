$(document).ready(function(){
    $('.username').keyup(function(){
        var username = $(this).val();
        if(username == null || username == ''){
            $('.err_username').text('Username không được để trống!!');
        }else{
            $('.err_username').text('');
        }
    })

    $('.name').keyup(function(){
        var name = $(this).val();
        if(name == null || name == ''){
            $('.err_name').text('Name không được để trống!!');
        }else{
            $('.err_name').text('');
        }
    })

    $('.price').keyup(function(){
        var price = $(this).val();
        if(price == null || price == ''){
            $('.err_price').text('Price không được để trống!!');
        }else if(isNaN(parseFloat(price))){
            $('.err_price').text('Price không đúng định dạng!!');
        }else{
            $('.err_price').text('');
        }
    })

    $('.discount').keyup(function(){
        var discount = $(this).val();
        if(discount == null || discount == ''){
            $('.err_discount').text('Discount không được để trống!!');
        }else if(isNaN(parseInt(discount))){
            $('.err_discount').text('Discount không đúng định dạng!!');
        }else{
            $('.err_discount').text('');
        }
    })

    $('.first_name').keyup(function(){
        var firstname = $(this).val();
        if(firstname == null ||firstname == ''){
            $('.err_firstname').text('First Name không được để trống!!');
        }else{
            $('.err_firstname').text('');
        }
    })

    $('.fullname').keyup(function(){
        var fullname = $(this).val();
        if(fullname == null ||fullname == ''){
            $('.err_fullname').text('Full Name không được để trống!!');
        }else{
            $('.err_fullname').text('');
        }
    })

    $('.last_name').keyup(function(){
        var lastname = $(this).val();
        if(lastname == null || lastname == ''){
            $('.err_lastname').text('Last Name không được để trống!!');
        }else{
            $('.err_lastname').text('');
        }
    })

    $('.phoneNumber').keyup(function(){
        var phone = $(this).val();
        if(phone == null || phone == ''){
            $('.err_phone').text('Phone không được để trống!!');
        }else if(!$.isNumeric(phone)){
            $('.err_phone').text('Nhập số điện thoại');
        }else{
            $('.err_phone').text('');
        }
    })

    $('.address').keyup(function(){
        var address = $(this).val();
        if(address == null || address == ''){
            $('.err_address').text('Address không được để trống!!');
        }else{
            $('.err_address').text('');
        }
    })

    $('.email').keyup(function(){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var email = $(this).val();
        if(email == null || email == ''){
            $('.err_email').text('Email không được để trống!!');
        }else if(!re.test(email)){
            $('.err_email').text('Email không hợp lệ!!');
        }else{
            $('.err_email').text('');
        }        
    })

    $('.password').keyup(function(){
        var pass = $(this).val();
        if(pass == null || pass == ''){
            $('.err_pass').text('Password không được để trống!!');
        }else if(pass.length <= 5){
            $('.err_pass').text('Password phải lớn hơn 5 ký tự!!');
        }else{
            $('.err_pass').text('');
        }        
    })

    $('.conf').keyup(function(){
        var pass = $(this).val();
        if(pass == null || pass == ''){
            $('.err_conf').text('Confirm Password không được để trống!!');
        }else if($(this).val() != $('#password').val()){
            console.log( $('.password').val())
            $('.err_conf').text('Confirm Password không khớp!!');
        }
        
        if(pass == $('.password').val()){
            $('.err_conf').text('');
        }        
    })
})