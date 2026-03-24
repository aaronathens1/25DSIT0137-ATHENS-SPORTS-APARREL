import json
import random

file_path = "c:\\xampp1\\htdocs\\athens\\products.js"
with open(file_path, "r", encoding="utf-8") as f:
    content = f.read().strip()

prefix = "const products = "
suffix = ";"

if content.endswith(suffix):
    content = content[:-1]

json_str = content[content.find(prefix) + len(prefix):]
products = json.loads(json_str)

def get_realistic_price(name):
    name_lower = name.lower()
    
    # High tier equipment
    if any(k in name_lower for k in ["robot server", "table", "board"]):
        return random.randint(150, 600)
    if any(k in name_lower for k in ["watch", "rangefinder", "bike"]):
        return random.randint(150, 400)
    if any(k in name_lower for k in ["scoreboard", "net", "hoop system"]):
        return random.randint(50, 300)
    if any(k in name_lower for k in ["helmet", "headgear", "bat", "racket", "paddle", "stick", "skis"]):
        return random.randint(50, 250)
    if any(k in name_lower for k in ["shoes", "cleats", "boots", "skates"]):
        return random.randint(60, 180)
    
    # Mid tier equipment
    if any(k in name_lower for k in ["bag", "case", "backpack", "duffel"]):
        return random.randint(30, 100)
    if any(k in name_lower for k in ["shirt", "jersey", "shorts", "pants", "windbreaker", "base layer", "wetsuit", "jacket", "swimsuit"]):
        return random.randint(25, 80)
    if any(k in name_lower for k in ["glove", "mitts"]):
        return random.randint(20, 80)
    if any(k in name_lower for k in ["pads", "guards", "protector", "helmet", "belt"]):
        return random.randint(15, 60)
        
    # Low tier equipment
    if any(k in name_lower for k in ["ball", "puck", "shuttlecocks", "tees", "studs"]):
        return random.randint(10, 35)
    if any(k in name_lower for k in ["socks", "headband", "sweatband", "wristbands", "towel", "bottle", "pump", "whistle"]):
        return random.randint(8, 25)
    if any(k in name_lower for k in ["grip", "tape", "wax", "lube", "sunscreen", "cleaner", "clip", "plugs", "dampener", "lube"]):
        return random.randint(5, 15)

    # Fallback default
    return random.randint(20, 100)

random.seed(123) # for some reproducibility
updated_count = 0
for p in products:
    old_price = p.get('price', 0)
    new_price = get_realistic_price(p['name'])
    p['price'] = new_price
    updated_count += 1

js_content = prefix + json.dumps(products, indent=4) + suffix + "\n"

with open(file_path, "w", encoding="utf-8") as f:
    f.write(js_content)

print(f"Successfully updated prices for {updated_count} products.")
