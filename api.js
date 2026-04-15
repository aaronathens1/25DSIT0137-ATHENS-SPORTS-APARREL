// Render products in best sellers grid
function renderProducts(productsToRender) {
    const grid = document.getElementById("best-sellers-grid");
    if (!grid) return;
    
    grid.innerHTML = '';
    productsToRender.forEach(prod => {
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
        grid.appendChild(card);
    });

    // Add event listeners to new buttons
    const addButtons = document.querySelectorAll(".add-to-cart");
    addButtons.forEach(button => {
        button.addEventListener("click", () => {
            const card = button.closest(".product-card");
            const sizeSelect = card.querySelector(".product-size-select");
            
            let product = button.dataset.product;
            const price = button.dataset.price;
            
            if (sizeSelect) {
                product = product + " - Size: " + sizeSelect.value;
            }

            const imgEl = card.querySelector("img");
            const imgSrc = imgEl ? imgEl.src : null;

            if (typeof window.addToCartGlobal === 'function') {
                window.addToCartGlobal(product, price, imgSrc);
            } else {
                cart.push({ product, price, image: imgSrc, quantity: 1 });
                if(typeof updateCartCount === 'function') updateCartCount();
                alert(`${product} added to cart!`);
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Initial Render
    renderProducts(products);

    // Search Functionality
    const searchInput = document.getElementById("search-input");
    const searchIcon = document.getElementById("search-icon") || document.querySelector(".search");

    function executeSearch() {
        if (!searchInput) return;
        const q = searchInput.value.toLowerCase().trim();
        const filtered = products.filter(p => 
            p.name.toLowerCase().includes(q) || 
            p.category.toLowerCase().includes(q)
        );
        renderProducts(filtered);
    }

    if (searchInput) {
        searchInput.addEventListener("input", executeSearch);
    }

    if (searchIcon) {
        searchIcon.addEventListener("click", () => {
            if (searchInput) {
                searchInput.focus();
                // Scroll if they specifically clicked the icon and there is a search term
                const bestSellersSection = document.querySelector(".best-sellers");
                if (bestSellersSection && searchInput.value.trim() !== '') {
                    bestSellersSection.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    }
});
