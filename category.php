<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category - Athens Sports Apparel</title>
    <!-- Common theme definitions -->
    <style>
        :root {
          --bg-color: #050505;
          --surface-color: #111111;
          --surface-hover: #1a1a1a;
          --text-main: #ffffff;
          --text-muted: #a1a1aa;
          --brand-blue: #0070f3;
          --brand-orange: #ff5500;
          --header-height: 80px;
          --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
          font-family: 'Roboto', sans-serif;
          background-color: var(--bg-color);
          color: var(--text-main);
          line-height: 1.6;
          overflow-x: hidden;
          padding-top: var(--header-height);
        }

        /* HEADER */
        header {
          position: fixed; top: 0; left: 0; width: 100%; height: var(--header-height);
          display: flex; justify-content: space-between; align-items: center;
          padding: 0 5%; background: rgba(5, 5, 5, 0.8);
          backdrop-filter: blur(12px); z-index: 1000;
          border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .logo-container { display: flex; align-items: center; gap: 12px; cursor: pointer; }
        .logo-img { width: 40px; height: 40px; transition: transform 0.3s ease; }
        .logo-container:hover .logo-img { transform: scale(1.1) rotate(-5deg); }
        .logo-text { font-size: 1.5rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
          background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
          -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        nav ul { display: flex; list-style: none; gap: 2rem; }
        nav a { text-decoration: none; color: var(--text-main); font-weight: 500; transition: var(--transition); }
        nav a:hover { color: var(--brand-orange); }
        
        .icons { display: flex; gap: 1.5rem; align-items: center; font-size: 1.2rem; }
        .icons span { cursor: pointer; transition: var(--transition); position: relative;}
        .icons span:hover { transform: scale(1.1); color: var(--brand-blue); text-shadow: 0 0 10px rgba(0, 112, 243, 0.5); }
        .cart-count { position: absolute; top: -8px; right: -10px; background: var(--brand-orange); color: #fff; font-size: 0.7rem; font-weight: 700; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; border-radius: 50%; }

        /* PAGE HEADER */
        .category-header {
            padding: 5rem 5%; text-align: center;
            background: linear-gradient(rgba(5,5,5,0.7), rgba(5,5,5,0.9)), url('https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&q=80') center/cover;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .category-header h1 { font-size: 3rem; margin-bottom: 1rem; color: var(--text-main); text-shadow: 0 4px 15px rgba(0,0,0,0.8); }
        .category-header p { font-size: 1.2rem; color: var(--brand-orange); }
        
        /* PRODUCT GRID */
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2.5rem; padding: 4rem 5%; }
        .product-card { background: var(--surface-color); border-radius: 16px; padding: 1.5rem; text-align: center; transition: var(--transition); border: 1px solid rgba(255, 255, 255, 0.03); display: flex; flex-direction: column; }
        .product-card:hover { transform: translateY(-10px); background: var(--surface-hover); box-shadow: 0 15px 30px rgba(0,0,0,0.5); }
        .product-card img { width: 100%; height: 280px; object-fit: cover; border-radius: 8px; margin-bottom: 1.5rem; transition: transform 0.4s ease; background: #111; }
        .product-card:hover img { transform: scale(1.05); }
        .product-card h3 { font-size: 1.2rem; margin-bottom: 0.5rem; flex-grow: 1; }
        .product-card p { color: var(--brand-orange); font-weight: 700; font-size: 1.4rem; margin-bottom: 1.5rem; }
        .add-to-cart { width: 100%; padding: 0.8rem; border: none; background: var(--brand-blue); color: white; font-weight: 700; text-transform: uppercase; border-radius: 8px; cursor: pointer; transition: var(--transition); opacity: 0; transform: translateY(10px); }
        .product-card:hover .add-to-cart { opacity: 1; transform: translateY(0); }
        .add-to-cart:hover { background: #005ce6; box-shadow: 0 4px 15px rgba(0, 112, 243, 0.4); }
        
        .no-results { text-align: center; width: 100%; grid-column: 1 / -1; padding: 4rem 0; color: var(--text-muted); font-size: 1.2rem; }
        
        footer { background: #020202; padding: 4rem 5%; text-align: center; border-top: 1px solid rgba(255,255,255,0.05); margin-top: auto;}
        
        /* Layout fix to push footer to bottom if few products */
        body { min-height: 100vh; display: flex; flex-direction: column; }
    </style>
</head>
<body>
    <header>
        <div class="logo-container" onclick="window.location.href='dashboard.php'">
            <img src="logo.svg" alt="Athens Logo" class="logo-img">
            <div class="logo-text">Athens Sports Apparel</div>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="category.php">Shop All</a></li>
            </ul>
        </nav>
        <div class="icons">
            <div class="search-container" style="display: flex; align-items: center; background: rgba(255,255,255,0.1); border-radius: 20px; padding: 5px 15px; transition: var(--transition);">
                <input type="text" id="search-input" placeholder="Search products..." style="background: transparent; border: none; color: white; outline: none; width: 150px; font-size: 0.9rem; font-family: 'Roboto', sans-serif;">
                <span class="search" id="search-icon" style="cursor: pointer; margin-left: 8px;">🔍</span>
            </div>
            <span class="account" onclick="window.location.href='login.php'">👤</span>
            <span class="cart">🛒<span id="cart-count" class="cart-count">0</span></span>
        </div>
    </header>



    <div class="category-header">
        <h1 id="category-title">Loading...</h1>
        <p>Explore premium products in this category</p>
    </div>

    <div id="category-products-grid" class="product-grid">
        <!-- Javascript dynamically inserts products here -->
    </div>

    <!-- ANNOUNCEMENT BANNER -->
    <div class="announcement-banner" style="background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange)); color: white; text-align: center; padding: 20px; font-size: 0.95rem; font-weight: 500; letter-spacing: 0.5px;">
        📢 <strong>Please Note:</strong> Items displayed come in various sizes and colors, and from top sports brands like Nike, Adidas, Puma, and more! Our physical store offers even more options and variations not shown online. Various products in relation to sport are not published here but can be found on the shop.
    </div>

    <footer>
        <p>© 2026 Athens Sports Apparel. All rights reserved.</p>
    </footer>

    <script src="products.js"></script>
    <script src="cart.js"></script>
    <script src="imageModal.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            let sportParam = params.get('sport');
            const titleEl = document.getElementById('category-title');
            const gridEl = document.getElementById('category-products-grid');

            if (!sportParam) {
                sportParam = "All Products"; // Display a fallback
                titleEl.textContent = sportParam;
                renderProducts(products);
            } else if (sportParam.toLowerCase() === "new arrivals") {
                titleEl.textContent = "New Arrivals";
                const newArrivals = products.slice(-20).reverse();
                renderProducts(newArrivals);
            } else if (sportParam.toLowerCase() === "deals") {
                titleEl.textContent = "Today's Deals";
                const deals = products.filter(p => p.price <= 50).slice(0, 30);
                renderProducts(deals);
            } else {
                titleEl.textContent = sportParam;
                // Filter products that exactly match the category
                const filtered = products.filter(p => p.category.toLowerCase() === sportParam.toLowerCase());
                renderProducts(filtered);
            }

            function renderProducts(items) {
                gridEl.innerHTML = '';
                if (items.length === 0) {
                    gridEl.innerHTML = `<div class="no-results">No specific products found for ${sportParam} yet. We are actively expanding our catalog!</div>`;
                    return;
                }
                items.forEach(prod => {
                    const isFootwear = /(shoe|boot|cleat|spike|skate)/i.test(prod.name);
                    const isApparel = /(shirt|short|glove|helmet|pad|windbreaker|band|sock|wristband|swimsuit|jersey|headgear|guard|apparel)/i.test(prod.name) || /(football|running|gym|tennis|baseball|swimming|volleyball|golf|boxing|cycling|rugby)/i.test(prod.category) && /(shirt|short|glove|helmet|pad|windbreaker|band|sock|wristband|swimsuit|jersey|headgear|guard)/i.test(prod.name);
                    
                    let sizeSelectHTML = '';
                    if (isFootwear) {
                        sizeSelectHTML = `
                            <select class="product-size-select" style="margin-bottom:15px; width:100%; padding:8px; border-radius:4px; border:1px solid rgba(255,255,255,0.1); background:#050505; color:white; outline:none; font-family:'Roboto',sans-serif;">
                                <option value="7">Size: 7</option>
                                <option value="8">Size: 8</option>
                                <option value="9">Size: 9</option>
                                <option value="10" selected>Size: 10</option>
                                <option value="11">Size: 11</option>
                                <option value="12">Size: 12</option>
                                <option value="13">Size: 13</option>
                            </select>
                        `;
                    } else if (isApparel) {
                        sizeSelectHTML = `
                            <select class="product-size-select" style="margin-bottom:15px; width:100%; padding:8px; border-radius:4px; border:1px solid rgba(255,255,255,0.1); background:#050505; color:white; outline:none; font-family:'Roboto',sans-serif;">
                                <option value="S">Size: S</option>
                                <option value="M" selected>Size: M</option>
                                <option value="L">Size: L</option>
                                <option value="XL">Size: XL</option>
                            </select>
                        `;
                    }

                    const card = document.createElement("div");
                    card.classList.add("product-card");
                    card.innerHTML = `
                        <img src="${prod.image}" alt="${prod.name}">
                        <h3>${prod.name}</h3>
                        <p>$${prod.price}</p>
                        ${sizeSelectHTML}
                        <button class="add-to-cart" data-product="${prod.name}" data-price="${prod.price}">Add to Cart</button>
                    `;
                    gridEl.appendChild(card);
                });

                // Attach Add to Cart listener
                const addButtons = document.querySelectorAll(".add-to-cart");
                addButtons.forEach(button => {
                    button.addEventListener("click", () => {
                        const card = button.closest('.product-card');
                        const imgEl = card.querySelector('img');
                        const sizeSelect = card.querySelector('.product-size-select');
                        const imgSrc = imgEl ? imgEl.src : null;
                        
                        let product = button.dataset.product;
                        const price = button.dataset.price;
                        
                        if (sizeSelect) {
                            product = product + " - Size: " + sizeSelect.value;
                        }

                        if(typeof window.addToCartGlobal === 'function') {
                            window.addToCartGlobal(product, price, imgSrc);
                        } else {
                            cart.push({
                                product: product,
                                price: price,
                                image: imgSrc,
                                quantity: 1
                            });
                            if(typeof updateCartCount === 'function') updateCartCount();
                            alert(product + " added to cart!");
                        }
                    });
                });
            }

            // Search Functionality
            const searchInput = document.getElementById("search-input");
            const searchIcon = document.getElementById("search-icon");
            
            function performSearch() {
                if (!searchInput) return;
                const q = searchInput.value.toLowerCase().trim();
                
                if (q !== "") {
                    titleEl.textContent = 'Search Results for "' + q + '"';
                    const filtered = products.filter(p => 
                        p.name.toLowerCase().includes(q) || 
                        p.category.toLowerCase().includes(q)
                    );
                    renderProducts(filtered);
                } else {
                    if (!sportParam || sportParam.toLowerCase() === "all products" || sportParam.toLowerCase() === "null") {
                        titleEl.textContent = "All Products";
                        renderProducts(products);
                    } else if (sportParam.toLowerCase() === "new arrivals") {
                        titleEl.textContent = "New Arrivals";
                        renderProducts(products.slice(-20).reverse());
                    } else if (sportParam.toLowerCase() === "deals") {
                        titleEl.textContent = "Today's Deals";
                        renderProducts(products.filter(p => p.price <= 50).slice(0, 30));
                    } else {
                        titleEl.textContent = sportParam;
                        renderProducts(products.filter(p => p.category.toLowerCase() === sportParam.toLowerCase()));
                    }
                }
            }

            if (searchInput) {
                searchInput.addEventListener("input", performSearch);
            }
            if (searchIcon) {
                searchIcon.addEventListener("click", () => {
                    if (searchInput) searchInput.focus();
                });
            }
        });
    </script>
</body>
</html>
