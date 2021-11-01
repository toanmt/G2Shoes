@extends('Admin.images.main')
@section('section')
<div id="data-show" class="row staff-grid-row ">
    @foreach ($images as $image)
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="text-center">
            <a><img width="100" height="100" src="{{ asset('Image/'.$image->image_name) }}" alt=""></a>
        </div>
        <div class="dropdown profile-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item btn-edit" data-id="{{ $image->id }}" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item btn-delete" data-id="{{ $image->id }}" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
            </div>
        </div>
        <div class="small text-muted justify-content-center">{{ $image->products->product_name }}</div>
    </div> 
    @endforeach
</div>
@endsection
