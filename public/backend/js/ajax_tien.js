$(document).ready(function(){
    //----Image----------//
    $('.btn-edit-image').click(function(e){
        var id = $(this).data('id');
        $.get('/admin/image/'+id,function(data){
            $('.image-product').attr('src',location.origin+'/Image/'+data.images.image_name);
            $('#product').val(data.product_name);
            $('#submit_form_edit_image').attr('action',location.origin+'/admin/edit-image/'+id);

        })
    });

    //edit
    function editImage(){
        $('#submit_form_edit_image').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType:false,
            processData:false,
            success: function(data){  
                alert(data.success);
                setTimeout(function(){
                    location.reload();
                },1);
            },
            error: function(data){
                console.log(data);
    
            }

        })
    })};
    editImage();

    //delete
    $('.btn-delete-image').click(function(e){
        $('.btn-del-image').attr('data-id',$(this).data('id'));
    });

    //delete
    function deleteImage(){
        $('.btn-del-image').click(function(e){
            var id = $(this).data('id');
            $.get('/admin/delete-image/'+id,function(data){
                alert(data.success);
                setTimeout(function(){
                    location.reload();
                },1);
            })
        });
    };

    deleteImage();

    $('#frm-search').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            if(data.output != ''){
                $('.pagination').hide();
                $('.data-show').removeData();
                $('.data-show').html(data.output);
                editImage();
                deleteImage();
            }
        })
    });

    //--------Product------------------

    $('#product-table').on('click','.btn-edit-product',function(e){
        var id = $(this).data('id');
        
        $.get('/admin/products/'+id,function(data){
            if(data.image_product.length > 0){
                $('.abc').css('border','none');
                $('.btn-text').hide();
                $('.img-output').remove();
                for(let image of data.image_product){        
                    $('.abc').append('<img class="img-output" src="'+location.origin+'/Image/'+image.image_name+'">');
                }
            }
            $('.edit-price').val(data.product.price);
            $('.edit-discount').val(data.product.discount);
            $('.edit-name').val(data.product.product_name);
            $('.edit-amount').val(data.product.amount);
            $('.edit-type').val(data.product.type.id).trigger('change');
            $('.edit-description').summernote('code',data.product.description);
            
            if(data.product_size.length > 0){
                for(let item of data.product_size){
                    $('.check-'+item.size_id).attr('checked','checked');
                    $('.amount-size-'+item.size_id).val(item.amount).removeAttr('disabled');
                }
            }else{
                $('.size-check').removeAttr('checked','checked');
            }
            $('#frm-edit-product').attr('action',location.origin+'/admin/edit-product/'+id);
        })
    });

    
    
    
    $('#frm-create-product').on('submit',function(e){
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
    });
    
    function editProduct() 
    {
        $('#frm-edit-product').on('submit',function(e){
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
    })};
    editProduct();
    
    // //delete
    $('#product-table').on('click','.btn-delete-product',function(e){
        var key = $(this).data('id');
        $('.del-product').attr('data-id',key);
    });

    function deleteProduct(){
        $('.del-product').on('click',function(e){
            e.preventDefault();
            $.get('/admin/delete-product/'+$(this).data('id'),function(data){
                console.log(data);
                if(data.ok){
                    location.reload();
                }
            });
        });
    };
    deleteProduct();

    $('#frm-search-product').on('submit',function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/admin/product-search',
            data: formData,
            dataType: 'json',
            success: function(data){
                if(data.output != ''){
                    $('#product-table').DataTable().destroy();
                    $('#data').empty();
                    $('#data').html(data.output);
                    editProduct();
                    delProduct();
                    $('#product-table').DataTable();
                }else{
                    alert('không tìm thấy sản phẩm nào');
                }
            },
            error: function(data){
                console.log(data);
            }
        })
    });


    //------Voucher-----------------
    $('#frm-create-voucher').on('submit',function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            if(data.errors != undefined){
                alert(data.errors);
            }
            if(data.success != undefined){
                alert(data.success);
                setTimeout(function(){
                    location.reload();
                },1);
            }
        })
    });

    $('#voucher-table').on('click','.btn-edit-voucher',function(e){
        var id = $(this).data('id');
        $.get('/admin/voucher/'+id,function(data){

            $('.edit-name-voucher').val(data.voucher_name);
            $('.edit-percent-voucher').val(data.percent);
            $('.edit-amount-voucher').val(data.amount);
            var time = new Date(data.expired_date);
            // var date_expired = date.getDay()+'/'+date.getMonth+'/'+date.getFullYear();
            $(".edit-date-voucher").val(time.getDate()+'/'+(time.getMonth()+1)+'/'+time.getFullYear());
            $('.edit-status-voucher').val(data.status).trigger('change');
            
            $('#frm-edit-voucher').attr('action',location.origin+'/admin/edit-voucher/'+id);
        })
    });

    function editVoucher() 
    {
        $('#frm-edit-voucher').on('submit',function(e){
            e.preventDefault();
            $.post($(this).attr('action'),$(this).serialize(),function(data){
                if(data.errors != undefined){
                    alert(data.errors);
                }
                if(data.success != undefined){
                    alert(data.success);
                    setTimeout(function(){
                        location.reload();
                    },1);
                }
            });
        })
    };
    editVoucher();

    //delete
    $('#voucher-table').on('click','.btn-delete-voucher',function(e){
        var key = $(this).data('id');
        $('.del-voucher').attr('data-id',key);
    });

    function delProduct(){
        $('.del-voucher').click(function(e){
            e.preventDefault();
            $.get('/admin/delete-voucher/'+$(this).data('id'),function(data){
                if(data.ok){
                    location.reload();
                }
            });
        })
    };
    delProduct();

    //edit status invoice
    function editInvoice(){$('#frm-table-invocie').on('click','.edit-status-invoice',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: '/admin/edit-invoice/'+id,
            data:{
                'status': $(this).attr('status')
            },
            success: function(data){
                if(data.output !== undefined){
                    $('#invoice-'+id).replaceWith(data.output);
                }
            }

        })
    })};
    editInvoice();

    $('#frm-search-invoice').on('submit',function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            $('#data-show').empty();
            $('#data-show').append(data.output);
            editInvoice();
        })
    });

    $('#frm-table-invocie').on('click','.send-mail-invoice',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.get('/admin/send-invoice/'+id,function(data){
            console.log(data);
        })
    });

});