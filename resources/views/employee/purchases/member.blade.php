@extends('components.navbar')

@section('container')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="dashboard" class="link">
                                <i class="mdi mdi-home-outline fs-4"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="purchaseindex" class="link">Purchase</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="purchasecreate" class="link">Add Purchase</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="purchasepayment" class="link">Payment</a>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Member</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Member</h1> 
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row">
                            <!-- Kiri: Rincian Produk -->
                            <div class="col-md-6 mb-4">
                                <div class="border border-black rounded p-3 h-100">
                                    <table class="table mb-4">
                                        <thead>
                                            <tr>
                                                <th><b>Product</b></th>
                                                <th><b>QTY</b></th>
                                                <th><b>Price</b></th>
                                                <th><b>Sub Total</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr class="service">
                                                <td class="tableitem">
                                                    <p class="itemtext">milk</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">Rp.
                                                        23.000
                                                    </p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">10</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">Rp.
                                                        60.000
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between mb-2">
                                        <strong>Total Price</strong>
                                        <strong>Rp. 23.000</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <strong>Total Payment</strong>
                                        <strong>Rp. 45.000</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 h-100">
                                    <form action="member-id" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="purchase_id" value="purchase-id">
                                        <input type="hidden" name="member_id" value="member-id">
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">Member Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="member-name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="point" class="form-label fw-bold">Point</label>
                                            <input type="text" class="form-control bg-light" name="point" id="point" value="200" readonly>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" value="Ya" type="checkbox" id="check_point" name="check_point"             >
                                            <label class="form-check-label" for="check_point">
                                                Use point
                                            </label>
                                            
                                                <small class="text-danger">Can't use point because is your first purchase.</small>
                                            
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Next</button>
                                        </div>
                                    </form>
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
