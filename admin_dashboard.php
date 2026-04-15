<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
        session_unset();
        session_destroy();
        header("Location: admin_login.php?timeout=1");
        exit();
    }
    $_SESSION['LAST_ACTIVITY'] = time();
}

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Athens Sports Apparel</title>
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
        }

        /* HEADER */
        header {
          position: fixed; top: 0; left: 0; width: 100%; height: var(--header-height);
          display: flex; justify-content: space-between; align-items: center;
          padding: 0 5%; background: rgba(5, 5, 5, 0.8);
          backdrop-filter: blur(12px); z-index: 1000;
          border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .logo-container { display: flex; align-items: center; gap: 12px; }
        .logo-img { width: 35px; height: 35px; }
        .logo-text { font-family: 'Montserrat', sans-serif; font-size: 1.4rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
          background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        nav ul { display: flex; list-style: none; gap: 2rem; }
        nav a { text-decoration: none; color: var(--text-main); font-weight: 500; transition: var(--transition); }
        nav a:hover { color: var(--brand-orange); }

        /* DASHBOARD CONTENT */
        .dashboard-container {
            padding: 100px 5% 5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .dashboard-header h1 {
            font-size: 2.2rem;
            color: var(--brand-orange);
        }

        .btn {
            padding: 0.8rem 1.5rem;
            background: var(--brand-blue);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
        }
        .btn:hover {
            background: #005ce6;
            box-shadow: 0 4px 15px rgba(0, 112, 243, 0.4);
            transform: translateY(-2px);
        }
        .btn-danger {
            background: #ff3333;
        }
        .btn-danger:hover {
            background: #cc0000;
            box-shadow: 0 4px 15px rgba(255, 51, 51, 0.4);
        }

        /* TABLE */
        .table-wrapper {
            background: var(--surface-color);
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.05);
            overflow-x: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        th {
            background: rgba(255,255,255,0.02);
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        tr:hover {
            background: var(--surface-hover);
        }

        td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        .btn-small {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        /* MODAL */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: var(--surface-color);
            padding: 2.5rem;
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255,255,255,0.1);
            position: relative;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }

        .modal-content h2 {
            margin-bottom: 1.5rem;
            color: var(--brand-orange);
        }

        .close-modal {
            position: absolute;
            top: 20px; right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition);
        }
        .close-modal:hover { color: white; }

        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: var(--text-muted); font-size: 0.9rem;}
        .form-group input, .form-group textarea {
            width: 100%; padding: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px; color: var(--text-main);
            font-family: inherit;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none; border-color: var(--brand-orange);
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-container" onclick="window.location.href='dashboard.php'" style="cursor:pointer">
            <img src="logo.svg" alt="Athens Logo" class="logo-img">
            <div class="logo-text">Athens Admin</div>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php" target="_blank">View Store</a></li>
                <li><a href="?logout=1" style="color: var(--brand-orange)">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Product Management</h1>
            <button class="btn" onclick="openModal('add')">+ Add New Product</button>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="products-tbody">
                    <tr><td colspan="6" style="text-align:center">Loading products...</td></tr>
                </tbody>
            </table>
        </div>

        <div class="dashboard-header" style="margin-top: 4rem;">
            <h1>Recent Orders</h1>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="orders-tbody">
                    <tr><td colspan="7" style="text-align:center">Loading orders...</td></tr>
                </tbody>
            </table>
        </div>

        <div class="dashboard-header" style="margin-top: 4rem;">
            <h1>Customer Messages</h1>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="messages-tbody">
                    <tr><td colspan="5" style="text-align:center">Loading messages...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal-overlay" id="productFormModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Add Product</h2>
            <form id="productForm" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="productId">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" id="productName" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" id="productCategory" required>
                </div>
                <div class="form-group">
                    <label>Price ($)</label>
                    <input type="number" step="0.01" id="productPrice" required>
                </div>
                <div class="form-group">
                    <label>Image Filename / URL</label>
                    <input type="text" id="productImage" placeholder="e.g. basketball.jpg" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="productDesc" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Save Product</button>
            </form>
        </div>
    </div>

    <script>
        let productsData = [];
        let messagesData = [];
        let ordersData = [];
        let currentAction = 'add'; // 'add' or 'edit'

        // Fetch products on load
        async function fetchProducts() {
            try {
                const res = await fetch('admin_api.php');
                productsData = await res.json();
                renderTable();
            } catch (err) {
                alert("Failed to load products: " + err.message);
            }
        }

        function renderTable() {
            const tbody = document.getElementById('products-tbody');
            tbody.innerHTML = '';
            
            if (!productsData || productsData.length === 0 || productsData.error) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align:center">No products found.</td></tr>';
                return;
            }

            // Sort by ID descending so newest are on top
            const sorted = [...productsData].sort((a,b) => b.id - a.id);

            sorted.forEach(p => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${p.id}</td>
                    <td><img src="${p.image}" alt="${p.name}" onerror="this.src='https://via.placeholder.com/50/333/fff?text=N/A'"></td>
                    <td><strong>${p.name}</strong></td>
                    <td>${p.category}</td>
                    <td>$${parseFloat(p.price).toFixed(2)}</td>
                    <td class="action-btns">
                        <button class="btn btn-small" onclick='openModal("edit", ${JSON.stringify(p).replace(/'/g, "&#39;")})'>Edit</button>
                        <button class="btn btn-small btn-danger" onclick="deleteProduct(${p.id})">Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function openModal(action, product = null) {
            currentAction = action;
            const modal = document.getElementById('productFormModal');
            const title = document.getElementById('modalTitle');
            
            if (action === 'add') {
                title.textContent = 'Add New Product';
                document.getElementById('productForm').reset();
                document.getElementById('productId').value = '';
            } else if (action === 'edit' && product) {
                title.textContent = 'Edit Product';
                document.getElementById('productId').value = product.id;
                document.getElementById('productName').value = product.name;
                document.getElementById('productCategory').value = product.category;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productImage').value = product.image;
                document.getElementById('productDesc').value = product.description || '';
            }
            
            modal.classList.add('active');
        }

        function closeModal() {
            document.getElementById('productFormModal').classList.remove('active');
        }

        async function handleFormSubmit(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.textContent;
            btn.textContent = 'Saving...';
            btn.disabled = true;

            const productObj = {
                name: document.getElementById('productName').value,
                category: document.getElementById('productCategory').value,
                price: parseFloat(document.getElementById('productPrice').value),
                image: document.getElementById('productImage').value,
                description: document.getElementById('productDesc').value,
            };

            if (currentAction === 'edit') {
                productObj.id = parseInt(document.getElementById('productId').value);
            }

            try {
                const res = await fetch('admin_api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: currentAction, product: productObj })
                });
                
                const result = await res.json();
                if (result.success) {
                    closeModal();
                    await fetchProducts(); // Refresh list
                } else {
                    alert("Error: " + (result.error || "Failed to save"));
                }
            } catch (err) {
                alert("Request Failed: " + err.message);
            } finally {
                btn.textContent = originalText;
                btn.disabled = false;
            }
        }

        async function deleteProduct(id) {
            if (!confirm(`Are you sure you want to delete product ID ${id}? This cannot be undone.`)) return;
            
            try {
                const res = await fetch('admin_api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'delete', id: id })
                });
                const result = await res.json();
                if (result.success) {
                    await fetchProducts();
                } else {
                    alert("Error: " + (result.error || "Failed to delete"));
                }
            } catch (err) {
                alert("Request Failed: " + err.message);
            }
        }

        async function fetchMessages() {
            try {
                const res = await fetch('admin_api_messages.php');
                messagesData = await res.json();
                renderMessagesTable();
            } catch (err) {
                console.error("Failed to load messages", err);
            }
        }

        function renderMessagesTable() {
            const tbody = document.getElementById('messages-tbody');
            tbody.innerHTML = '';
            
            if (!messagesData || messagesData.length === 0 || messagesData.error) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align:center">No messages found.</td></tr>';
                return;
            }

            messagesData.forEach(m => {
                const tr = document.createElement('tr');
                const safeName = m.name.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                const safeEmail = m.email.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                const safeMessage = m.message.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                const safeDate = new Date(m.created_at).toLocaleString();
                
                tr.innerHTML = `
                    <td>${safeDate}</td>
                    <td><strong>${safeName}</strong></td>
                    <td><a href="mailto:${safeEmail}" style="color:var(--brand-blue)">${safeEmail}</a></td>
                    <td style="max-width: 400px; white-space: pre-wrap;">${safeMessage}</td>
                    <td class="action-btns">
                        <button class="btn btn-small" style="background:#0070f3" onclick="replyToMessage('${safeEmail}')">Reply</button>
                        <button class="btn btn-small btn-danger" onclick="deleteMessage(${m.id})">Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        async function deleteMessage(id) {
            if (!confirm(`Are you sure you want to delete this message?`)) return;
            try {
                const res = await fetch('admin_api_messages.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'delete', id: id })
                });
                const result = await res.json();
                if (result.success) {
                    await fetchMessages();
                } else {
                    alert("Error: " + (result.error || "Failed to delete"));
                }
            } catch (err) {
                alert("Request Failed: " + err.message);
            }
        }
        function replyToMessage(email) {
            const replyText = prompt("Draft your reply to " + email + ":");
            if (replyText) {
                const subject = encodeURIComponent("Reply from Athens Sports Apparel");
                const body = encodeURIComponent(replyText);
                window.location.href = `mailto:${email}?subject=${subject}&body=${body}`;
            }
        }

        async function fetchOrders() {
            try {
                const res = await fetch('admin_api_orders.php');
                ordersData = await res.json();
                renderOrdersTable();
            } catch (err) {
                console.error("Failed to load orders", err);
            }
        }

        function renderOrdersTable() {
            const tbody = document.getElementById('orders-tbody');
            tbody.innerHTML = '';
            
            if (!ordersData || ordersData.length === 0 || ordersData.error) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align:center">No orders found.</td></tr>';
                return;
            }

            ordersData.forEach(o => {
                const tr = document.createElement('tr');
                const badgeColor = o.status === 'Completed' ? '#28a745' : (o.status === 'Pending' ? '#ffc107' : '#17a2b8');
                
                tr.innerHTML = `
                    <td>#${o.id}</td>
                    <td>${new Date(o.created_at).toLocaleString()}</td>
                    <td>
                        <strong>${o.full_name}</strong><br>
                        <small style="color:var(--text-muted)">${o.email} | ${o.phone}</small>
                    </td>
                    <td style="color:var(--brand-orange); font-weight:bold">$${Number(o.total_amount || 0).toFixed(2)}</td>
                    <td style="text-transform: capitalize;">${(o.payment_method || 'Unknown').replace('_', ' ')}</td>
                    <td><span style="background:${badgeColor}; color:black; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem; font-weight:bold;">${o.status}</span></td>
                    <td class="action-btns">
                        <button class="btn btn-small" style="background:#0070f3" onclick="viewOrderDetails(${o.id})">View Items</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function viewOrderDetails(orderId) {
            const order = ordersData.find(o => o.id === orderId);
            if(!order) return;
            let itemList = order.items && order.items.length ? order.items.map(i => i.quantity + "x " + (i.product_name || "Item") + " @ $" + Number(i.price || 0).toFixed(2)).join("\\n") : "No items found.";
            
            alert("Order #" + order.id + " Items:\n\n" + itemList + "\n\nShipping Address:\n" + order.address);
        }

        // Init
        fetchProducts();
        fetchMessages();
        fetchOrders();
    </script>
</body>
</html>
