// Render products in best sellers grid
function renderProducts(productsToRender) {
    const grid = document.getElementById("best-sellers-grid");
    if (!grid) return;
    
    grid.innerHTML = '';
    productsToRender.forEach(prod => {
        const card = document.createElement("div");
        card.classList.add("product-card");
        card.innerHTML = `
            <img src="${prod.image}" alt="${prod.name}">
            <h3>${prod.name}</h3>
            <p>$${prod.price}</p>
            <button class="add-to-cart" data-product="${prod.name}" data-price="${prod.price}">Add to Cart</button>
        `;
        grid.appendChild(card);
    });

    // Add event listeners to new buttons
    const addButtons = document.querySelectorAll(".add-to-cart");
    addButtons.forEach(button => {
        button.addEventListener("click", () => {
            const product = button.dataset.product;
            const price = button.dataset.price;
            cart.push({ product, price });
            // Assume updateCartCount is in cart.js
            if(typeof updateCartCount === 'function') updateCartCount();
            alert(`${product} added to cart!`);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Initial Render
    renderProducts(products);

    // Search Functionality via Browser Prompt
    const searchIcon = document.getElementById("search-icon") || document.querySelector(".search");

    if (searchIcon) {
        searchIcon.addEventListener("click", () => {
            const query = prompt("Enter the product or category you are searching for:");
            if (query !== null) {
                const q = query.toLowerCase().trim();
                const filtered = products.filter(p => 
                    p.name.toLowerCase().includes(q) || 
                    p.category.toLowerCase().includes(q)
                );
                renderProducts(filtered);
                
                // Scroll to Best Sellers
                const bestSellersSection = document.querySelector(".best-sellers");
                if (bestSellersSection) {
                    bestSellersSection.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                // If user cancels, reset to all
                renderProducts(products);
            }
        });
    }
});
