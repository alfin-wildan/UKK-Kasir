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
                            @if (Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::get('deleted'))
                                <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
                            @endif
                            @if (Session::get('failed'))
                                <div class="alert alert-warning">{{ Session::get('failed') }}</div>
                            @endif
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary mb-3" href="product-create">Add Product</a>
                            </div>
                            <div class="table-responsive">
                                <table id="products" class="table table-hover data">
                                    <thead>
                                        <tr>
                                            <th class="text-dark" scope="col">No</th>
                                            <th class="text-dark" scope="col"></th>
                                            <th class="text-dark" scope="col">Name Product</th>
                                            <th class="text-dark" scope="col">Price</th>
                                            <th class="text-dark" scope="col">Stock</th>
                                            <th class="text-dark" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <th class="text-center pointer" scope="row">no 1</th>
                                                <td class="pointer">
                                                    <img src=" gambar1.png" width="75">
                                                </td>
                                                <td class="text-start pointer">strawberry</td>
                                                <td class="text-end pointer"> Rp. 30.000</td>
                                                <td class="text-start pointer"> 12</td>
                                                <td class="justify-content-center">
                                                    <a href="edit-id"
                                                        class="btn btn-warning me-3">Edit</a>
                                                    <button type="button"
                                                        class="btn pointer btn-primary me-3 text-white"
                                                        id="update-stok-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateModal- id "
                                                        data-id=" id "
                                                        data-name="name "
                                                        data-stock="stock">
                                                        Update Stock
                                                    </button>
                                                    <button type="button" class="btn pointer btn-danger text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal- id ">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            {{-- modal stock --}}
                                            <div class="modal" id="updateModal- id " tabindex="-1"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel1">
                                                <div class="modal-dialog modal-md modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-body-secondary">
                                                            <div class="d-flex justify-content-center w-100">
                                                                <h5 class="modal-title fw-semibold"
                                                                    id="exampleModalToggleLabel1">
                                                                    Update Stock "<span
                                                                        class="text-danger">Strawberry </span>"
                                                                </h5>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="bg-white p-2">
                                                                <div
                                                                    class="align-items-center justify-content-center gap-3">
                                                                    <form method="POST" id="form-stock- id " action="stock-id">
                                                                        

                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" name="name" id="name" value="name" disabled>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                                                            <input type="number" class="form-control" name="stock" id="stock- id " value="stock">
                                                                            <small class="text-danger d-none" id="error-stock- id ">Stock baru harus lebih besar dari 'stock'</small>
                                                                        </div>
                                                                        <div class="d-flex justify-content-end gap-2 pt-3 mt-3">
                                                                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- modal delete --}}
                                            <div class="modal" id="deleteModal- id " tabindex="-1"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel1">
                                                <div class="modal-dialog modal-md modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-body-secondary border">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="bg-white p-2">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center gap-3">
                                                                    <h6 class="mb-0 text-md">
                                                                        Are you sure you want to delete this "<span
                                                                            class="text-danger"> strawberry </span>"
                                                                        permanently?
                                                                    </h6>
                                                                </div>
                                                                <div class="d-flex justify-content-end gap-2 pt-3 mt-3">
                                                                    <button type="button" data-bs-dismiss="modal"
                                                                        class="btn btn-outline-secondary">
                                                                        Cancel
                                                                    </button>
                                                                    <form
                                                                        action="delete-id"
                                                                        method="POST">
                                                                        

                                                                        <button type="submit"
                                                                            class="btn btn-danger text-white">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
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