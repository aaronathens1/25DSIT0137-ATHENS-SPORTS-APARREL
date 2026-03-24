import json

file_path = r"c:\xampp1\htdocs\athens\products.js"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

prefix = "const products = "
suffix = ";"

content_trimmed = content.strip()
if content_trimmed.endswith(suffix):
    content_trimmed = content_trimmed[:-1]

try:
    json_str = content_trimmed[content_trimmed.find(prefix) + len(prefix):]
    products = json.loads(json_str)
except Exception as e:
    print(f"Error parsing JSON: {e}")
    exit(1)

category_counts = {}
filtered_products = []

for p in products:
    cat = p.get("category", "Unknown")
    if cat not in category_counts:
        category_counts[cat] = 0
    
    if category_counts[cat] < 15:
        filtered_products.append(p)
        category_counts[cat] += 1

js_content = prefix + json.dumps(filtered_products, indent=4) + suffix + "\n"

with open(file_path, "w", encoding="utf-8") as f:
    f.write(js_content)

print(f"Successfully reduced products from {len(products)} to {len(filtered_products)}.")
