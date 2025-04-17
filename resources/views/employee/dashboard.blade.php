@extends('components.navbar')
    
@section('container')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href=" " class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1> 
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <h3>Welcome    !</h3>
                <div class="card d-block m-auto text-center">
                    <div class="card-body">
                        <div class=" card-header">
                            <p class="mb-0">Total Purchase Today</p>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">  </h3>
                            <p class="card-text">Total Purchase for today.</p>
                        </div>
                        <div class="card-footer text-muted ">
                            <p>Latest Transaction : </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection