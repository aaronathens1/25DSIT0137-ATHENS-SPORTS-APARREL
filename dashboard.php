<?php 
session_start(); 

if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=1");
        exit();
    }
    $_SESSION['LAST_ACTIVITY'] = time();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Athens Sports Apparel</title>
<link href="../" rel="stylesheet">
</head>
<body>
    <style>
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

.logo-container {
  display: flex;
  align-items: center;
  gap: 12px;
  cursor: pointer;
}

.logo-img {
  width: 40px;
  height: 40px;
  transition: transform 0.3s ease;
}

.logo-container:hover .logo-img {
  transform: scale(1.1) rotate(-5deg);
}

.logo-text {
  font-family: 'Montserrat', sans-serif;
  font-size: 1.5rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
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
  transform: translateY(-80px);
}

.category-card .equipment-list {
  position: absolute;
  bottom: -100%;
  left: 0;
  width: 100%;
  padding: 20px;
  background: linear-gradient(to top, rgba(0,0,0,0.95), rgba(0,0,0,0.7));
  transition: var(--transition);
  z-index: 3;
}

.category-card:hover .equipment-list {
  bottom: 0;
}

.equipment-list ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.equipment-list li {
  display: flex;
  justify-content: space-between;
  margin-bottom: 8px;
  font-size: 0.9rem;
  color: #eee;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  padding-bottom: 4px;
}

.equipment-list li:last-child {
  border-bottom: none;
}

.equipment-list li span.price {
  color: var(--brand-orange);
  font-weight: bold;
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
        <div class="logo-container" onclick="window.location.href='dashboard.php'">
            <img src="logo.svg" alt="Athens Logo" class="logo-img">
            <div class="logo-text">Athens Sports Apparel</div>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="category.php">Shop</a></li>
                <li><a href="#sports">Sports</a></li>
                <li><a href="category.php?sport=New%20Arrivals">New Arrivals</a></li>
                <li><a href="category.php?sport=Deals">Deals</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
            <span class="search" id="search-icon" style="cursor: pointer;">🔍</span>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="?logout=1" class="btn" style="padding: 0.4rem 1rem; font-size: 0.8rem; text-decoration: none;">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn secondary" style="padding: 0.4rem 1rem; font-size: 0.8rem; text-decoration: none;">Login</a>
                <a href="index.php" class="btn" style="padding: 0.4rem 1rem; font-size: 0.8rem; text-decoration: none;">Sign Up</a>
                <a href="admin_login.php" class="btn secondary" style="padding: 0.4rem 1rem; font-size: 0.8rem; border-color: var(--brand-orange); color: var(--brand-orange); text-decoration: none;">Admin Login</a>
            <?php endif; ?>
            <span class="cart">🛒<span id="cart-count" style="transform: scale(1);">0</span></span>
        </div>
    </header>

    <!-- ANNOUNCEMENT BANNER -->
    <div class="announcement-banner" style="background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange)); color: white; text-align: center; padding: 12px 20px; font-size: 0.95rem; font-weight: 500; letter-spacing: 0.5px; position: relative; margin-top: var(--header-height); z-index: 10;">
        📢 <strong>Please Note:</strong> Items displayed come in various sizes and colors, and from top sports brands like Nike, Adidas, Puma, and more! Our physical store offers even more options and variations not shown online. Various products in relation to sport are not published here but can be found on the shop.
    </div>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-text">
            <h1>Gear Up Like a Champion</h1>
            <p>Premium sports apparel and merchandise for every athlete.</p>
            <a href="category.php" class="btn">Shop Now</a>
            <a href="category.php?sport=New%20Arrivals" class="btn secondary">New Arrivals</a>
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="categories" id="sports">
        <h2>Shop by Sport</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="football.jpg" alt="Football">
                <h3>Football</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Helmet <span class="price">$69</span></li>
                        <li>Cleats <span class="price">$179</span></li>
                        <li>Pads <span class="price">$15</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="basketball.jpg" alt="Basketball">
                <h3>Basketball</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Hoop <span class="price">$32</span></li>
                        <li>Basketball <span class="price">$11</span></li>
                        <li>Shoes <span class="price">$120</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="running.jpg" alt="Running">
                <h3>Running</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Shoes <span class="price">$176</span></li>
                        <li>Shorts <span class="price">$35</span></li>
                        <li>Watch <span class="price">$375</span></li>
                    </ul>
                </div>
            </div>
            <?php if(isset($_SESSION['user_id'])): ?>
            <div class="category-card">
                <img src="gym.jpg" alt="Gym">
                <h3>Gym</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Dumbbells <span class="price">$38</span></li>
                        <li>Bench <span class="price">$56</span></li>
                        <li>Mat <span class="price">$99</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="tennis.jpg" alt="Tennis">
                <h3>Tennis</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Racket <span class="price">$216</span></li>
                        <li>Balls <span class="price">$34</span></li>
                        <li>Shoes <span class="price">$93</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="baseball.jpg" alt="Baseball">
                <h3>Baseball</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Bat <span class="price">$192</span></li>
                        <li>Glove <span class="price">$192</span></li>
                        <li>Balls <span class="price">$32</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="swimming.jpg" alt="Swimming">
                <h3>Swimming</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Goggles <span class="price">$41</span></li>
                        <li>Swimsuit <span class="price">$42</span></li>
                        <li>Cap <span class="price">$15</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="volleyball.jpg" alt="Volleyball">
                <h3>Volleyball</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Net <span class="price">$250</span></li>
                        <li>Ball <span class="price">$10</span></li>
                        <li>Knee Pads <span class="price">$20</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="golf.png" alt="Golf">
                <h3>Golf</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Clubs <span class="price">$450</span></li>
                        <li>Balls <span class="price">$26</span></li>
                        <li>Tees <span class="price">$11</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="boxing_gloves.png" alt="Boxing">
                <h3>Boxing</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Gloves <span class="price">$60</span></li>
                        <li>Heavy Bag <span class="price">$69</span></li>
                        <li>Wraps <span class="price">$56</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="cycling.jpg" alt="Cycling">
                <h3>Cycling</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Bike <span class="price">$396</span></li>
                        <li>Helmet <span class="price">$243</span></li>
                        <li>Gloves <span class="price">$24</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="rugby.png" alt="Rugby">
                <h3>Rugby</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Ball <span class="price">$27</span></li>
                        <li>Boots <span class="price">$112</span></li>
                        <li>Headgear <span class="price">$124</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="cricket.jpg" alt="Cricket">
                <h3>Cricket</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Bat <span class="price">$218</span></li>
                        <li>Pads <span class="price">$218</span></li>
                        <li>Ball <span class="price">$34</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="hockey.jpg" alt="Hockey">
                <h3>Hockey</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Stick <span class="price">$140</span></li>
                        <li>Puck <span class="price">$25</span></li>
                        <li>Skates <span class="price">$114</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="table_tennis.jpg" alt="Table Tennis">
                <h3>Table Tennis</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Paddle <span class="price">$205</span></li>
                        <li>Table <span class="price">$358</span></li>
                        <li>Balls <span class="price">$23</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="badminton.jpg" alt="Badminton">
                <h3>Badminton</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Racket <span class="price">$129</span></li>
                        <li>Shuttlecocks <span class="price">$16</span></li>
                        <li>Net <span class="price">$208</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="surfing.jpg" alt="Surfing">
                <h3>Surfing</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Board <span class="price">$245</span></li>
                        <li>Wetsuit <span class="price">$53</span></li>
                        <li>Wax <span class="price">$245</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="skateboarding.png" alt="Skateboarding">
                <h3>Skateboarding</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Deck <span class="price">$80</span></li>
                        <li>Trucks <span class="price">$45</span></li>
                        <li>Wheels <span class="price">$30</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="snowboarding.jpg" alt="Snowboarding">
                <h3>Snowboarding</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Board <span class="price">$210</span></li>
                        <li>Boots <span class="price">$79</span></li>
                        <li>Goggles <span class="price">$75</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="skiing.jpg" alt="Skiing">
                <h3>Skiing</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Skis <span class="price">$420</span></li>
                        <li>Poles <span class="price">$24</span></li>
                        <li>Helmet <span class="price">$240</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="yoga.jpg" alt="Yoga">
                <h3>Yoga</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Mat <span class="price">$99</span></li>
                        <li>Blocks <span class="price">$59</span></li>
                        <li>Strap <span class="price">$37</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="track.jpg" alt="Track and Field">
                <h3>Track and Field</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Spikes <span class="price">$75</span></li>
                        <li>Starting Block <span class="price">$120</span></li>
                        <li>Baton <span class="price">$15</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="uefa_ball.png" alt="Soccer (Football)">
                <h3>Soccer (Football)</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Ball <span class="price">$16</span></li>
                        <li>Cleats <span class="price">$179</span></li>
                        <li>Shin Guards <span class="price">$20</span></li>
                    </ul>
                </div>
            </div>
            <div class="category-card">
                <img src="pool_table_cover.png" alt="Pool Tables">
                <h3>Pool Tables</h3>
                <div class="equipment-list">
                    <ul>
                        <li>Cue <span class="price">$23</span></li>
                        <li>Balls <span class="price">$15</span></li>
                        <li>Heyball Table <span class="price">$1500</span></li>
                    </ul>
                </div>
            </div>
            <?php else: ?>
                <div class="category-card" style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; justify-content: center; background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));">
                    <h3 style="font-size: 2rem; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">Unlock the Full Arsenal!</h3>
                    <p style="color: #fff; margin-bottom: 1.5rem;">Sign up to view all 24 sports categories and gain access to exclusive best-sellers.</p>
                    <a href="index.php" class="btn" style="background: #fff; color: var(--brand-orange);">Sign Up Now</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- BEST SELLERS -->
    <section class="best-sellers">
        <h2>Best Sellers</h2>
        <?php if(isset($_SESSION['user_id'])): ?>
        <div id="best-sellers-grid" class="product-grid">
            <!-- Products will be loaded from products.json -->
        </div>
        <?php else: ?>
        <div style="text-align: center; padding: 3rem; background: var(--surface-color); border-radius: 16px; border: 1px solid rgba(255,255,255,0.05);">
            <h3 style="color: var(--brand-orange); font-size: 1.8rem; margin-bottom: 1rem;">Member Exclusive</h3>
            <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 2rem;">Log in or create an account to shop Athens Sports Apparel's hottest inventory!</p>
            <div style="display: flex; justify-content: center; gap: 1rem;">
                <a href="login.php" class="btn secondary">Login</a>
                <a href="index.php" class="btn">Sign Up</a>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <p>© 2026 Athens Sports Apparel. All rights reserved.</p>
            <p>Follow us: 🔵 🟠 ⚪</p>
        </div>
    </footer>

<script src="products.js"></script>
<script src="main.js"></script>
<script src="cart.js"></script>
<script src="api.js"></script>
<script src="imageModal.js"></script>


</body></html>