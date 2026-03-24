import json
import random

random.seed(42) # For reproducible output

categories = {
    "Football": ["Helmet", "Cleats", "Shoulder Pads", "Jersey", "Training Pants", "Gloves", "Mouthguard", "Knee Pads", "Match Ball", "Kicking Tee", "Rib Protector"],
    "Basketball": ["Hoop System", "Basketball", "High-Top Shoes", "Practice Jersey", "Shorts", "Arm Sleeve", "Headband", "Gym Bag", "Replacement Net", "Air Pump"],
    "Running": ["Running Shoes", "Athletic Shorts", "GPS Watch", "Hydration Bottle", "Sweatband", "Ankle Socks", "Sun Visor", "Windbreaker", "Phone Armband", "Reflective Vest"],
    "Gym": ["Hex Dumbbells", "Weight Bench", "Exercise Mat", "Kettlebell", "Resistance Bands", "Foam Roller", "Speed Jump Rope", "Lifting Belt", "Pull-up Bar", "Medicine Ball"],
    "Tennis": ["Tennis Racket", "Tennis Balls", "Court Shoes", "Grip Tape", "Racket Bag", "Wristbands", "Tennis Shorts", "Polo Shirt", "Vibration Dampener", "Ball Hopper"],
    "Baseball": ["Alloy Bat", "Leather Glove", "Baseballs", "Batting Gloves", "Metal Cleats", "Batting Helmet", "Catcher's Mitt", "Chest Protector", "Shin Guards", "Equipment Bag"],
    "Swimming": ["Swimsuit", "Anti-Fog Goggles", "Silicone Cap", "Kickboard", "Pull Buoy", "Training Fins", "Nose Clip", "Ear Plugs", "Microfiber Towel", "Waterproof Drybag"],
    "Volleyball": ["Volleyball", "Outdoor Net", "Knee Pads", "Indoor Shoes", "Spandex Shorts", "Arm Sleeves", "Team Jersey", "Ankle Braces", "Dual Action Pump", "Antenna Set"],
    "Golf": ["Club Set", "Distance Balls", "Wooden Tees", "Leather Glove", "Spiked Shoes", "Stand Bag", "Divot Tool", "Laser Rangefinder", "Wind Umbrella", "Golf Polo"],
    "Boxing": ["Training Gloves", "70lb Heavy Bag", "Elastic Hand Wraps", "Gel Mouthguard", "Sparring Headgear", "Speed Bag", "Focus Mitts", "Skipping Rope", "Boxing Shoes", "Freestanding Bag"],
    "Cycling": ["Road Bike", "Aero Helmet", "Padded Gloves", "Cycling Jersey", "Bib Shorts", "Floor Pump", "Bottle Cage", "LED Lights", "Chain Lube", "Saddle Bag"],
    "Rugby": ["Match Ball", "Soft Stud Boots", "Scrum Headgear", "Mouthguard", "Shoulder Pads", "Kicking Tee", "Striped Jersey", "Rugby Shorts", "Replacement Studs", "Tackle Bag"],
    "Cricket": ["Willow Bat", "Batting Pads", "Leather Ball", "Batting Gloves", "Protective Helmet", "Thigh Guard", "Abdomen Guard", "Wicket Keeper Gloves", "Wooden Stumps", "Spiked Shoes"],
    "Hockey": ["Composite Stick", "Vulcanized Puck", "Ice Skates", "Cage Helmet", "Shoulder Pads", "Shin Guards", "Hockey Gloves", "Elbow Pads", "Padded Pants", "Large Gear Bag"],
    "Table Tennis": ["Carbon Paddle", "Regulation Table", "3-Star Balls", "Replacement Net", "Paddle Case", "Table Cover", "Robot Server", "Digital Scoreboard", "Grip Shoes", "Rubber Cleaner"],
    "Badminton": ["Carbon Racket", "Feather Shuttlecocks", "Portable Net", "Court Shoes", "Overgrip", "Racket Bag", "Dry-Fit Jersey", "Athletic Shorts", "String Reel", "Wristbands"],
    "Surfing": ["Fiberglass Board", "Neoprene Wetsuit", "Board Wax", "Ankle Leash", "Traction Pad", "Rash Guard", "Travel Board Bag", "Replacement Fins", "Surfer Ear Plugs", "Zinc Sunscreen"],
    "Skateboarding": ["Maple Deck", "Alloy Trucks", "Polyurethane Wheels", "ABEC-9 Bearings", "Grip Tape", "Skate Helmet", "Knee Pads", "Elbow Pads", "Suede Skate Shoes", "Multi-Tool"],
    "Snowboarding": ["Freestyle Board", "Boa Boots", "Anti-Fog Goggles", "Strap Bindings", "Insulated Pants", "Winter Core Jacket", "Gore-Tex Gloves", "Snow Helmet", "Fleece Face Mask", "Padded Board Bag"],
    "Skiing": ["All-Mountain Skis", "Carbon Poles", "Ventilated Helmet", "Stiff Ski Boots", "Photochromic Goggles", "Thermal Ski Jacket", "Merino Base Layer", "Ski Gloves", "Waterproof Pants", "Wheeled Ski Bag"],
    "Yoga": ["Non-Slip Mat", "EVA Foam Blocks", "Cotton Strap", "Support Bolster", "Meditation Cushion", "Grip Socks", "High-Waist Pants", "Sports Bra", "Microfiber Towel", "Trigger Point Roller"],
    "Track and Field": ["Sprint Spikes", "Aluminum Block", "Relay Baton", "Iron Shot Put", "Rubber Discus", "Training Javelin", "High Jump Crossbar", "Training Hurdle", "Fiberglass Tape", "Compression Tights"],
    "Soccer (Football)": ["Match Ball", "Firm Ground Cleats", "Slip-In Shin Guards", "Goalie Gloves", "Replica Jersey", "Agility Cones", "Dual Action Pump", "Knee-High Socks", "Captain Armband", "Speed Ladder"]
}

adjectives = ["Pro", "Elite", "Premium", "Ultra", "Classic", "Hyper", "Vantage", "Signature", "Advanced", "Tournament", "Performance", "Essential"]
colors = ["Red", "Blue", "Black", "White", "Neon", "Silver", "Gold", "Green", "Yellow", "Orange", "Matte", "Glossy", "Carbon"]

products = []
id_counter = 1

for cat, items in categories.items():
    count = 0
    while count < 15:
        base_item = random.choice(items)
        adj = random.choice(adjectives)
        color = random.choice(colors)
        
        name = f"{adj} {color} {base_item}"
        
        # Ensure unique name within category
        if any(p['name'] == name for p in filter(lambda x: x['category'] == cat, products)):
            continue
            
        base_price = random.randint(10, 299)
        
        safe_cat = cat.lower().replace(' ', '_').replace('(', '').replace(')', '')
        safe_item = base_item.lower().replace(' ', '_').replace('-', '_')
        image_name = f"{safe_cat}_{safe_item}.jpg"
        
        products.append({
            "id": id_counter,
            "name": name,
            "category": cat,
            "price": base_price,
            "image": image_name,
            "description": f"Experience unmatched quality with this {color.lower()} {base_item.lower()}. Ideal for {cat.lower()} enthusiasts."
        })
        id_counter += 1
        count += 1

js_content = "const products = " + json.dumps(products, indent=4) + ";\n"

with open("products.js", "w") as f:
    f.write(js_content)

print(f"Successfully generated {len(products)} products across {len(categories)} categories.")
