<!DOCTYPE html>
<!-- saved from url=(0084)file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Athens Sports Apparel</title>
<link href="../" rel="stylesheet">
</head>
<body>
    <style>
    /* Responsive Styles */

@media (max-width: 900px) {
    .hero-text h1 {
        font-size: 3rem;
    }
    
    nav ul {
        display: none; /* In a real app, this would be a hamburger menu */
    }
    
    .logo {
        font-size: 1.2rem;
    }
}

@media (max-width: 600px) {
    .hero-text h1 {
        font-size: 2.2rem;
    }
    
    .hero-text p {
        font-size: 1rem;
    }
    
    .hero-text .btn {
        display: block;
        margin: 10px auto;
        width: 80%;
    }
    
    section {
        padding: 4rem 5%;
    }
    
    .product-grid {
        grid-template-columns: 1fr;
    }
    
    .category-grid {
        grid-template-columns: 1fr;
    }
    
    .icons {
        gap: 1rem;
    }
}
:root {
  --bg-color: #050505;
  --surface-color: #111111;
  --surface-hover: #1a1a1a;
  --text-main: #ffffff;
  --text-muted: #a1a1aa;
  --brand-blue: #0070f3;
  --brand-orange: #ff5500;
  --brand-white: #ffffff;
  --header-height: 80px;
  --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Roboto', sans-serif;
  background-color: var(--bg-color);
  color: var(--text-main);
  line-height: 1.6;
  overflow-x: hidden;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  line-height: 1.2;
}

/* HEADER */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 5%;
  background: rgba(5, 5, 5, 0.8);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  z-index: 1000;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  transition: background 0.3s ease, box-shadow 0.3s ease;
}

.logo {
  font-family: 'Montserrat', sans-serif;
  font-size: 1.5rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  cursor: pointer;
}

nav ul {
  display: flex;
  list-style: none;
  gap: 2rem;
}

nav a {
  text-decoration: none;
  color: var(--text-main);
  font-weight: 500;
  font-size: 0.95rem;
  transition: var(--transition);
  position: relative;
}

nav a::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  background: var(--brand-orange);
  bottom: -4px;
  left: 0;
  transition: var(--transition);
}

nav a:hover {
  color: var(--brand-orange);
}

nav a:hover::after {
  width: 100%;
}

.icons {
  display: flex;
  gap: 1.5rem;
  font-size: 1.2rem;
  align-items: center;
}

.icons span {
  cursor: pointer;
  transition: var(--transition);
  position: relative;
}

.icons span:hover {
  transform: scale(1.1);
  color: var(--brand-blue);
  text-shadow: 0 0 10px rgba(0, 112, 243, 0.5);
}

.cart {
  position: relative;
}

#cart-count {
  position: absolute;
  top: -8px;
  right: -10px;
  background: var(--brand-orange);
  color: #fff;
  font-size: 0.7rem;
  font-weight: 700;
  width: 18px;
  height: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-family: 'Montserrat', sans-serif;
  transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

/* BUTTONS */
.btn {
  display: inline-block;
  padding: 0.8rem 2rem;
  border-radius: 30px;
  background: var(--brand-orange);
  color: #fff;
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: var(--transition);
  border: none;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(255, 85, 0, 0.3);
}

.btn:hover {
  background: #ff7733;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(255, 85, 0, 0.4);
}

.btn.secondary {
  background: transparent;
  border: 2px solid var(--text-main);
  box-shadow: none;
}

.btn.secondary:hover {
  background: var(--text-main);
  color: var(--bg-color);
  border-color: var(--text-main);
}

.add-to-cart {
  width: 100%;
  padding: 0.8rem;
  border: none;
  background: var(--brand-blue);
  color: white;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  text-transform: uppercase;
  border-radius: 8px;
  cursor: pointer;
  transition: var(--transition);
  opacity: 0;
  transform: translateY(10px);
}

.product-card:hover .add-to-cart {
  opacity: 1;
  transform: translateY(0);
}

.add-to-cart:hover {
  background: #005ce6;
  box-shadow: 0 4px 15px rgba(0, 112, 243, 0.4);
}

/* HERO SECTION */
.hero {
  margin-top: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  background: linear-gradient(rgba(5,5,5,0.6), rgba(5,5,5,0.9)), url('https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&q=80') center/cover no-repeat;
  padding: 0 5%;
}

.hero-text h1 {
  font-size: 4rem;
  margin-bottom: 1rem;
  background: linear-gradient(to right, #ffffff, #a1a1aa);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: fadeUp 1s ease-out;
}

.hero-text p {
  font-size: 1.2rem;
  color: var(--text-muted);
  margin-bottom: 2.5rem;
  max-width: 600px;
  margin-inline: auto;
  animation: fadeUp 1s ease-out 0.2s both;
}

.hero-text .btn {
  margin: 0 10px;
  animation: fadeUp 1s ease-out 0.4s both;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* SECTIONS COMMON */
section {
  padding: 6rem 5%;
}

section h2 {
  font-size: 2.5rem;
  text-align: center;
  margin-bottom: 3rem;
  position: relative;
  display: inline-block;
  left: 50%;
  transform: translateX(-50%);
}

section h2::after {
  content: '';
  position: absolute;
  width: 50%;
  height: 3px;
  background: var(--brand-orange);
  bottom: -10px;
  left: 25%;
  border-radius: 2px;
}

/* CATEGORIES */
.category-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
}

.category-card {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  aspect-ratio: 4/5;
  background: var(--surface-color);
  box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

.category-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
  opacity: 0.7;
}

.category-card:hover img {
  transform: scale(1.08);
  opacity: 0.4;
}

.category-card h3 {
  position: absolute;
  bottom: 20px;
  left: 20px;
  font-size: 1.8rem;
  z-index: 2;
  transition: var(--transition);
  text-shadow: 0 2px 10px rgba(0,0,0,0.8);
}

.category-card:hover h3 {
  color: var(--brand-orange);
  transform: translateX(10px);
}

/* PRODUCT GRID */
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2.5rem;
}

.product-card {
  background: var(--surface-color);
  border-radius: 16px;
  padding: 1.5rem;
  text-align: center;
  transition: var(--transition);
  border: 1px solid rgba(255, 255, 255, 0.03);
  display: flex;
  flex-direction: column;
}

.product-card:hover {
  transform: translateY(-10px);
  background: var(--surface-hover);
  border-color: rgba(255, 255, 255, 0.1);
  box-shadow: 0 15px 30px rgba(0,0,0,0.5);
}

.product-card img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 1.5rem;
  transition: transform 0.4s ease;
  background: #111;
}

.product-card:hover img {
  transform: scale(1.05);
}

.product-card h3 {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
  flex-grow: 1;
}

.product-card p {
  color: var(--brand-orange);
  font-weight: 700;
  font-size: 1.4rem;
  margin-bottom: 1.5rem;
  font-family: 'Montserrat', sans-serif;
}

/* FOOTER */
footer {
  background: #020202;
  padding: 4rem 5%;
  text-align: center;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.footer-content {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  color: var(--text-muted);
}
</style>
    <!-- HEADER -->
    <header>
        <div class="logo">Athens Sports Apparel</div>
        <nav>
            <ul>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/index.html">Home</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/shop.html">Shop</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/index.html#">Sports</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/index.html#">New Arrivals</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/index.html#">Deals</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/about.html">About Us</a></li>
                <li><a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
            <span class="search">🔍</span>
            <span class="account">👤</span>
            <span class="cart">🛒<span id="cart-count" style="transform: scale(1);">0</span></span>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-text">
            <h1>Gear Up Like a Champion</h1>
            <p>Premium sports apparel and merchandise for every athlete.</p>
            <a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/shop.html" class="btn">Shop Now</a>
            <a href="file:///C:/Users/Athens/.gemini/antigravity/scratch/athens-sports-apparel/shop.html" class="btn secondary">New Arrivals</a>
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="categories">
        <h2>Shop by Sport</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="./Athens Sports Apparel_files/football.jpg" alt="Football">
                <h3>Football</h3>
            </div>
            <div class="category-card">
                <img src="./Athens Sports Apparel_files/basketball.jpg" alt="Basketball">
                <h3>Basketball</h3>
            </div>
            <div class="category-card">
                <img src="./Athens Sports Apparel_files/running.jpg" alt="Running">
                <h3>Running</h3>
            </div>
            <div class="category-card">
                <img src="./Athens Sports Apparel_files/gym.jpg" alt="Gym">
                <h3>Gym</h3>
            </div>
        </div>
    </section>

    <!-- BEST SELLERS -->
    <section class="best-sellers">
        <h2>Best Sellers</h2>
        <div id="best-sellers-grid" class="product-grid">
            <!-- Products will be loaded from products.json -->
        <div class="product-card">
            <img src="./Athens Sports Apparel_files/running-shoes.jpg" alt="Performance Running Shoes">
            <h3>Performance Running Shoes</h3>
            <p>$120</p>
            <button class="add-to-cart" data-product="Performance Running Shoes" data-price="120">Add to Cart</button>
        </div><div class="product-card">
            <img src="https://images.unsplash.com/photo-1581655353564-df123a1eb820?auto=format&amp;fit=crop&amp;q=80&amp;w=500" alt="Compression Shirt">
            <h3>Compression Shirt</h3>
            <p>$45</p>
            <button class="add-to-cart" data-product="Compression Shirt" data-price="45">Add to Cart</button>
        </div><div class="product-card">
            <img src="https://images.unsplash.com/photo-1577212017184-80ec0ea7a23c?auto=format&amp;fit=crop&amp;q=80&amp;w=500" alt="Football Jersey">
            <h3>Football Jersey</h3>
            <p>$60</p>
            <button class="add-to-cart" data-product="Football Jersey" data-price="60">Add to Cart</button>
        </div><div class="product-card">
            <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&amp;fit=crop&amp;q=80&amp;w=500" alt="Basketball Shoes">
            <h3>Basketball Shoes</h3>
            <p>$130</p>
            <button class="add-to-cart" data-product="Basketball Shoes" data-price="130">Add to Cart</button>
        </div></div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <p>© 2026 Athens Sports Apparel. All rights reserved.</p>
            <p>Follow us: 🔵 🟠 ⚪</p>
        </div>
    </footer>

<script src="./Athens Sports Apparel_files/products.js"></script>
<script src="./Athens Sports Apparel_files/main.js"></script>
<script src="./Athens Sports Apparel_files/cart.js"></script>
<script src="./Athens Sports Apparel_files/api.js"></script>


</body></html>