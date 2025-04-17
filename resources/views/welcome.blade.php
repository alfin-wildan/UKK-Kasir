<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hao Fruit Market</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@latest/css/themify-icons.css">

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <b class="logo-icon">
            <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
        </b>
        <span class="logo-text">
            <img src="{{ asset('assets/images/logo-text.png') }} " alt="homepage" class="dark-logo" />
        </span>
    </a>
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-light text-center py-5">
    <div class="container">
      <h1 class="display-5 fw-bold">🍇 Fresh Fruits Delivered to Your Door!</h1>
      <p class="lead mb-4">At Hao Fruit Market, we deliver handpicked fresh fruits straight from the farm to your home 🏡.</p>
      <a href="{{ route('login') }}" class="btn btn-success btn-md">🛍️ Shop Now</a>
    </div>
  </section>

<!-- Features Section -->
<section class="py-5">
  <div class="container">
    <h4 class="text-center mb-5 fw-bold"> Why Choose Hao Fruit Market?</h4>
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🥝 Always Fresh</h5>
          <p>We carefully select the best fruits every morning from trusted farmers. Your fruits are guaranteed to be juicy, ripe, and delicious — just like nature intended!</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🚚 Fast Delivery</h5>
          <p>No more waiting! 🕒 We process and deliver your orders on the same day (for local areas), ensuring your fruits arrive fresh and full of flavor 🍊. You pick, we deliver — fast!</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">💰 Best Prices</h5>
          <p>By working directly with local farms, we cut out the middlemen. That means you get top quality fruits at the best prices — great for your health and your wallet 💸!</p>
        </div>
      </div>
    </div>

    <div class="row text-center g-4 mt-4">
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">🍓 Seasonal Specials</h5>
          <p>Enjoy the best fruits of every season! From sweet summer mangoes to fresh winter oranges, our stock is always changing to bring you nature’s finest, year-round.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">📦 Eco-Friendly Packaging</h5>
          <p>We love the Earth 🌍 — that’s why we use recyclable, minimal packaging that protects your fruits and the planet. Enjoy guilt-free shopping with every bite.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-semibold">⭐ Customer Satisfaction</h5>
          <p>Our happy customers are our biggest fans. From quality to delivery, we’re here to make your experience 100% satisfying. Got a problem? We’ll fix it fast!</p>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0">&copy; 2025 Hao Fruit Market. Freshness You Can Taste </p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
