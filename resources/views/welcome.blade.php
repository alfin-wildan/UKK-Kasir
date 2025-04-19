<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Frosty Mart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/Ice.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@latest/css/themify-icons.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <b class="logo-icon">
        <img src="{{ asset('assets/images/Ice.png') }}" alt="homepage" class="light-logo img-fluid" style="max-width: 50px; height: auto;" />
        <span class="logo-text">Frosty Mart</span>
        </b>
    </a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-light text-center py-5">
    <div class="container">
      <h1 class="display-5 fw-bold">❄️ Frozen Goodness, Anytime You Want!</h1>
      <p class="lead mb-4">Di Frosty Mart, kami menyediakan makanan beku berkualitas yang praktis, lezat, dan siap saji kapan pun kamu butuh 🍗🍤.</p>
      <a href="{{ route('login') }}" class="btn btn-primary btn-md">🛒 Belanja Sekarang</a>
    </div>
  </section>

<!-- Features Section -->
<section class="py-5">
  <div class="container">
    <h4 class="text-center mb-5 fw-bold">Kenapa Pilih Frosty Mart?</h4>
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🍤 Praktis & Cepat</h5>
          <p>Gak punya waktu masak? Tenang! Produk frozen kami tinggal goreng, kukus, atau oven — makanan enak siap dalam hitungan menit!</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🧊 Selalu Fresh Bekunya</h5>
          <p>Dibekukan dengan teknologi modern untuk menjaga rasa, tekstur, dan nutrisi. Rasanya tetap nikmat seperti baru dimasak!</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">💸 Harga Bersahabat</h5>
          <p>Enak gak harus mahal. Kami langsung ambil dari produsen terpercaya agar kamu bisa nikmatin kualitas premium tanpa bikin kantong bolong.</p>
        </div>
      </div>
    </div>

    <div class="row text-center g-4 mt-4">
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🧀 Banyak Pilihan</h5>
          <p>Dari nugget ayam, sosis sapi, dimsum, sampai seafood frozen — semua ada di sini! Kamu tinggal pilih sesuai selera.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">📦 Packing Aman & Higienis</h5>
          <p>Kami jaga kualitas dan suhu sampai rumah kamu. Packing rapih, food grade, dan tahan dingin untuk jaga kesegaran maksimal.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🌟 Kepuasan Dijamin</h5>
          <p>Kalau ada masalah? Kami siap bantu. Ulasan positif dari pelanggan bikin kami terus semangat kasih yang terbaik buat kamu!</p>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0">&copy; 2025 Frosty Mart. Beku Tapi Bikin Rindu ❄️🍽️</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
