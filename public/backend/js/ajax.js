$(document).ready(function(){

    // -------------------------- Size --------------------------------
    function delSize(){
        $('.delete-size').on('click',function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var choose = Swal.fire({title: 'Bạn có muốn xóa kích thước này không?', confirmButtonText: "OK", buttonsStyling: true});             
            if(choose){
                $.ajax({
                    type: 'GET',
                    url: '/admin/delete-size/'+id,
                    dataType: 'json',
                    success: function(data){
                        setTimeout(function(){
                            location.reload();
                        },1);
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
            Swal.fire({title: 'Tên loại sản phẩm',
            input:'text',inputAttributes: {
                autocapitalize: 'off'
              }
              ,confirmButtonText: "OK"
              ,showLoaderOnConfirm: true}).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: '/admin/edit-type/'+id,
                        data: {
                            'typeName': result.value
                        },
                        dataType: 'json',
                        success: function(data){
                            Swal.fire({title: 'sửa thành công', icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
                            if(data.ok){
                                location.reload();
                            }
                        },
                        error: function(data){
                            Swal.fire({title: 'Có lỗi khi thực hiện', icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
                        }
                    })
                }
              });
            
        })
    }

    editType();

    $('#frm-change-pass').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            if(data.error !== undefined){
                Swal.fire({title: data.errors, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
            }

            if(data.success !== undefined){
                Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
                location.href = data.url;
            }
        });
    });

    //page-image
    $('#page-image').on('click','.pagination a', function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        var currenUrl = href.split("page=")[0];
        var page = href.split("page=")[1];
        $.get(currenUrl+'page='+page,function(data) {
                $('#page-image').html($(data).find('#page-image .content'));
                editImage();
                deleteImage();
        });
   });

    $('#page-image').on('click','.btn-edit-image',function(e){
        e.preventDefault();
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
                    Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
                    setTimeout(function(){
                        location.reload();
                    },1);
                }
            })
        })
    };
    editImage();

    //delete
    $('#page-image').on('click','.btn-delete-image',function(e){
        $('#page-image .btn-del-image').attr('data-id',$(this).data('id'));
    });

    //delete
    function deleteImage(){
        $('.btn-del-image').click(function(e){
            var id = $(this).data('id');
            $.get('/admin/delete-image/'+id,function(data){
                Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
                setTimeout(function(){
                    location.reload();
                },1);
            })
        });
    };
    deleteImage();


    $('#page-image').on('submit','#frm-search',function(e){
        e.preventDefault();
        $.get(location.origin+'/admin/image-product?product_name='+$('#query').val(),function(data){
            if($(data).find('#page-image .data-show').children().length > 0){
                $(data).find('.main-wrapper').attr('id','page-image');
                $('#page-image').html($(data).find('#page-image .content'))
                editImage();
                deleteImage();
            }else{
                $('#page-image .data-show').text('không tìm thấy sản phẩm');
                $('.pagination').hide();
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
            $('.edit-type').val(data.product.type.id).trigger('change');

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
                    Swal.fire({title: data.error, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
                }else{
                    Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
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
                        Swal.fire({title: data.error, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
                    }else{
                        Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
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
                    deleteProduct();
                    $('#product-table').DataTable({searching:false,
                        paging: true,pageLength: 10,info: true});
                }else{
                    $('#data').text('không tìm thấy sản phẩm nào');
                }
            }
        })
    });


    //------Voucher-----------------
    $('#frm-create-voucher').on('submit',function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'),formData,function(data){
            if(data.errors != undefined){
                Swal.fire({title: data.errors, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
            }
            if(data.success != undefined){
                Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
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
                    Swal.fire({title: data.errors, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
                }
                if(data.success != undefined){
                    Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
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

    function delVoucher(){
        $('.del-voucher').on('click',function(e){
            e.preventDefault();
            $.get('/admin/delete-voucher/'+$(this).data('id'),function(data){
                location.reload();
            });
        });
    };
    delVoucher();

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
            $('#frm-table-invocie').DataTable().destroy();
            $('#data-show').empty();
            $('#data-show').append(data.output);
            editInvoice();
            $('#frm-table-invocie').DataTable({searching:false,
                paging: true,pageLength: 10,info: true});
            
        })
    });

    $('#frm-table-invocie').on('click','.send-mail-invoice',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.get('/admin/send-invoice/'+id,function(data){
            if(data.error != undefined){
                Swal.fire({title: data.error, icon: 'warning', confirmButtonText: "OK", buttonsStyling: true});
            }else{
                Swal.fire({title: data.success, icon: 'success', confirmButtonText: "OK", buttonsStyling: true});
            }
        });
    });
});
