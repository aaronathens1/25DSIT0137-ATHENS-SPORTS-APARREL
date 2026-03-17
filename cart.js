// Cart state management
let cart = JSON.parse(localStorage.getItem('athens_cart')) || [];

function updateCartCount() {
    const countElement = document.getElementById('cart-count');
    if (countElement) {
        countElement.textContent = cart.length;
        
        // Add a small animation effect
        countElement.style.transform = 'scale(1.5)';
        setTimeout(() => {
            countElement.style.transform = 'scale(1)';
        }, 200);
    }
    
    // Save to local storage
    localStorage.setItem('athens_cart', JSON.stringify(cart));
}

// Initialize cart count on load
document.addEventListener('DOMContentLoaded', updateCartCount);
