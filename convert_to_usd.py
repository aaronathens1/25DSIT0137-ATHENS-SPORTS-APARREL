import json
import re
import math

with open('products.js', 'r', encoding='utf-8') as f:
    content = f.read()

# Extract json
prefix = "const products = "
start_idx = content.find(prefix) + len(prefix)
end_idx = content.rfind(";")
json_str = content[start_idx:end_idx].strip()

products = json.loads(json_str)

for p in products:
    # convert to usd
    usd = round(p['price'] / 3800)
    p['price'] = usd

new_content = prefix + json.dumps(products, indent=4) + ";\n"
with open('products.js', 'w', encoding='utf-8') as f:
    f.write(new_content)

# Now Let's map Dashboard items to products
# Let's read dashboard.php
with open('dashboard.php', 'r', encoding='utf-8') as f:
    dash = f.read()

# Simple print out just to inspect
from collections import defaultdict
cat_prods = defaultdict(list)
for p in products:
    cat_prods[p['category']].append(p)

for cat in cat_prods:
    print(f"Category: {cat}")
    for p in cat_prods[cat]:
        print(f"  {p['name']} - ${p['price']}")

