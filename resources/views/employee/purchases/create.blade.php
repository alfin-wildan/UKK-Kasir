@extends('components.navbar')

@section('container')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item">
                                <a href="" class="link">
                                    <i class="mdi mdi-home-outline fs-4"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href=" " class="link">Purchase</a>
                            </li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Add Purchase</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Add Purchase</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center container">
                                <div class="row">
                                    
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card">
                                                <p hidden class="product_id">id</p>
                                                <div class="bg-image">
                                                    <img src="gambar.jpg" class="w-50 mt-3"
                                                        alt="">
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title mb-3"> strawberry </div>
                                                    <p>Stock <span class="product_stock">34</span></p>
                                                    <h6 class="mb-3 product_price">price : rp.30.000</h6>
                                                    <center>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0px 10px 0px 10px; cursor: pointer;"
                                                                        class="product_min">
                                                                        <b>-</b>
                                                                    </td>
                                                                    <td style="padding: 0px 10px 0px 10px;"
                                                                        class="product_sum">0
                                                                    </td>
                                                                    <td style="padding: 0px 10px 0px 10px; cursor: pointer;"
                                                                        class="product_plus">
                                                                        <b>+</b>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                    <p class="mt-3">
                                                        Sub Total
                                                        <b class="sub_total">Rp. 0 ,-</b>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action=" store " method="">
                    
                    
                    <div id="hidden-inputs"></div>
                    <div class="fixed-bottom bg-white shadow p-3 border-top border-warning w-100 d-flex justify-content-center">
                        <button class="btn btn-primary w-20">Next</button>
                    </div>
                </form>
            </div>
            @push('script')
            <script>
// 93-137












































            </script>
            @endpush
            
        @endsection