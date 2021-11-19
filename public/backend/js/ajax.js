$(document).ready(function(){

    // -------------------------- Size --------------------------------
    function editSize()
    {
        $('.edit-size').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var num = prompt('Size: ');
            if(parseFloat(num) > 0){
                $.ajax({
                    type: 'GET',
                    url: '/admin/edit-size/'+id,
                    data: {
                        'size': num
                    },
                    dataType: 'json',
                    success: function(data){
                        setTimeout(function(){
                            location.reload();
                        },1);
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
                        setTimeout(function(){
                            location.reload();
                        },1);
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
                setTimeout(function(){
                    location.reload();
                },1);
            },
            error: function(data){
                console.log(data);

            }
        })
    });

    const ids= [];
    $('.add-size-product').click(function(){
        const val =$('#opsize').val();
        var text =$('#opsize :selected').text(); 
        if(!ids.includes(val)){
            var html ='<tr class="sizeadd sizeadd-' + val +'">' 
            +' <td> <input name="sizes[]" type="text" value="' + val + '" style="display:none;">'+text+'</td>'
            +' <td> <input class="form-control" name="size_amount[]" type="number"> </td> '
            +' <td> '
            +'<button type="button" class="btn btn-primary btn-del-row-size" data-id="'+val+'">'
            +'<i class="fa fa-trash-o"></i></button> </td> </tr>';
            $('.form-add-lisize').append(html);
            ids.push(val);
            $('.err_size_add').html('');
        }else{
            $('.err_size_add').html('Size already exists!');
        }
    })
    $('.reset-create-product').click(function(){
        $('.sizeadd').remove();
    })
    $(document).on('click', '.btn-del-row-size', function(e){
        const id = $(this).data('id') + '';
        var i = ids.indexOf(id);
        if (i > -1) {
            ids.splice(i, 1);
        }
        $('.sizeadd-'+id).remove();
    })
    // -------------------------- /Size --------------------------------

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
            $('.btn-edit-type').attr('data-id',key);
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

    function editType()
    {
        $('.btn-edit-type').on('click',function(e){ 
            e.preventDefault();
            var id = $(this).data('id');
            var name = prompt('Type name: ');
            $.ajax({
                type: 'GET',
                url: '/admin/edit-type/'+$(this).data('id'),
                data: {
                    'typeName': name
                },
                dataType: 'json',
                success: function(data){
                    if(data.ok){
                        location.reload();
                    }
                }
            })
        })
    }

    editType();
    
    $('#frm-change-pass').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            if(data.error !== undefined){
                alert(data.error);
            }

            if(data.success !== undefined){
                alert(data.success);
                location.href = data.url;
            }
        });
    });
});