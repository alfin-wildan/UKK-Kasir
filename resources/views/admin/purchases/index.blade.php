
@extends('components.navbar')

@section('container')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href=" dashboard " class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Purchase</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Purchase</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">                   
                            <div class="table-responsive">
                                <table id="purchase" class="table table-hover data">
                                    <thead>
                                        <tr>
                                            <th class="text-dark" scope="col">No</th>
                                            <th class="text-dark" scope="col">Customer Name</th>
                                            <th class="text-dark" scope="col">Purchase Date</th>
                                            <th class="text-dark" scope="col">Total Price</th>
                                            <th class="text-dark" scope="col">Created By</th>
                                            <th class="text-dark" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <th class="text-center pointer" scope="row">iteration</th>
                                                
                                                <td class="text-start pointer">member name : jeno</td>
                                                
                                                {{-- <td class="text-start pointer">NON-MEMBER</td> --}}
                                                
                                                <td class="text-start pointer">23-5-7</td>
                                                <td class="text-end pointer">rp. 23000</td>
                                                <td class="text-start pointer">liya</td>
                                                <td class="justify-content-center">
                                                    <button type="button" class="btn pointer btn-warning text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#seeModal- id ">
                                                        See
                                                    </button>
                                                    <a type="button" class="btn pointer btn-info text-white"
                                                        href="exportPDF-id">
                                                        Download Invoice
                                                    </a>
                                                </td>
                                            </tr>
                                        
                                    </tbody>
                                </table>

                                <!-- Modal Detail Purchase -->
                                <div class="modal" id="seeModal- id " tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-body-secondary">
                                                <h5 class="modal-title">Detail Penjualan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Member Info -->
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="mb-1">Member Status : <strong>Member / non-member</strong></p>
                                                        <p class="mb-1">Number Phone : <strong>0881</strong></p>
                                                        <p class="mb-1">Point Member : <strong>200</strong></p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-1">Member Since : <strong>23 05</strong></p>
                                                    </div>
                                                </div>
                                                <!-- Table Produk -->
                                                <table class="table mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th><strong>Product </strong></th>
                                                            <th><strong>Qty</strong></th>
                                                            <th><strong>Price</strong></th>
                                                            <th><strong>Sub Total</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td> buah semangka</td>
                                                            <td>233</td>
                                                            <td class="text-end">Rp. 23.000</td>
                                                            <td class="text-end">Rp. 32.000</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <th>Total</th>
                                                            <th class="text-end">Rp. 23.000</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                
                                                <!-- Created Info -->
                                                <div class="text-center mt-3">
                                                    <small>Created At : 23-05-2025</small><br>
                                                    <small>By : liya</small>
                                                </div>
                                            </div>
                                
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
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
            $('#purchase').DataTable();
        });
    </script>
@endsection
