<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar with Multiple Dropdowns</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav class="navbar">
    <!-- Logo -->
    <div class="logo">MyShop</div>
    <?php
    session_start();
    ?>
    <!-- Center Links -->
    <div class="nav-center">
      <div class="nav-item">
        <button class="nav-link">Home</button>
      </div>
      <div class="nav-item">
        <button class="nav-link">About</button>
      </div>
      <div class="nav-item">
        <button class="nav-link">Contact</button>
      </div>

      <div class="nav-item">
        <button class="nav-link">Offers ▾</button>
        <div class="dropdown">
          <a href="#">Summer Sale</a>
          <a href="#">Winter Sale</a>
          <a href="#">Festival Offer</a>
        </div>
      </div>

      <div class="nav-item">
        <button class="nav-link">Pages ▾</button>
        <div class="dropdown">
          <a href="#">Gallery</a>
          <a href="#">Our Team</a>
          <a href="#">FAQ</a>
        </div>
      </div>

      <div class="nav">

        <?php if (isset($_SESSION['email'])): ?>
          <div class="nav-item">
            <span class="nav-link">Welcome, <?= htmlspecialchars($_SESSION['email']) ?></span>
          </div>
        <?php else: ?>
          <div class="nav-item">
            <a href="register.html" class="nav-link">Register</a>
          </div>
          <div class="nav-item">
            <a href="login.html" class="nav-link">Login</a>
          </div>
        <?php endif; ?>
      </div>


      <!-- Right Section -->
      <div class="right-section">
        <div class="search-box">
          <input type="text" placeholder="Search..." />
        </div>
        <div class="cart" onclick="addToCart()">
          🛒
          <div class="cart-count" id="cartCount">0</div>
        </div>
      </div>
  </nav>
  <!-- <P>registration form structure will be email(format:name@diu.edu.bd),name,birthdate,serial number(xxxx-xxx first 4 digit bate of birth and next three digit will be his id number),password(A-Z,a-z,0-9,@),submit button,now give all database structure and form using html,css,js,php</P> -->

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <div class="hero-left">
        <h2>Welcome to MyShop</h2>

        <p>Your one-stop destination for all the latest trends and deals. Enjoy seasonal offers and top-quality products at unbeatable prices!</p>
        <button>Shop Now</button>
      </div>
      <div class="hero-right">
        <img src="https://images.pexels.com/photos/7372077/pexels-photo-7372077.jpeg" alt="Hero Image" />
      </div>
    </div>
  </section>

  <!-- Food Card Section -->
  <section class="card-section">
    <h2 class="section-title">Popular Foods</h2>
    <div class="card-container">

      <!-- Card 1 -->
      <div class="food-card" data-regular="250" data-discount="200">
        <div class="discount-badge"></div>
        <img src="https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg" alt="Burger" />
        <h3>Burger</h3>
        <p class="price">
          <span class="regular-price"></span>
          <span class="discount-price"></span>
        </p>
        <form method="POST" action="order.php">
          <input type="hidden" name="item_name" value="Burger">
          <input type="hidden" name="regular_price" value="250">
          <input type="hidden" name="discount_price" value="200">
          <button type="submit">Order Now</button>
        </form>

      </div>

      <!-- Card 2 -->
      <div class="food-card" data-regular="600" data-discount="300">
        <div class="discount-badge"></div>
        <img src="https://images.pexels.com/photos/825661/pexels-photo-825661.jpeg" alt="Pizza" />
        <h3>Pizza</h3>
        <p class="price">
          <span class="regular-price"></span>
          <span class="discount-price"></span>
        </p>
        <form method="POST" action="order.php">
          <input type="hidden" name="item_name" value="Pizza">
          <input type="hidden" name="regular_price" value="600">
          <input type="hidden" name="discount_price" value="300">
          <button type="submit">Order Now</button>
        </form>
      </div>

      <!-- Card 3 -->
      <div class="food-card" data-regular="500" data-discount="350">
        <div class="discount-badge"></div>
        <img src="https://images.pexels.com/photos/1437267/pexels-photo-1437267.jpeg" alt="Pasta" />
        <h3>Pasta</h3>
        <p class="price">
          <span class="regular-price"></span>
          <span class="discount-price"></span>
        </p>
        <form method="POST" action="order.php">
          <input type="hidden" name="item_name" value="Pasta">
          <input type="hidden" name="regular_price" value="500">
          <input type="hidden" name="discount_price" value="350">
          <button type="submit">Order Now</button>
        </form>
      </div>


    </div>
  </section>




  <script src="script.js"></script>

</body>

</html>