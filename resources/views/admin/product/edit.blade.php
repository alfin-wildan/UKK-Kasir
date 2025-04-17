@extends('components.navbar')
    
@section('container')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="product-home" class="link">Product</i></a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Edit Product</h1> 
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="update-id" enctype="multipart/form-data" method="POST" class="row g-3">


                            @if (Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"name="name" id="name" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="image" id="image" required accept=".png, .jpg, .jpeg, .svg">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        
                                            <img src="" width="50" class="img-thumbnail">
                                        
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="price" id="price" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="stock" id="stock" value="" disabled>
                            </div>
                            <div class="col-12 d-flex justify-content-end my-3">
                                <button type="submit" class="btn btn-primary w-25">Edit Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<script src="{{ asset('js/priceFormatter.js') }}"></script>
@endsection