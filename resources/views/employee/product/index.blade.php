@extends('components.navbar')

@section('container')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="" class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Product</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Product</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="products" class="table table-hover data">
                                    <thead>
                                        <tr>
                                            <th class="text-dark" scope="col">No</th>
                                            <th class="text-dark" scope="col"></th>
                                            <th class="text-dark" scope="col">Name Product</th>
                                            <th class="text-dark" scope="col">Price</th>
                                            <th class="text-dark" scope="col">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <th class="text-center pointer" scope="row">1</th>
                                                <td class="pointer">
                                                    <img src="gambar.png" width="75">
                                                </td>
                                                <td class="text-start pointer">milk</td>
                                                <td class="text-start pointer">Rp. 3.000</td>
                                                <td class="text-start pointer">233</td>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    















    </script>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css"></script>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#products').DataTable();
        });
    </script>
@endsection
