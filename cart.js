// Cart state management
let cart = JSON.parse(localStorage.getItem('athens_cart')) || [];

function updateCartCount() {
    const countElement = document.getElementById('cart-count');
    // Compute total quantity
    let totalQty = 0;
    cart.forEach(item => {
        totalQty += (item.quantity || 1);
    });

    if (countElement) {
        countElement.textContent = totalQty;
        
        // Add a small animation effect
        countElement.style.transform = 'scale(1.5)';
        setTimeout(() => {
            countElement.style.transform = 'scale(1)';
        }, 200);
    }
    
    // Save to local storage
    localStorage.setItem('athens_cart', JSON.stringify(cart));
}

// Global addToCart function
window.addToCartGlobal = function(product, price, image = null) {
    let existingItem = cart.find(i => (i.product || i.name) === product);
    if (existingItem) {
        existingItem.quantity = (existingItem.quantity || 1) + 1;
        // Optionally update the image if the old one was missing
        if (!existingItem.image && image) {
            existingItem.image = image;
        }
    } else {
        cart.push({ product, price, image, quantity: 1 });
    }
    updateCartCount();
    if(typeof window.openCart === 'function') {
        window.openCart();
    }
};

document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();
    
    // Inject custom font for the modal if not present
    if (!document.getElementById('cart-fonts')) {
        const fontLink = document.createElement('link');
        fontLink.id = 'cart-fonts';
        fontLink.rel = 'stylesheet';
        fontLink.href = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap';
        document.head.appendChild(fontLink);
    }
    
    // Create cart modal structure
    const cartModal = document.createElement('div');
    cartModal.id = 'cart-modal';
    cartModal.style.cssText = `
        position: fixed; top: 0; right: -450px; width: 450px; max-width: 100%; height: 100vh;
        background: #0f0f11; border-left: 1px solid rgba(255,255,255,0.05);
        z-index: 2000; transition: right 0.4s cubic-bezier(0.25, 1, 0.5, 1); display: flex; flex-direction: column;
        box-shadow: -10px 0 40px rgba(0,0,0,0.8); font-family: 'Montserrat', sans-serif; color: white;
    `;
    
    cartModal.innerHTML = `
        <div style="padding: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center; background: #050505;">
            <h2 style="margin: 0; font-size: 1.5rem; letter-spacing: 1px; text-transform: uppercase;">Your Cart</h2>
            <button id="close-cart" style="background: none; border: none; color: #a1a1aa; font-size: 2rem; cursor: pointer; line-height: 1; transition: color 0.3s; padding: 0;">&times;</button>
        </div>
        <div id="cart-items" style="flex: 1; overflow-y: auto; padding: 25px; display: flex; flex-direction: column; gap: 15px;"></div>
        <div style="padding: 25px; border-top: 1px solid rgba(255,255,255,0.05); background: #050505;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px; font-weight: 700; font-size: 1.3rem;">
                <span style="color: #a1a1aa;">Total:</span>
                <span id="cart-total" style="color: #ff5500;">$0.00</span>
            </div>
            <button id="checkout-btn" style="width: 100%; padding: 16px; background: linear-gradient(45deg, #0070f3, #ff5500); color: white; border: none; font-weight: 700; font-size: 1.1rem; text-transform: uppercase; border-radius: 8px; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;">Secure Checkout</button>
        </div>
    `;
    
    document.body.appendChild(cartModal);
    
    // Add hover effect to checkout button
    const checkoutBtn = document.getElementById('checkout-btn');
    checkoutBtn.onmouseover = () => { checkoutBtn.style.transform = 'translateY(-2px)'; checkoutBtn.style.boxShadow = '0 6px 20px rgba(255,85,0,0.4)'; };
    checkoutBtn.onmouseout = () => { checkoutBtn.style.transform = 'translateY(0)'; checkoutBtn.style.boxShadow = 'none'; };
    
    // Overlay
    const overlay = document.createElement('div');
    overlay.id = 'cart-overlay';
    overlay.style.cssText = `
        position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
        background: rgba(0,0,0,0.6); z-index: 1999; display: none; backdrop-filter: blur(4px);
        opacity: 0; transition: opacity 0.4s ease;
    `;
    document.body.appendChild(overlay);
    
    // Wire up open/close events
    const cartIcons = document.querySelectorAll('.cart');
    cartIcons.forEach(icon => {
        icon.style.cursor = 'pointer';
        icon.addEventListener('click', window.openCart);
    });
    
    const closeBtn = document.getElementById('close-cart');
    closeBtn.addEventListener('click', window.closeCart);
    closeBtn.onmouseover = () => closeBtn.style.color = '#ff5500';
    closeBtn.onmouseout = () => closeBtn.style.color = '#a1a1aa';
    overlay.addEventListener('click', window.closeCart);
});

window.openCart = function() {
    const modal = document.getElementById('cart-modal');
    const overlay = document.getElementById('cart-overlay');
    if(modal && overlay) {
        modal.style.right = '0';
        overlay.style.display = 'block';
        // Trigger reflow
        void overlay.offsetWidth;
        overlay.style.opacity = '1';
        window.renderCartItems();
    }
}

window.closeCart = function() {
    const modal = document.getElementById('cart-modal');
    const overlay = document.getElementById('cart-overlay');
    if(modal && overlay) {
        modal.style.right = '-450px';
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 400);
    }
}

window.renderCartItems = function() {
    const container = document.getElementById('cart-items');
    const totalEl = document.getElementById('cart-total');
    if(!container) return;
    
    if (cart.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; color: #a1a1aa; margin-top: 50px; display: flex; flex-direction: column; align-items: center;">
                <span style="font-size: 4rem; margin-bottom: 20px;">🛍️</span>
                <p style="font-size: 1.1rem;">Your cart is empty.</p>
                <button onclick="closeCart()" style="margin-top: 20px; padding: 10px 20px; background: transparent; border: 1px solid #ff5500; color: #ff5500; border-radius: 6px; cursor: pointer; transition: background 0.2s;">Continue Shopping</button>
            </div>
        `;
        totalEl.textContent = '$0.00';
        return;
    }
    
    let html = '';
    let total = 0;
    
    cart.forEach((item, index) => {
        let price = parseFloat(item.price) || 0;
        let qty = item.quantity || 1;
        total += price * qty;
        
        let imageSrc = item.image ? 
            `<img src="${item.image}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px; margin-right: 15px; border: 1px solid rgba(255,255,255,0.05);">` : 
            `<div style="width: 70px; height: 70px; background: #222; border-radius: 8px; margin-right: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; border: 1px solid rgba(255,255,255,0.05);">🛍️</div>`;
        
        html += `
            <div style="display: flex; align-items: center; background: #151515; padding: 15px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.02); transition: transform 0.2s;">
                ${imageSrc}
                <div style="flex: 1; padding-right: 10px;">
                    <div style="font-weight: 700; font-size: 0.95rem; margin-bottom: 5px; line-height: 1.3;">${item.product || item.name}</div>
                    <div style="color: #ff5500; font-weight: 700;">$${price.toFixed(2)}</div>
                </div>
                <div style="display: flex; align-items: center; background: #050505; border-radius: 6px; padding: 3px;">
                    <button onclick="updateQty(${index}, -1)" style="background: transparent; color: #a1a1aa; border: none; width: 28px; height: 28px; font-size: 1.1rem; cursor: pointer; transition: color 0.2s;">-</button>
                    <span style="font-weight: 700; width: 20px; text-align: center; font-size: 0.9rem;">${qty}</span>
                    <button onclick="updateQty(${index}, 1)" style="background: transparent; color: #a1a1aa; border: none; width: 28px; height: 28px; font-size: 1.1rem; cursor: pointer; transition: color 0.2s;">+</button>
                </div>
                <button onclick="removeFromCart(${index})" style="background: none; color: #ff3b30; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; margin-left: 10px; font-size: 1.2rem; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">&times;</button>
            </div>
        `;
    });
    
    container.innerHTML = html;
    totalEl.textContent = '$' + total.toFixed(2);
}

window.updateQty = function(index, change) {
    if (!cart[index].quantity) cart[index].quantity = 1;
    cart[index].quantity += change;
    
    if (cart[index].quantity <= 0) {
        removeFromCart(index);
    } else {
        updateCartCount();
        renderCartItems();
    }
}

window.removeFromCart = function(index) {
    cart.splice(index, 1);
    updateCartCount();
    if(typeof window.renderCartItems === 'function') {
        window.renderCartItems();
    }
}
