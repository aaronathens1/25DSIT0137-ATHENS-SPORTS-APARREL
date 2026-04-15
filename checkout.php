<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - Athens Sports Apparel</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #050505;
            --surface: #151515;
            --border: rgba(255, 255, 255, 0.05);
            --brand-blue: #0070f3;
            --brand-orange: #ff5500;
            --text-main: #ffffff;
            --text-muted: #a1a1aa;
            --font-main: 'Montserrat', sans-serif;
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: var(--font-main);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
        }

        @media (max-width: 850px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }

        .header-title {
            text-align: center;
            margin-top: 50px;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h2 { margin-top: 0; color: var(--text-main); }
        h3 { border-bottom: 1px solid var(--border); padding-bottom: 10px; margin-bottom: 20px; }

        .form-section, .summary-section {
            background: var(--surface);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text-main);
            font-family: inherit;
            font-size: 1rem;
            transition: var(--transition);
            box-sizing: border-box;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: var(--brand-orange);
            background: rgba(255,255,255,0.05);
        }

        .payment-methods {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .payment-method {
            flex: 1;
            min-width: 120px;
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .payment-method.active {
            border-color: var(--brand-blue);
            background: rgba(0, 112, 243, 0.1);
            color: white;
        }

        .payment-details { display: none; padding: 20px; background: rgba(0,0,0,0.2); border-radius: 8px; border: 1px dashed var(--border); margin-bottom: 20px;}
        .payment-details.active { display: block; }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
            color: white;
            border: none;
            border-radius: 8px;
            font-family: var(--font-main);
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 85, 0, 0.4);
        }

        /* Summary styles */
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }
        
        .item-info { display: flex; align-items: center; gap: 15px; }
        .item-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; background: #222; }
        .item-name { font-weight: 700; margin-bottom: 4px; }
        .item-qty { color: var(--text-muted); font-size: 0.85rem; }
        .item-price { font-weight: 700; color: var(--brand-orange); }

        .summary-totals {
            margin-top: 20px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: var(--text-muted);
        }
        
        .total-row.grand-total {
            color: var(--text-main);
            font-size: 1.4rem;
            font-weight: 700;
            border-top: 1px solid var(--border);
            padding-top: 15px;
            margin-top: 15px;
        }

        /* Back to store */
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s;
        }
        .back-link:hover { color: var(--brand-blue); }
    </style>
</head>
<body>

    <h1 class="header-title">Secure Checkout</h1>

    <div class="checkout-container">
        
        <!-- Form Section -->
        <div class="form-section">
            <a href="index.php" class="back-link">&larr; Return to Store</a>
            
            <form id="checkout-form" action="process_checkout.php" method="POST">
                <!-- Hidden input to hold cart JSON -->
                <input type="hidden" name="cart_data" id="cart_data">
                
                <h3>1. Shipping Information</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="john@example.com">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" required placeholder="+1 234 567 8900">
                </div>
                
                <div class="form-group">
                    <label>Shipping Address</label>
                    <textarea name="address" rows="3" required placeholder="123 Main St, Appt 4B, City, Country"></textarea>
                </div>

                <h3 style="margin-top: 40px;">2. Payment Method</h3>
                <div class="payment-methods">
                    <div class="payment-method active" data-target="cc-details" data-value="credit_card" onclick="selectPayment(this)">
                        Credit / Debit Card
                    </div>
                    <div class="payment-method" data-target="mm-details" data-value="mobile_money" onclick="selectPayment(this)">
                        Mobile Money
                    </div>
                    <div class="payment-method" data-target="cod-details" data-value="cod" onclick="selectPayment(this)">
                        Cash on Delivery
                    </div>
                </div>

                <!-- We store the selected payment method here -->
                <input type="hidden" name="payment_method" id="payment_method" value="credit_card">

                <div id="cc-details" class="payment-details active">
                    <div class="form-group">
                        <label>Card Number</label>
                        <input type="text" placeholder="XXXX XXXX XXXX XXXX">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input type="text" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label>CVC</label>
                            <input type="text" placeholder="123">
                        </div>
                    </div>
                    <small style="color: var(--text-muted)">* This is a secure mock interface for display purposes.</small>
                </div>

                <div id="mm-details" class="payment-details">
                    <div class="form-group">
                        <label>Mobile Provider</label>
                        <select>
                            <option>MTN Mobile Money</option>
                            <option>Airtel Money</option>
                            <option>M-Pesa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number for Payment</label>
                        <input type="text" placeholder="e.g. 077X XXX XXX">
                    </div>
                    <small style="color: var(--text-muted)">* You will receive a prompt on your phone to complete the transaction.</small>
                </div>

                <div id="cod-details" class="payment-details">
                    <p style="color: var(--text-muted); margin: 0;">You will pay in cash or via point-of-sale when your order is delivered to your address.</p>
                </div>

                <button type="submit" class="btn-submit">Complete Purchase</button>
            </form>
        </div>

        <!-- Order Summary Section -->
        <div class="summary-section">
            <h3>Order Summary</h3>
            <div id="summary-items">
                <!-- Javascript will populate this -->
            </div>
            
            <div class="summary-totals">
                <div class="total-row">
                    <span>Subtotal</span>
                    <span id="summary-subtotal">$0.00</span>
                </div>
                <div class="total-row">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="total-row grand-total">
                    <span>Total</span>
                    <span id="summary-total">$0.00</span>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Load Cart Data
        const cart = JSON.parse(localStorage.getItem('athens_cart')) || [];
        
        if (cart.length === 0) {
            alert('Your cart is empty. Returning to store.');
            window.location.href = 'index.php';
        }

        // Put cart into hidden input so PHP gets it on submit
        document.getElementById('cart_data').value = JSON.stringify(cart);

        // Render Summary
        const summaryContainer = document.getElementById('summary-items');
        let total = 0;

        cart.forEach(item => {
            const price = parseFloat(item.price) || 0;
            const qty = parseInt(item.quantity) || 1;
            total += price * qty;
            
            const div = document.createElement('div');
            div.className = 'cart-item';
            
            const imageHtml = item.image ? 
                `<img src="${item.image}" class="item-img" onerror="this.src='https://via.placeholder.com/60/222/fff?text=No+Img'">` : 
                `<div class="item-img" style="display:flex;align-items:center;justify-content:center;font-size:1.5rem">🛍️</div>`;

            div.innerHTML = `
                <div class="item-info">
                    ${imageHtml}
                    <div>
                        <div class="item-name">${item.product || item.name}</div>
                        <div class="item-qty">Qty: ${qty}</div>
                    </div>
                </div>
                <div class="item-price">$${(price * qty).toFixed(2)}</div>
            `;
            summaryContainer.appendChild(div);
        });

        document.getElementById('summary-subtotal').textContent = '$' + total.toFixed(2);
        document.getElementById('summary-total').textContent = '$' + total.toFixed(2);

        // Payment Method Toggles
        window.selectPayment = function(el) {
            // Remove active from all tabs
            document.querySelectorAll('.payment-method').forEach(btn => btn.classList.remove('active'));
            // Hide all details
            document.querySelectorAll('.payment-details').forEach(div => div.classList.remove('active'));
            
            // Set active click
            el.classList.add('active');
            const targetId = el.getAttribute('data-target');
            document.getElementById(targetId).classList.add('active');
            
            // Update hidden value
            document.getElementById('payment_method').value = el.getAttribute('data-value');
        };

        // Form Submit interception
        document.getElementById('checkout-form').addEventListener('submit', function() {
            // Optional: You could show a loader here
            document.querySelector('.btn-submit').textContent = 'Processing...';
        });

    </script>
</body>
</html>
