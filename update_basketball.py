import json

file_path = "c:\\xampp1\\htdocs\\athens\\products.js"
with open(file_path, "r", encoding="utf-8") as f:
    content = f.read().strip()

prefix = "const products = "
suffix = ";"

if content.endswith(suffix):
    content = content[:-1]

json_str = content[content.find(prefix) + len(prefix):]
products = json.loads(json_str)

# Filter out old basketball items
new_products = [p for p in products if p.get("category") != "Basketball"]

# Find max ID
max_id = max([p.get("id", 0) for p in new_products], default=0)

new_basketball_items = [
    {"name": "Indoor/Outdoor Basketball", "price": 35.00, "image": "basketball.jpg"},
    {"name": "Professional Basketball Shoes", "price": 120.00, "image": "basketball_shoes.jpg"},
    {"name": "Breathable Mesh Shorts", "price": 25.00, "image": "basketball.jpg"},
    {"name": "Reversible Practice Jersey", "price": 30.00, "image": "authentic_jersey.jpg"},
    {"name": "Compression Arm Sleeve", "price": 15.00, "image": "basketball.jpg"},
    {"name": "Protective Knee Pad Sleeve", "price": 22.00, "image": "basketball.jpg"},
    {"name": "Moisture Wicking Headband", "price": 12.00, "image": "basketball.jpg"},
    {"name": "Cushioned Crew Socks", "price": 14.00, "image": "basketball.jpg"},
    {"name": "Spacious Gym Duffel Bag", "price": 45.00, "image": "gym.jpg"},
    {"name": "Insulated Water Bottle", "price": 20.00, "image": "basketball.jpg"},
    {"name": "Microfiber Sweat Towel", "price": 10.00, "image": "basketball.jpg"},
    {"name": "Dual-Action Air Pump", "price": 18.00, "image": "basketball.jpg"},
    {"name": "Referee Tactics Whistle", "price": 8.00, "image": "basketball.jpg"},
    {"name": "Dry-Erase Coaches Board", "price": 25.00, "image": "basketball.jpg"},
    {"name": "Over-the-Door Mini Hoop", "price": 40.00, "image": "basketball.jpg"}
]

for item in new_basketball_items:
    max_id += 1
    new_products.append({
        "id": max_id,
        "name": item["name"],
        "category": "Basketball",
        "price": item["price"],
        "image": item["image"],
        "description": f"Experience unmatched quality with this {item['name'].lower()}. Ideal for basketball enthusiasts."
    })

js_content = prefix + json.dumps(new_products, indent=4) + suffix + "\n"

with open(file_path, "w", encoding="utf-8") as f:
    f.write(js_content)

print(f"Added {len(new_basketball_items)} common basketball items.")
