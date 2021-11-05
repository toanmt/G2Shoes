$(document).ready(function(){
    //handle create
    $('.btn-create').click(function(e){
        e.preventDefault();
        var formData = $('#frm-create').serialize();
        
        $.ajax({
            type: 'POST',
            url: '/admin/add-user',
            data: formData,
            dataType: 'json',
            success: function(data){
                if(data.err_username !== undefined){
                    $('.err_username').text(data.err_username);
                }else if(data.err_email !== undefined){
                    $('.err_email').text(data.err_email);
                }else if(data.error !== undefined){
                    alert(data.error);
                }else{
                    alert(data.success);
                    setTimeout(function(){
                        location.reload();
                    },1);
                } 
            },
            error: function(data){
                console.log(data);
                
            }
        })
    });

    //show edit
    function edit(){
        $('.btn-edit').click(function(){
            var id = $(this).data('id');
            $('#frm-edit').attr('action',location.origin+'/admin/edit-user/'+id);
            $('.edit-sbm').attr('data-id',id);
            
            $.ajax({
                type: 'GET',
                url: '/admin/users/'+$(this).data('id'),
                dataType: 'json',
                success: function(data){
                    var word = data.Name.split(' ');
                    var lname = word.pop();
                    $('.fname-edit').val(word.join(' '));
                    $('.lname-edit').val(lname);
                    $('.username-edit').val(data.Username);
                    $('.email-edit').val(data.Email);
                    $('.phone-edit').val(data.PhoneNumber);
                    $('.address-edit').val(data.Address);
                    
                }
            });
        })
    };
    edit();

    $('.edit-sbm').click(function(e){
        //post action form edit
        
        e.preventDefault();
        var formData = $('#frm-edit').serialize();
        
        $.ajax({
            type: 'POST',
            url: '/admin/edit-user/'+$(this).data('id'),
            data: formData,
            dataType: 'json',
            success: function(data){
                if(data.error !== undefined){
                    alert(data.error);
                }else{
                    alert(data.success);
                    setTimeout(function(){
                        location.reload();
                    },1);
                }  
            },
            error: function(data){
                console.log(data);
                
            }
        })
    });

    // //delete
    // function del(){
    //     $('.btn-delete').click(function(){
    //         var key = $(this).data('id');
    //         $('.continue-btn').attr('data-id',key);
    //     })
    // };
    // del();

    // $('.continue-btn').click(function(){
    //     $.ajax({
    //         type: 'GET',
    //         url: '/admin/delete-user/'+$(this).data('id'),
    //         dataType: 'json',
    //         success: function(data){
    //             if(data.ok){
    //                 location.reload();
    //             }
    //         }
    //     });
    // })

    $('.btn-search-user').click(function(e){
        e.preventDefault();
        var formData = $('#frm-search').serialize();
        
        $.ajax({
            type: 'POST',
            url: '/admin/user-search',
            data: formData,
            dataType: 'json',
            success: function(data){
                if(data.output != null){
                    $('#data').removeData();
                    $('#data').html(data.output);
                    edit();
                    del();
                }
                if(data.result != null){
                    $('#data-show').removeData();
                    $('#data-show').html(data.result);
                    edit();
                    del();
                }
            },
            error: function(data){
                console.log(data);
                
            }
        })
    });

    function action(){$('.action').click(function(e){
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/admin/client-lists/action',
            data: {
                'status': $(this).attr('status'),
                'id': $(this).data('id')
            },
            success: function(data){
                    // $('#status').removeData();
                    $('#status').html(data.output);
                },
                error: function(data){
                    console.log(data);
                    
                }
            })
    })
};
action();

$('.btn-search-client').click(function(e){
    e.preventDefault();
    var formData = $('#frm-search').serialize();

    $.ajax({
        type: 'POST',
        url: '/admin/client-search',
        data: formData,
        dataType: 'json',
        success: function(data){
            if(data.output != null){
                $('#data').removeData();
                $('#data').html(data.output);
                action();
            }
            if(data.result!= null){
                $('#data-show').removeData();
                $('#data-show').html(data.result);
            }
        },
        error: function(data){
            console.log(data);

        }
    })
});

$('#frm-profile').on('submit',function(e){
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
                alert(data.success);
                setTimeout(function(){
                    location.reload();
                },1);
            }
        },
        error: function(data){
            console.log(data);

        }
    })
})



    // -------------------------- Size --------------------------------
    function editSize()
    {
        $('.edit-size').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var num = prompt('Nhập số size');
            if(parseFloat(num) > 0){
                $.ajax({
                    type: 'GET',
                    url: '/admin/edit-size/'+id,
                    data: {
                        'size': num
                    },
                    dataType: 'json',
                    success: function(data){
                        alert(data.output);
                        $('#size-'+id).text(num);
                    },
                    error: function(data){
                        console.log(data);

                    }
                })
            }else{
                alert('Vui lòng nhập đúng định dạng!!');
            }

        })
    }

    editSize();

    function delSize(){
        $('.delete-size').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var choose = confirm('Bạn có muốn xóa size này không?');
            if(choose){
                $.ajax({
                    type: 'GET',
                    url: '/admin/delete-size/'+id,
                    dataType: 'json',
                    success: function(data){
                        alert(data.output);
                        $('#del-'+id).remove();
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }
        })
    }

    delSize();

    $('#frm-create-size').on('submit',function(e){
        e.preventDefault();
        var formData = $('#frm-create-size').serialize();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(data){  
                if(data.error !== undefined){
                    alert(data.error);
                }else{
                    alert('Thêm hành công!!');
                    $('#table-size').append(data.output);
                    editSize();
                    delSize();
                }
            },
            error: function(data){
                console.log(data);

            }
        })
    });

    // -------------------------- Size --------------------------------

    //-------------------- Brand---------------------

    $('#submit_form').on('submit',function(e){
        e.preventDefault();
        $('#err_name_brand').text('');
        var dataF = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/admin/add-brand',
            data: dataF,
            dataType: 'json',
            success: function(data){
                if(data.errorN !== undefined){
                    $('#err_name_brand').html(data.errorN);
                    data.errorN.remove();
                } else {
                    setTimeout(function(){
                        location.reload();
                    },1);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    //delete
    function delbrand(){
        $('.btn-delete-brand').click(function(){
            var key = $(this).data('id');
            $('.btn-del-brand').attr('data-id',key);
        })
    };
    delbrand();

    $('.btn-del-brand').click(function(){
        $.ajax({
            type: 'GET',
            url: '/admin/delete-brand/'+$(this).data('id'),
            dataType: 'json',
            success: function(data){
                if(data.ok){
                    location.reload();
                }
            }
        });
    });
    //show edit
    function editBrand(){
        $('.btn-edit-brand').click(function(){
            var id = $(this).data('id');
            $('#submit_form_edit_brand').attr('action',location.origin+'/admin/edit-brand/'+id);
            $.ajax({
                type: 'GET',
                url: '/admin/brand/'+$(this).data('id'),
                dataType: 'json',
                success: function(data){
                    $('.brand-Name').val(data.brand_name);
                }
            });
        })
    };
    editBrand();

    $('#submit_form_edit_brand').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data){
                if(data.errorN !== undefined){
                    $('#err_name_type').html(data.errorN);
                    data.errorN.remove();
                } else {
                    setTimeout(function(){
                        location.reload();
                    },1);
                } 
            },
            error: function(data){
                console.log(data);
                
            }
        })
    });
    // -------------------------- /Brand --------------------------------





    // -------------------------- Type --------------------------------
    //show add type
    function addType(){
        $('.btn-add-type').click(function(){
            var id = $(this).data('id');
            $('#submit_form_add_type').attr('action',location.origin+'/admin/add-type/'+id);
        })
    };
    addType();
    $('#submit_form_add_type').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',   
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data){
                if(data.errorN !== undefined){
                    $('#err_name_type').html(data.errorN);
                } else {
                    setTimeout(function(){
                        location.reload();
                    },1);
                }
            },
            error: function(data){
                console.log(data);
            }
        })
    });

    //delete
    function deltype(){
        $('.btn-delete-type').click(function(){
            var key = $(this).data('id');
            $('.btn-del-type').attr('data-id',key);
        })
    };
    deltype();

    $('.btn-del-type').click(function(){
        $.ajax({
            type: 'GET',
            url: '/admin/del-type/'+$(this).data('id'),
            dataType: 'json',
            success: function(data){
                if(data.ok){
                    location.reload();
                }
            }
        });
    });
    // -------------------------- /Type --------------------------------


})