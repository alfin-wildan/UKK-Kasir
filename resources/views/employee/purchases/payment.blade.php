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
                            <a href="purchaseIndex" class="link">Purchase</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="purchasecreate" class="link">Add Purchase</a>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Payment</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Payment</h1> 
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="paymentprocess" method="POST" class="row g-3">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <h4 class="fw-bold mb-4">Produk yang dipilih</h4>
                                    
                                        <div class="d-flex justify-content-between align-items-start mt-2">
                                            <div>
                                                <div class="fw-medium">milk</div>
                                                <div class="text-muted small">Rp. 10.000 x 2</div>
                                            </div>
                                            <div class="fw-bold">rp. 20.000</div>
                                        </div>
                                        <input type="hidden" 

                                            hidden="">
                                    
                                    <div class="d-flex justify-content-between mt-4">
                                        <div class="fw-bold fs-5">Total</div>
                                        <div class="fw-bold fs-5">30.000</div>
                                    </div>
                                    <input type="hidden" name="total" value="total">
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="member" class="form-label">Member Status</label>
                                            <small class="text-danger">Can create member</small>
                                            <select name="member" id="member" class="form-select"
                                                onchange="memberDetect()">
                                                <option value="Non-Member">Non-Member</option>
                                                <option value="Member">Member</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Nomor HP (hanya untuk member) -->
                                    <div id="member-wrap" class="d-none mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="fw-medium">Number Phone Member</label>
                                            <small class="text-danger">(Regist / Use Member)</small>
                                        </div>
                                        <input type="text" name="phone" id="phone" class="form-control mt-1">
                                    </div>
                                    <!-- Input pembayaran (sama untuk member dan non-member) -->
                                    <div class="mb-3">
                                        <label class="fw-medium" for="total_payment" >Total Payment</label>
                                        <input type="text" id="total_payment" name="total_payment" class="form-control" required>
                                        <small id="warningMessage" class="text-danger d-none">Jumlah bayar kurang.</small>
                                    </div>
                                    <div class="text-end mt-4">
                                        <button type="submit" id="submitButton" class="btn btn-primary px-4">Order</button>
                                    </div>                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function memberDetect() {
        const detectElement = document.getElementById('member');
        const phone = document.getElementById('member-wrap');
        const is_member = detectElement.value;

        if (is_member == 'Member') {
            phone.classList.remove('d-none');
        } else {
            phone.classList.add('d-none');
        }
    }




























</script>
@endsection
