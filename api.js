// Display products in best sellers
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById("best-sellers-grid");
    if (!grid) return;
    
    // products is loaded globally from data/products.js
    products.forEach(prod => {
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
            updateCartCount();
            alert(`${product} added to cart!`);
        });
    });
});
