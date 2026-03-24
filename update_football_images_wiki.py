import json
import re
import urllib.request
import urllib.parse
import time

def get_wiki_image(title):
    try:
        url = f"https://en.wikipedia.org/w/api.php?action=query&titles={urllib.parse.quote(title)}&prop=pageimages&format=json&pithumbsize=400"
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as response:
            data = json.loads(response.read().decode())
            pages = data['query']['pages']
            for page_id in pages:
                if 'thumbnail' in pages[page_id]:
                    return pages[page_id]['thumbnail']['source']
    except Exception as e:
        print(f"Failed to fetch {title}: {e}")
    return "football.jpg"

mappings = {
    "Match Ball": "ball_gen.png",
    "Gloves": "gloves_gen.png",
    "Jersey": "authentic_jersey.jpg",
    "Cleats": get_wiki_image("Cleat_(shoe)"),
    "Shoulder Pads": get_wiki_image("Shoulder_pads_(American_football)"),
    "Rib Protector": get_wiki_image("Flak_jacket"),
    "Kicking Tee": get_wiki_image("Tee_(sports)"),
    "Helmet": get_wiki_image("Football_helmet"),
    "Knee Pads": get_wiki_image("Knee_pad"),
    "Training Pants": get_wiki_image("Sweatpants")
}

with open('products.js', 'r', encoding='utf-8') as f:
    content = f.read()

json_str = content[content.find('['):content.rfind(']')+1]
products = json.loads(json_str)

updated_count = 0
for p in products:
    if p['category'] == 'Football':
        for key, img in mappings.items():
            if key.lower() in p['name'].lower():
                p['image'] = img
                updated_count += 1
                break

new_content = "const products = " + json.dumps(products, indent=4) + ";\n"
with open('products.js', 'w', encoding='utf-8') as f:
    f.write(new_content)

print(f"Successfully updated {updated_count} football products with accurate images.")
