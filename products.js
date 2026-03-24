const products = [
    {
        "id": 1,
        "name": "Classic Red Match Ball",
        "category": "Football",
        "price": 16,
        "image": "football.jpg",
        "description": "Experience unmatched quality with this red match ball. Ideal for football enthusiasts."
    },
    {
        "id": 2,
        "name": "Vantage Neon Gloves",
        "category": "Football",
        "price": 24,
        "image": "Vantageneongloves.jpeg",
        "description": "Experience unmatched quality with this neon gloves. Ideal for football enthusiasts."
    },
    {
        "id": 3,
        "name": "Classic Carbon Rib Protector",
        "category": "Football",
        "price": 25,
        "image": "Classic carbon rib.jpeg",
        "description": "Experience unmatched quality with this carbon rib protector. Ideal for football enthusiasts."
    },
    {
        "id": 4,
        "name": "Performance Yellow Kicking Tee",
        "category": "Football",
        "price": 65,
        "image": "yellow tee.jpg",
        "description": "Experience unmatched quality with this yellow kicking tee. Ideal for football enthusiasts."
    },
    {
        "id": 5,
        "name": "Ultra Black Helmet",
        "category": "Football",
        "price": 69,
        "image": "black hel.jpg",
        "description": "Experience unmatched quality with this black helmet. Ideal for football enthusiasts."
    },
    {
        "id": 6,
        "name": "Elite Blue Knee Pads",
        "category": "Football",
        "price": 15,
        "image": "blue.jpg",
        "description": "Experience unmatched quality with this blue knee pads. Ideal for football enthusiasts."
    },
    {
        "id": 7,
        "name": "Advanced Silver Knee Pads",
        "category": "Football",
        "price": 59,
        "image": "silver.jpg",
        "description": "Experience unmatched quality with this silver knee pads. Ideal for football enthusiasts."
    },
    {
        "id": 8,
        "name": "Premium Gold Match Ball",
        "category": "Football",
        "price": 23,
        "image": "gold.jpg",
        "description": "Experience unmatched quality with this gold match ball. Ideal for football enthusiasts."
    },
    {
        "id": 9,
        "name": "Ultra Orange Cleats",
        "category": "Football",
        "price": 179,
        "image": "orange.jpg",
        "description": "Experience unmatched quality with this orange cleats. Ideal for football enthusiasts."
    },
    {
        "id": 10,
        "name": "Essential Black Shoulder Pads",
        "category": "Football",
        "price": 17,
        "image": "black pads.jpg",
        "description": "Experience unmatched quality with this black shoulder pads. Ideal for football enthusiasts."
    },
    {
        "id": 11,
        "name": "Signature Glossy Helmet",
        "category": "Football",
        "price": 124,
        "image": "glossy.jpg",
        "description": "Experience unmatched quality with this glossy helmet. Ideal for football enthusiasts."
    },
    {
        "id": 12,
        "name": "Signature Silver Match Ball",
        "category": "Football",
        "price": 27,
        "image": "silver2.jpg",
        "description": "Experience unmatched quality with this silver match ball. Ideal for football enthusiasts."
    },
    {
        "id": 14,
        "name": "Premium Orange Shoulder Pads",
        "category": "Football",
        "price": 47,
        "image": "osp.jpg",
        "description": "Experience unmatched quality with this orange shoulder pads. Ideal for football enthusiasts."
    },
    {
        "id": 15,
        "name": "Ultra Green Rib Protector",
        "category": "Football",
        "price": 34,
        "image": "ugr.webp",
        "description": "Experience unmatched quality with this green rib protector. Ideal for football enthusiasts."
    },
    {
        "id": 61,
        "name": "Ultra Matte Windbreaker",
        "category": "Running",
        "price": 73,
        "image": "ultra.jpg",
        "description": "Experience unmatched quality with this matte windbreaker. Ideal for running enthusiasts."
    },
    {
        "id": 62,
        "name": "Phone Armband",
        "category": "Running",
        "price": 32,
        "image": "arm.jpg",
        "description": "Experience unmatched quality with this green phone armband. Ideal for running enthusiasts."
    },
    {
        "id": 63,
        "name": "Sweatband",
        "category": "Running",
        "price": 8,
        "image": "sweat.jpg",
        "description": "Experience unmatched quality with this neon sweatband. Ideal for running enthusiasts."
    },
    {
        "id": 64,
        "name": "Running Shoes",
        "category": "Running",
        "price": 176,
        "image": "running-shoes.jpg",
        "description": "Experience unmatched quality with this red running shoes. Ideal for running enthusiasts."
    },
    {
        "id": 67,
        "name": "GPS Watch",
        "category": "Running",
        "price": 375,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Samsung_Galaxy_Watch.jpg/500px-Samsung_Galaxy_Watch.jpg",
        "description": "Experience unmatched quality with this glossy gps watch. Ideal for running enthusiasts."
    },
    {
        "id": 73,
        "name": "Hydration Bottle",
        "category": "Running",
        "price": 18,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Multi-use_water_bottle.JPG/500px-Multi-use_water_bottle.JPG",
        "description": "Experience unmatched quality with this gold hydration bottle. Ideal for running enthusiasts."
    },
    {
        "id": 75,
        "name": "Ankle Socks",
        "category": "Running",
        "price": 24,
        "image": "socks.jpg",
        "description": "Experience unmatched quality with this black ankle socks. Ideal for running enthusiasts."
    },
    {
        "id": 91,
        "name": "Resistance Bands",
        "category": "Gym",
        "price": 39,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Trenirovachni_lastici_set.JPG/500px-Trenirovachni_lastici_set.JPG",
        "description": "Experience unmatched quality with this yellow resistance bands. Ideal for gym enthusiasts."
    },
    {
        "id": 92,
        "name": "Pull-up Bar",
        "category": "Gym",
        "price": 54,
        "image": "pull.jpg",
        "description": "Experience unmatched quality with this neon pull-up bar. Ideal for gym enthusiasts."
    },
    {
        "id": 93,
        "name": "Speed Jump Rope",
        "category": "Gym",
        "price": 47,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Ghanaian_kid_%28skipping_rope%29_06_%28cropped%29.jpg/500px-Ghanaian_kid_%28skipping_rope%29_06_%28cropped%29.jpg",
        "description": "Experience unmatched quality with this carbon speed jump rope. Ideal for gym enthusiasts."
    },
    {
        "id": 95,
        "name": "Exercise Mat",
        "category": "Gym",
        "price": 99,
        "image": "mat.jpg",
        "description": "Experience unmatched quality with this glossy exercise mat. Ideal for gym enthusiasts."
    },
    {
        "id": 99,
        "name": "Weight Bench",
        "category": "Gym",
        "price": 56,
        "image": "bench.jpg",
        "description": "Experience unmatched quality with this gold weight bench. Ideal for gym enthusiasts."
    },
    {
        "id": 101,
        "name": "Foam Roller",
        "category": "Gym",
        "price": 23,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Wa%C5%82ek_do_masa%C5%BCu3.jpg/500px-Wa%C5%82ek_do_masa%C5%BCu3.jpg",
        "description": "Experience unmatched quality with this glossy foam roller. Ideal for gym enthusiasts."
    },
    {
        "id": 102,
        "name": "Hex Dumbbells",
        "category": "Gym",
        "price": 38,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/TwoDumbbells.JPG/500px-TwoDumbbells.JPG",
        "description": "Experience unmatched quality with this glossy hex dumbbells. Ideal for gym enthusiasts."
    },
    {
        "id": 103,
        "name": "Adjustable Dumbbell Set",
        "category": "Gym",
        "price": 432,
        "image": "gym.jpg",
        "description": "Experience unmatched quality with this adjustable dumbbell set. Ideal for gym enthusiasts."
    },
    {
        "id": 104,
        "name": "Cast Iron Kettlebell",
        "category": "Gym",
        "price": 65,
        "image": "iron.jpg",
        "description": "Experience unmatched quality with this cast iron kettlebell. Ideal for gym enthusiasts."
    },
    {
        "id": 105,
        "name": "Olympic Barbell",
        "category": "Gym",
        "price": 56,
        "image": "oly.jpg",
        "description": "Experience unmatched quality with this olympic barbell. Ideal for gym enthusiasts."
    },
    {
        "id": 106,
        "name": "Bumper Weight Plates Set",
        "category": "Gym",
        "price": 84,
        "image": "weight.jpg",
        "description": "Experience unmatched quality with this bumper weight plates set. Ideal for gym enthusiasts."
    },
    {
        "id": 121,
        "name": "Polo Shirt",
        "category": "Tennis",
        "price": 56,
        "image": "polo.jpg",
        "description": "Experience unmatched quality with this orange polo shirt. Ideal for tennis enthusiasts."
    },
    {
        "id": 122,
        "name": "Tennis Racket",
        "category": "Tennis",
        "price": 216,
        "image": "rack.jpg",
        "description": "Experience unmatched quality with this gold tennis racket. Ideal for tennis enthusiasts."
    },
    {
        "id": 123,
        "name": "Tennis Shorts",
        "category": "Tennis",
        "price": 59,
        "image": "short.jpg",
        "description": "Experience unmatched quality with this carbon tennis shorts. Ideal for tennis enthusiasts."
    },
    {
        "id": 124,
        "name": "Wristbands",
        "category": "Tennis",
        "price": 18,
        "image": "wrist.jpg",
        "description": "Experience unmatched quality with this black wristbands. Ideal for tennis enthusiasts."
    },
    {
        "id": 127,
        "name": "Vibration Dampener",
        "category": "Tennis",
        "price": 8,
        "image": "damp.jpg",
        "description": "Experience unmatched quality with this glossy vibration dampener. Ideal for tennis enthusiasts."
    },
    {
        "id": 128,
        "name": "Court Shoes",
        "category": "Tennis",
        "price": 93,
        "image": "shoe.jpg",
        "description": "Experience unmatched quality with this red court shoes. Ideal for tennis enthusiasts."
    },
    {
        "id": 129,
        "name": "Ball Hopper",
        "category": "Tennis",
        "price": 28,
        "image": "whoo.jpg",
        "description": "Experience unmatched quality with this white ball hopper. Ideal for tennis enthusiasts."
    },
    {
        "id": 135,
        "name": "Grip Tape",
        "category": "Tennis",
        "price": 8,
        "image": "grip.jpg",
        "description": "Experience unmatched quality with this gold grip tape. Ideal for tennis enthusiasts."
    },
    {
        "id": 136,
        "name": "Tennis Balls",
        "category": "Tennis",
        "price": 34,
        "image": "tennis.jpg",
        "description": "Experience unmatched quality with these tennis balls. Ideal for tennis enthusiasts."
    },
    {
        "id": 137,
        "name": "Headband",
        "category": "Tennis",
        "price": 17,
        "image": "sweat.jpg",
        "description": "Experience unmatched quality with this headband. Ideal for tennis enthusiasts."
    },
    {
        "id": 151,
        "name": "Shin Guards",
        "category": "Baseball",
        "price": 33,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Schienbeinsch%C3%BCtzer_adidas.png/500px-Schienbeinsch%C3%BCtzer_adidas.png",
        "description": "Experience unmatched quality with this carbon shin guards. Ideal for baseball enthusiasts."
    },
    {
        "id": 152,
        "name": "Batting Gloves",
        "category": "Baseball",
        "price": 192,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Baltimore_Orioles_batting_gloves_%287436167842%29.jpg/500px-Baltimore_Orioles_batting_gloves_%287436167842%29.jpg",
        "description": "Experience unmatched quality with this gold batting gloves. Ideal for baseball enthusiasts."
    },
    {
        "id": 153,
        "name": "Batting Helmet",
        "category": "Baseball",
        "price": 205,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Miguel_Cairo_%2843%29_%285875041788%29.jpg/500px-Miguel_Cairo_%2843%29_%285875041788%29.jpg",
        "description": "Experience unmatched quality with this gold batting helmet. Ideal for baseball enthusiasts."
    },
    {
        "id": 154,
        "name": "Shin Guards",
        "category": "Baseball",
        "price": 36,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Schienbeinsch%C3%BCtzer_adidas.png/500px-Schienbeinsch%C3%BCtzer_adidas.png",
        "description": "Experience unmatched quality with this blue shin guards. Ideal for baseball enthusiasts."
    },
    {
        "id": 156,
        "name": "Equipment Bag",
        "category": "Baseball",
        "price": 44,
        "image": "beb.jpg",
        "description": "Experience unmatched quality with this red equipment bag. Ideal for baseball enthusiasts."
    },
    {
        "id": 158,
        "name": "Baseballs",
        "category": "Baseball",
        "price": 32,
        "image": "https://upload.wikimedia.org/wikipedia/en/thumb/1/1e/Baseball_%28crop%29.jpg/500px-Baseball_%28crop%29.jpg",
        "description": "Experience unmatched quality with this orange baseballs. Ideal for baseball enthusiasts."
    },
    {
        "id": 159,
        "name": "Cleats",
        "category": "Baseball",
        "price": 129,
        "image": "bbc.jpg",
        "description": "Experience unmatched quality with this green metal cleats. Ideal for baseball enthusiasts."
    },
    {
        "id": 161,
        "name": "Leather Glove",
        "category": "Baseball",
        "price": 38,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/MAYS_THE_CATCH.JPG/500px-MAYS_THE_CATCH.JPG",
        "description": "Experience unmatched quality with this glossy leather glove. Ideal for baseball enthusiasts."
    },
    {
        "id": 164,
        "name": "Alloy Bat",
        "category": "Baseball",
        "price": 219,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Fourbats.jpg/500px-Fourbats.jpg",
        "description": "Experience unmatched quality with this carbon alloy bat. Ideal for baseball enthusiasts."
    },
    {
        "id": 181,
        "name": "Kickboard",
        "category": "Swimming",
        "price": 566,
        "image": "skb.jpg",
        "description": "Experience unmatched quality with this green kickboard. Ideal for swimming enthusiasts."
    },
    {
        "id": 184,
        "name": "Ear Plugs",
        "category": "Swimming",
        "price": 9,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Types_of_Earplugs.jpg/500px-Types_of_Earplugs.jpg",
        "description": "Experience unmatched quality with this red ear plugs. Ideal for swimming enthusiasts."
    },
    {
        "id": 186,
        "name": "Pull Buoy",
        "category": "Swimming",
        "price": 72,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Pullbuoy.jpg/500px-Pullbuoy.jpg",
        "description": "Experience unmatched quality with this matte pull buoy. Ideal for swimming enthusiasts."
    },
    {
        "id": 187,
        "name": "Towel",
        "category": "Swimming",
        "price": 17,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Zusammengelegte_Handt%C3%BCcher.jpg/500px-Zusammengelegte_Handt%C3%BCcher.jpg",
        "description": "Experience unmatched quality with this matte microfiber towel. Ideal for swimming enthusiasts."
    },
    {
        "id": 189,
        "name": "Nose Clip",
        "category": "Swimming",
        "price": 7,
        "image": "snc.jpg",
        "description": "Experience unmatched quality with this orange nose clip. Ideal for swimming enthusiasts."
    },
    {
        "id": 191,
        "name": "Swimsuit",
        "category": "Swimming",
        "price": 42,
        "image": "ss.jpg",
        "description": "Experience unmatched quality with this carbon swimsuit. Ideal for swimming enthusiasts."
    },
    {
        "id": 195,
        "name": "Waterproof Drybag",
        "category": "Swimming",
        "price": 95,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Drybag.png/500px-Drybag.png",
        "description": "Experience unmatched quality with this silver waterproof drybag. Ideal for swimming enthusiasts."
    },
    {
        "id": 196,
        "name": "Swimming Goggles",
        "category": "Swimming",
        "price": 41,
        "image": "sg.jpg",
        "description": "Experience unmatched quality with these swimming goggles. Ideal for swimming enthusiasts."
    },
    {
        "id": 211,
        "name": "Spandex Shorts",
        "category": "Volleyball",
        "price": 44,
        "image": "vss.jpg",
        "description": "Experience unmatched quality with this matte spandex shorts. Ideal for volleyball enthusiasts."
    },
    {
        "id": 212,
        "name": "Ankle Braces",
        "category": "Volleyball",
        "price": 72,
        "image": "vab.jpg",
        "description": "Experience unmatched quality with this orange ankle braces. Ideal for volleyball enthusiasts."
    },
    {
        "id": 213,
        "name": "Antenna Set",
        "category": "Volleyball",
        "price": 79,
        "image": "vas.jpg",
        "description": "Experience unmatched quality with this green antenna set. Ideal for volleyball enthusiasts."
    },
    {
        "id": 214,
        "name": "Volleyball",
        "category": "Volleyball",
        "price": 10,
        "image": "vb.jpg",
        "description": "Experience unmatched quality with this white volleyball. Ideal for volleyball enthusiasts."
    },
    {
        "id": 215,
        "name": "Arm Sleeves",
        "category": "Volleyball",
        "price": 36,
        "image": "vba.jpg",
        "description": "Experience unmatched quality with this orange arm sleeves. Ideal for volleyball enthusiasts."
    },
    {
        "id": 216,
        "name": "Team Jersey",
        "category": "Volleyball",
        "price": 51,
        "image": "vbj.jpg",
        "description": "Experience unmatched quality with this green team jersey. Ideal for volleyball enthusiasts."
    },
    {
        "id": 222,
        "name": "Dual Action Pump",
        "category": "Volleyball",
        "price": 20,
        "image": "dap.jpg",
        "description": "Experience unmatched quality with this glossy dual action pump. Ideal for volleyball enthusiasts."
    },
    {
        "id": 225,
        "name": "Outdoor Net",
        "category": "Volleyball",
        "price": 250,
        "image": "net.jpg",
        "description": "Experience unmatched quality with this black outdoor net. Ideal for volleyball enthusiasts."
    },
    {
        "id": 241,
        "name": "Distance Balls",
        "category": "Golf",
        "price": 26,
        "image": "gdb.jpg",
        "description": "Experience unmatched quality with this orange distance balls. Ideal for golf enthusiasts."
    },
    {
        "id": 242,
        "name": "Golf Polo",
        "category": "Golf",
        "price": 94,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Polo_Shirt_Basic_Pattern.png/500px-Polo_Shirt_Basic_Pattern.png",
        "description": "Experience unmatched quality with this red golf polo. Ideal for golf enthusiasts."
    },
    {
        "id": 243,
        "name": "Stand Bag",
        "category": "Golf",
        "price": 89,
        "image": "gsb.jpg",
        "description": "Experience unmatched quality with this silver stand bag. Ideal for golf enthusiasts."
    },
    {
        "id": 244,
        "name": "Leather Glove",
        "category": "Golf",
        "price": 63,
        "image": "glg.jpg",
        "description": "Experience unmatched quality with this red leather glove. Ideal for golf enthusiasts."
    },
    {
        "id": 247,
        "name": "Club Set",
        "category": "Golf",
        "price": 85,
        "image": "gcs.jpg",
        "description": "Experience unmatched quality with this neon club set. Ideal for golf enthusiasts."
    },
    {
        "id": 248,
        "name": "Spiked Shoes",
        "category": "Golf",
        "price": 93,
        "image": "gss.jpg",
        "description": "Experience unmatched quality with this gold spiked shoes. Ideal for golf enthusiasts."
    },
    {
        "id": 252,
        "name": "Divot Tool",
        "category": "Golf",
        "price": 39,
        "image": "gdt.jpg",
        "description": "Experience unmatched quality with this matte divot tool. Ideal for golf enthusiasts."
    },
    {
        "id": 253,
        "name": "Wooden Tees",
        "category": "Golf",
        "price": 11,
        "image": "gwt.png",
        "description": "Experience unmatched quality with this matte wooden tees. Ideal for golf enthusiasts."
    },
    {
        "id": 270,
        "name": "Boxing Gloves",
        "category": "Boxing",
        "price": 60,
        "image": "boxing_gloves.png",
        "description": "Experience unmatched quality with these boxing gloves. Ideal for boxing enthusiasts."
    },
    {
        "id": 271,
        "name": "Sparring Headgear",
        "category": "Boxing",
        "price": 56,
        "image": "bsg.jpg",
        "description": "Experience unmatched quality with this carbon sparring headgear. Ideal for boxing enthusiasts."
    },
    {
        "id": 272,
        "name": "Hand Wraps",
        "category": "Boxing",
        "price": 56,
        "image": "beh.jpg",
        "description": "Experience unmatched quality with this matte elastic hand wraps. Ideal for boxing enthusiasts."
    },
    {
        "id": 273,
        "name": "Heavy Bag",
        "category": "Boxing",
        "price": 69,
        "image": "bhb.jpg",
        "description": "Experience unmatched quality with this carbon 70lb heavy bag. Ideal for boxing enthusiasts."
    },
    {
        "id": 274,
        "name": "Freestanding Bag",
        "category": "Boxing",
        "price": 96,
        "image": "fsb.jpg",
        "description": "Experience unmatched quality with this black freestanding bag. Ideal for boxing enthusiasts."
    },
    {
        "id": 276,
        "name": "Focus Mitts",
        "category": "Boxing",
        "price": 53,
        "image": "bfm.jpg",
        "description": "Experience unmatched quality with this white focus mitts. Ideal for boxing enthusiasts."
    },
    {
        "id": 280,
        "name": "Mouthguard",
        "category": "Boxing",
        "price": 86,
        "image": "bmg.jpg",
        "description": "Experience unmatched quality with this glossy gel mouthguard. Ideal for boxing enthusiasts."
    },
    {
        "id": 281,
        "name": "Boxing Shoes",
        "category": "Boxing",
        "price": 68,
        "image": "bs.jpg",
        "description": "Experience unmatched quality with this red boxing shoes. Ideal for boxing enthusiasts."
    },
    {
        "id": 285,
        "name": "Speed Bag",
        "category": "Boxing",
        "price": 95,
        "image": "bsb.jpg",
        "description": "Experience unmatched quality with this carbon speed bag. Ideal for boxing enthusiasts."
    },
    {
        "id": 301,
        "name": "Bottle Cage",
        "category": "Cycling",
        "price": 22,
        "image": "cbc.jpg",
        "description": "Experience unmatched quality with this silver bottle cage. Ideal for cycling enthusiasts."
    },
    {
        "id": 302,
        "name": "Chain Lube",
        "category": "Cycling",
        "price": 7,
        "image": "ccl.jpg",
        "description": "Experience unmatched quality with this blue chain lube. Ideal for cycling enthusiasts."
    },
    {
        "id": 303,
        "name": "Road Bike",
        "category": "Cycling",
        "price": 396,
        "image": "cb.jpg",
        "description": "Experience unmatched quality with this neon road bike. Ideal for cycling enthusiasts."
    },
    {
        "id": 304,
        "name": "Padded Gloves",
        "category": "Cycling",
        "price": 24,
        "image": "cpg.jpg",
        "description": "Experience unmatched quality with this blue padded gloves. Ideal for cycling enthusiasts."
    },
    {
        "id": 305,
        "name": "Aero Helmet",
        "category": "Cycling",
        "price": 243,
        "image": "cah.jpg",
        "description": "Experience unmatched quality with this glossy aero helmet. Ideal for cycling enthusiasts."
    },
    {
        "id": 308,
        "name": "LED Lights",
        "category": "Cycling",
        "price": 44,
        "image": "led.jpg",
        "description": "Experience unmatched quality with this silver led lights. Ideal for cycling enthusiasts."
    },
    {
        "id": 311,
        "name": "Cycling Jersey",
        "category": "Cycling",
        "price": 72,
        "image": "cj.jpg",
        "description": "Experience unmatched quality with this orange cycling jersey. Ideal for cycling enthusiasts."
    },
    {
        "id": 313,
        "name": "Saddle Bag",
        "category": "Cycling",
        "price": 39,
        "image": "csb.jpg",
        "description": "Experience unmatched quality with this gold saddle bag. Ideal for cycling enthusiasts."
    },
    {
        "id": 315,
        "name": "Floor Pump",
        "category": "Cycling",
        "price": 19,
        "image": "cfp.jpg",
        "description": "Experience unmatched quality with this yellow floor pump. Ideal for cycling enthusiasts."
    },
    {
        "id": 331,
        "name": "Rugby Shorts",
        "category": "Rugby",
        "price": 27,
        "image": "rs.jpg",
        "description": "Experience unmatched quality with this red rugby shorts. Ideal for rugby enthusiasts."
    },
    {
        "id": 332,
        "name": "Stud Boots",
        "category": "Rugby",
        "price": 112,
        "image": "rsb.jpg",
        "description": "Experience unmatched quality with this green soft stud boots. Ideal for rugby enthusiasts."
    },
    {
        "id": 333,
        "name": "Headgear",
        "category": "Rugby",
        "price": 124,
        "image": "rhg.jpg",
        "description": "Experience unmatched quality with this blue scrum headgear. Ideal for rugby enthusiasts."
    },
    {
        "id": 334,
        "name": "Match Ball",
        "category": "Rugby",
        "price": 27,
        "image": "rmb.jpg",
        "description": "Experience unmatched quality with this white match ball. Ideal for rugby enthusiasts."
    },
    {
        "id": 335,
        "name": "Kicking Tee",
        "category": "Rugby",
        "price": 53,
        "image": "rkt.jpg",
        "description": "Experience unmatched quality with this glossy kicking tee. Ideal for rugby enthusiasts."
    },
    {
        "id": 337,
        "name": "Jersey",
        "category": "Rugby",
        "price": 37,
        "image": "rj.jpg",
        "description": "Experience unmatched quality with this green striped jersey. Ideal for rugby enthusiasts."
    },
    {
        "id": 339,
        "name": "Replacement Studs",
        "category": "Rugby",
        "price": 34,
        "image": "rrs.jpg",
        "description": "Experience unmatched quality with this silver replacement studs. Ideal for rugby enthusiasts."
    },
    {
        "id": 345,
        "name": "Mouthguard",
        "category": "Rugby",
        "price": 28,
        "image": "rmg.jpg",
        "description": "Experience unmatched quality with this glossy mouthguard. Ideal for rugby enthusiasts."
    },
    {
        "id": 361,
        "name": "Leather Ball",
        "category": "Cricket",
        "price": 34,
        "image": "clb.jpg",
        "description": "Experience unmatched quality with this yellow leather ball. Ideal for cricket enthusiasts."
    },
    {
        "id": 362,
        "name": "Keeper Gloves",
        "category": "Cricket",
        "price": 29,
        "image": "cwk.jpg",
        "description": "Experience unmatched quality with this silver wicket keeper gloves. Ideal for cricket enthusiasts."
    },
    {
        "id": 363,
        "name": "Batting Pads",
        "category": "Cricket",
        "price": 218,
        "image": "cbp.jpg",
        "description": "Experience unmatched quality with this orange batting pads. Ideal for cricket enthusiasts."
    },
    {
        "id": 364,
        "name": "Thigh Guard",
        "category": "Cricket",
        "price": 68,
        "image": "ctg.jpg",
        "description": "Experience unmatched quality with this green thigh guard. Ideal for cricket enthusiasts."
    },
    {
        "id": 365,
        "name": "Abdomen Guard",
        "category": "Cricket",
        "price": 78,
        "image": "cag.jpg",
        "description": "Experience unmatched quality with this carbon abdomen guard. Ideal for cricket enthusiasts."
    },
    {
        "id": 367,
        "name": "Willow Bat",
        "category": "Cricket",
        "price": 99,
        "image": "cwb.jpg",
        "description": "Experience unmatched quality with this carbon willow bat. Ideal for cricket enthusiasts."
    },
    {
        "id": 392,
        "name": "Ice Skates",
        "category": "Hockey",
        "price": 114,
        "image": "his.jpg",
        "description": "Experience unmatched quality with this green ice skates. Ideal for hockey enthusiasts."
    },
    {
        "id": 393,
        "name": "Shin Guards",
        "category": "Hockey",
        "price": 44,
        "image": "hsg.jpg",
        "description": "Experience unmatched quality with this neon shin guards. Ideal for hockey enthusiasts."
    },
    {
        "id": 394,
        "name": "Cage Helmet",
        "category": "Hockey",
        "price": 59,
        "image": "hch.jpg",
        "description": "Experience unmatched quality with this neon cage helmet. Ideal for hockey enthusiasts."
    },
    {
        "id": 395,
        "name": "Large Gear Bag",
        "category": "Hockey",
        "price": 40,
        "image": "hb.jpg",
        "description": "Experience unmatched quality with this black large gear bag. Ideal for hockey enthusiasts."
    },
    {
        "id": 398,
        "name": "Vulcanized Puck",
        "category": "Hockey",
        "price": 25,
        "image": "hvp.jpg",
        "description": "Experience unmatched quality with this neon vulcanized puck. Ideal for hockey enthusiasts."
    },
    {
        "id": 401,
        "name": "Hockey Gloves",
        "category": "Hockey",
        "price": 72,
        "image": "hg.jpg",
        "description": "Experience unmatched quality with this orange hockey gloves. Ideal for hockey enthusiasts."
    },
    {
        "id": 403,
        "name": "Padded Pants",
        "category": "Hockey",
        "price": 63,
        "image": "hpp.jpg",
        "description": "Experience unmatched quality with this orange padded pants. Ideal for hockey enthusiasts."
    },
    {
        "id": 404,
        "name": "Hockey Balls",
        "category": "Hockey",
        "price": 31,
        "image": "hockey_balls.png",
        "description": "Experience unmatched quality with these hockey balls. Ideal for hockey enthusiasts."
    },
    {
        "id": 421,
        "name": "Regulation Table",
        "category": "Table Tennis",
        "price": 358,
        "image": "trt.jpg",
        "description": "Experience unmatched quality with this neon regulation table. Ideal for table tennis enthusiasts."
    },
    {
        "id": 422,
        "name": "Replacement Net",
        "category": "Table Tennis",
        "price": 245,
        "image": "trn.jpg",
        "description": "Experience unmatched quality with this carbon replacement net. Ideal for table tennis enthusiasts."
    },
    {
        "id": 423,
        "name": "Grip Shoes",
        "category": "Table Tennis",
        "price": 145,
        "image": "tgs.jpg",
        "description": "Experience unmatched quality with this neon grip shoes. Ideal for table tennis enthusiasts."
    },
    {
        "id": 424,
        "name": "Paddle Case",
        "category": "Table Tennis",
        "price": 205,
        "image": "pc.jpg",
        "description": "Experience unmatched quality with this neon paddle case. Ideal for table tennis enthusiasts."
    },
    {
        "id": 425,
        "name": "Rubber Cleaner",
        "category": "Table Tennis",
        "price": 5,
        "image": "rc.jpg",
        "description": "Experience unmatched quality with this orange rubber cleaner. Ideal for table tennis enthusiasts."
    },
    {
        "id": 428,
        "name": "3-Star Balls",
        "category": "Table Tennis",
        "price": 23,
        "image": "3sb.jpg",
        "description": "Experience unmatched quality with this carbon 3-star balls. Ideal for table tennis enthusiasts."
    },
    {
        "id": 431,
        "name": "Robot Server",
        "category": "Table Tennis",
        "price": 578,
        "image": "trs.jpg",
        "description": "Experience unmatched quality with this yellow robot server. Ideal for table tennis enthusiasts."
    },
    {
        "id": 433,
        "name": "Paddle",
        "category": "Table Tennis",
        "price": 67,
        "image": "p.jpg",
        "description": "Experience unmatched quality with this glossy carbon paddle. Ideal for table tennis enthusiasts."
    },
    {
        "id": 434,
        "name": "Scoreboard",
        "category": "Table Tennis",
        "price": 501,
        "image": "sb.jpg",
        "description": "Experience unmatched quality with this red digital scoreboard. Ideal for table tennis enthusiasts."
    },
    {
        "id": 451,
        "name": "Overgrip",
        "category": "Badminton",
        "price": 10,
        "image": "bmo.jpg",
        "description": "Experience unmatched quality with this orange overgrip. Ideal for badminton enthusiasts."
    },
    {
        "id": 453,
        "name": "Racket",
        "category": "Badminton",
        "price": 129,
        "image": "bmr.jpg",
        "description": "Experience unmatched quality with this glossy carbon racket. Ideal for badminton enthusiasts."
    },
    {
        "id": 454,
        "name": "Dry-Fit Jersey",
        "category": "Badminton",
        "price": 65,
        "image": "dft.jpg",
        "description": "Experience unmatched quality with this blue dry-fit jersey. Ideal for badminton enthusiasts."
    },
    {
        "id": 455,
        "name": "Shuttlecocks",
        "category": "Badminton",
        "price": 16,
        "image": "sc.jpg",
        "description": "Experience unmatched quality with this blue feather shuttlecocks. Ideal for badminton enthusiasts."
    },
    {
        "id": 456,
        "name": "Athletic Shorts",
        "category": "Badminton",
        "price": 63,
        "image": "bas.jpg",
        "description": "Experience unmatched quality with this gold athletic shorts. Ideal for badminton enthusiasts."
    },
    {
        "id": 463,
        "name": "Portable Net",
        "category": "Badminton",
        "price": 208,
        "image": "pn.jpg",
        "description": "Experience unmatched quality with this carbon portable net. Ideal for badminton enthusiasts."
    },
    {
        "id": 464,
        "name": "String Reel",
        "category": "Badminton",
        "price": 26,
        "image": "sr.jpg",
        "description": "Experience unmatched quality with this gold string reel. Ideal for badminton enthusiasts."
    },
    {
        "id": 481,
        "name": "Traction Pad",
        "category": "Surfing",
        "price": 69,
        "image": "tp.jpg",
        "description": "Experience unmatched quality with this orange traction pad. Ideal for surfing enthusiasts."
    },
    {
        "id": 482,
        "name": "Replacement Fins",
        "category": "Surfing",
        "price": 79,
        "image": "rf.jpg",
        "description": "Experience unmatched quality with this silver replacement fins. Ideal for surfing enthusiasts."
    },
    {
        "id": 483,
        "name": "Zinc Sunscreen",
        "category": "Surfing",
        "price": 12,
        "image": "sz.jpg",
        "description": "Experience unmatched quality with this yellow zinc sunscreen. Ideal for surfing enthusiasts."
    },
    {
        "id": 484,
        "name": "Rash Guard",
        "category": "Surfing",
        "price": 93,
        "image": "rg.jpg",
        "description": "Experience unmatched quality with this glossy rash guard. Ideal for surfing enthusiasts."
    },
    {
        "id": 486,
        "name": "Board Wax",
        "category": "Surfing",
        "price": 245,
        "image": "bw.jpg",
        "description": "Experience unmatched quality with this neon board wax. Ideal for surfing enthusiasts."
    },
    {
        "id": 487,
        "name": "Travel Board Bag",
        "category": "Surfing",
        "price": 172,
        "image": "tb.jpg",
        "description": "Experience unmatched quality with this carbon travel board bag. Ideal for surfing enthusiasts."
    },
    {
        "id": 488,
        "name": "Neoprene Wetsuit",
        "category": "Surfing",
        "price": 53,
        "image": "ws.jpg",
        "description": "Experience unmatched quality with this black neoprene wetsuit. Ideal for surfing enthusiasts."
    },
    {
        "id": 491,
        "name": "Surfer Ear Plugs",
        "category": "Surfing",
        "price": 6,
        "image": "ep.jpg",
        "description": "Experience unmatched quality with this glossy surfer ear plugs. Ideal for surfing enthusiasts."
    },
    {
        "id": 492,
        "name": "Ankle Leash",
        "category": "Surfing",
        "price": 95,
        "image": "al.jpg",
        "description": "Experience unmatched quality with this blue ankle leash. Ideal for surfing enthusiasts."
    },
    {
        "id": 494,
        "name": "Fiberglass Board",
        "category": "Surfing",
        "price": 340,
        "image": "fb.jpg",
        "description": "Experience unmatched quality with this black fiberglass board. Ideal for surfing enthusiasts."
    },
    {
        "id": 512,
        "name": "Skate Helmet",
        "category": "Skateboarding",
        "price": 87,
        "image": "sh.jpg",
        "description": "Experience unmatched quality with this neon skate helmet. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 513,
        "name": "Suede Skate Shoes",
        "category": "Skateboarding",
        "price": 112,
        "image": "sss.jpg",
        "description": "Experience unmatched quality with this neon suede skate shoes. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 514,
        "name": "ABEC-9 Bearings",
        "category": "Skateboarding",
        "price": 93,
        "image": "sbb.jpg",
        "description": "Experience unmatched quality with this carbon abec-9 bearings. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 516,
        "name": "Multi-Tool",
        "category": "Skateboarding",
        "price": 87,
        "image": "mt.jpg",
        "description": "Experience unmatched quality with this black multi-tool. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 520,
        "name": "Grip Tape",
        "category": "Skateboarding",
        "price": 8,
        "image": "gt.jpg",
        "description": "Experience unmatched quality with this green grip tape. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 521,
        "name": "Skateboard",
        "category": "Skateboarding",
        "price": 55,
        "image": "skateboarding.png",
        "description": "Experience unmatched quality with this premium skateboard. Ideal for skateboarding enthusiasts."
    },
    {
        "id": 541,
        "name": "Padded Board Bag",
        "category": "Snowboarding",
        "price": 210,
        "image": "pbb.jpg",
        "description": "Experience unmatched quality with this orange padded board bag. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 542,
        "name": "Freestyle Board",
        "category": "Snowboarding",
        "price": 529,
        "image": "fsbb.jpg",
        "description": "Experience unmatched quality with this red freestyle board. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 543,
        "name": "Gore-Tex Gloves",
        "category": "Snowboarding",
        "price": 42,
        "image": "gtg.jpg",
        "description": "Experience unmatched quality with this blue gore-tex gloves. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 544,
        "name": "Insulated Pants",
        "category": "Snowboarding",
        "price": 79,
        "image": "ip.jpg",
        "description": "Experience unmatched quality with this orange insulated pants. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 547,
        "name": "Boa Boots",
        "category": "Snowboarding",
        "price": 79,
        "image": "bb.jpg",
        "description": "Experience unmatched quality with this yellow boa boots. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 551,
        "name": "Fleece Face Mask",
        "category": "Snowboarding",
        "price": 24,
        "image": "fm.jpg",
        "description": "Experience unmatched quality with this orange fleece face mask. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 552,
        "name": "Strap Bindings",
        "category": "Snowboarding",
        "price": 38,
        "image": "ssb.jpg",
        "description": "Experience unmatched quality with this carbon strap bindings. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 553,
        "name": "Snowboarding Goggles",
        "category": "Snowboarding",
        "price": 75,
        "image": "sbg.jpg",
        "description": "Experience unmatched quality with these snowboarding goggles. Ideal for snowboarding enthusiasts."
    },
    {
        "id": 571,
        "name": "Ski Gloves",
        "category": "Skiing",
        "price": 33,
        "image": "sgg.jpg",
        "description": "Experience unmatched quality with this white ski gloves. Ideal for skiing enthusiasts."
    },
    {
        "id": 572,
        "name": "Merino Base Layer",
        "category": "Skiing",
        "price": 30,
        "image": "mbl.jpg",
        "description": "Experience unmatched quality with this yellow merino base layer. Ideal for skiing enthusiasts."
    },
    {
        "id": 573,
        "name": "Ventilated Helmet",
        "category": "Skiing",
        "price": 240,
        "image": "vh.jpg",
        "description": "Experience unmatched quality with this silver ventilated helmet. Ideal for skiing enthusiasts."
    },
    {
        "id": 574,
        "name": "Waterproof Pants",
        "category": "Skiing",
        "price": 69,
        "image": "wpp.jpg",
        "description": "Experience unmatched quality with this green waterproof pants. Ideal for skiing enthusiasts."
    },
    {
        "id": 575,
        "name": "Stiff Ski Boots",
        "category": "Skiing",
        "price": 161,
        "image": "ssb2.jpg",
        "description": "Experience unmatched quality with this white stiff ski boots. Ideal for skiing enthusiasts."
    },
    {
        "id": 578,
        "name": "Carbon Poles",
        "category": "Skiing",
        "price": 24,
        "image": "scp.png",
        "description": "Experience unmatched quality with this white carbon poles. Ideal for skiing enthusiasts."
    },
    {
        "id": 582,
        "name": "Ski Jacket",
        "category": "Skiing",
        "price": 73,
        "image": "sj.jpg",
        "description": "Experience unmatched quality with this yellow thermal ski jacket. Ideal for skiing enthusiasts."
    },
    {
        "id": 583,
        "name": "Photochromic Goggles",
        "category": "Skiing",
        "price": 97,
        "image": "pg.jpg",
        "description": "Experience unmatched quality with this glossy photochromic goggles. Ideal for skiing enthusiasts."
    },
    {
        "id": 601,
        "name": "Point Roller",
        "category": "Yoga",
        "price": 61,
        "image": "yps.jpg",
        "description": "Experience unmatched quality with this green trigger point roller. Ideal for yoga enthusiasts."
    },
    {
        "id": 602,
        "name": "Foam Blocks",
        "category": "Yoga",
        "price": 59,
        "image": "eva.jpg",
        "description": "Experience unmatched quality with this glossy eva foam blocks. Ideal for yoga enthusiasts."
    },
    {
        "id": 603,
        "name": "Meditation Cushion",
        "category": "Yoga",
        "price": 99,
        "image": "mc.jpg",
        "description": "Experience unmatched quality with this matte meditation cushion. Ideal for yoga enthusiasts."
    },
    {
        "id": 604,
        "name": "EVA Foam Blocks",
        "category": "Yoga",
        "price": 53,
        "image": "yfb.jpg",
        "description": "Experience unmatched quality with this black eva foam blocks. Ideal for yoga enthusiasts."
    },
    {
        "id": 606,
        "name": "Cotton Strap",
        "category": "Yoga",
        "price": 37,
        "image": "cs.jpg",
        "description": "Experience unmatched quality with this carbon cotton strap. Ideal for yoga enthusiasts."
    },
    {
        "id": 609,
        "name": "Non-Slip Mat",
        "category": "Yoga",
        "price": 63,
        "image": "ns.jpg",
        "description": "Experience unmatched quality with this white non-slip mat. Ideal for yoga enthusiasts."
    },
    {
        "id": 610,
        "name": "Support Bolster",
        "category": "Yoga",
        "price": 47,
        "image": "ysb.jpg",
        "description": "Experience unmatched quality with this orange support bolster. Ideal for yoga enthusiasts."
    },
    {
        "id": 615,
        "name": "Microfiber Towel",
        "category": "Yoga",
        "price": 10,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Zusammengelegte_Handt%C3%BCcher.jpg/500px-Zusammengelegte_Handt%C3%BCcher.jpg",
        "description": "Experience unmatched quality with this yellow microfiber towel. Ideal for yoga enthusiasts."
    },
    {
        "id": 631,
        "name": "Rubber Discus",
        "category": "Track and Field",
        "price": 90,
        "image": "rd.jpg",
        "description": "Experience unmatched quality with this glossy rubber discus. Ideal for track and field enthusiasts."
    },
    {
        "id": 632,
        "name": "Training Hurdle",
        "category": "Track and Field",
        "price": 50,
        "image": "th.jpg",
        "description": "Experience unmatched quality with this yellow training hurdle. Ideal for track and field enthusiasts."
    },
    {
        "id": 634,
        "name": "Training Javelin",
        "category": "Track and Field",
        "price": 55,
        "image": "tj.jpg",
        "description": "Experience unmatched quality with this neon training javelin. Ideal for track and field enthusiasts."
    },
    {
        "id": 636,
        "name": "Sprint Spikes",
        "category": "Track and Field",
        "price": 75,
        "image": "ss2.jpg",
        "description": "Experience unmatched quality with this blue sprint spikes. Ideal for track and field enthusiasts."
    },
    {
        "id": 638,
        "name": "High Jump Crossbar",
        "category": "Track and Field",
        "price": 67,
        "image": "hjcb.jpg",
        "description": "Experience unmatched quality with this silver high jump crossbar. Ideal for track and field enthusiasts."
    },
    {
        "id": 641,
        "name": "Compression Tights",
        "category": "Track and Field",
        "price": 82,
        "image": "ct.jpg",
        "description": "Experience unmatched quality with this gold compression tights. Ideal for track and field enthusiasts."
    },
    {
        "id": 642,
        "name": "Fiberglass Tape",
        "category": "Track and Field",
        "price": 8,
        "image": "fgt.jpg",
        "description": "Experience unmatched quality with this matte fiberglass tape. Ideal for track and field enthusiasts."
    },
    {
        "id": 643,
        "name": "Aluminum Block",
        "category": "Track and Field",
        "price": 36,
        "image": "ab.jpg",
        "description": "Experience unmatched quality with this yellow aluminum block. Ideal for track and field enthusiasts."
    },
    {
        "id": 661,
        "name": "Firm Ground Cleats",
        "category": "Soccer (Football)",
        "price": 170,
        "image": "fgc.jpg",
        "description": "Experience unmatched quality with this glossy firm ground cleats. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 662,
        "name": "Dual Action Pump",
        "category": "Soccer (Football)",
        "price": 19,
        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Bike_pump.jpg/500px-Bike_pump.jpg",
        "description": "Experience unmatched quality with this red dual action pump. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 663,
        "name": "Knee-High Socks",
        "category": "Soccer (Football)",
        "price": 23,
        "image": "khs.jpg",
        "description": "Experience unmatched quality with this yellow knee-high socks. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 664,
        "name": "Speed Ladder",
        "category": "Soccer (Football)",
        "price": 65,
        "image": "sl.jpg",
        "description": "Experience unmatched quality with this silver speed ladder. Ideal for soccer (football) enthusiasts."
    },
    {
        "name": "Captain Armband",
        "category": "Soccer (Football)",
        "price": 51,
        "image": "cab.jpg",
        "description": "Experience unmatched quality with this carbon captain armband. Ideal for soccer (football) enthusiasts.",
        "id": 665
    },
    {
        "id": 667,
        "name": "Agility Cones",
        "category": "Soccer (Football)",
        "price": 91,
        "image": "fac.jpg",
        "description": "Experience unmatched quality with this carbon agility cones. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 668,
        "name": "Goalie Gloves",
        "category": "Soccer (Football)",
        "price": 20,
        "image": "fgg.jpg",
        "description": "Experience unmatched quality with this neon goalie gloves. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 671,
        "name": "Match Ball",
        "category": "Soccer (Football)",
        "price": 28,
        "image": "uefa_ball.png",
        "description": "Experience unmatched quality with this neon match ball. Ideal for soccer (football) enthusiasts."
    },
    {
        "id": 693,
        "name": "Indoor/Outdoor Basketball",
        "category": "Basketball",
        "price": 11,
        "image": "basketball.jpg",
        "description": "Experience unmatched quality with this indoor/outdoor basketball. Ideal for basketball enthusiasts."
    },
    {
        "id": 694,
        "name": "Professional Basketball Shoes",
        "category": "Basketball",
        "price": 120,
        "image": "bbs.jpg",
        "description": "Experience unmatched quality with this professional basketball shoes. Ideal for basketball enthusiasts."
    },
    {
        "id": 695,
        "name": "Breathable Mesh Shorts",
        "category": "Basketball",
        "price": 60,
        "image": "breathable mesh.jpg",
        "description": "Experience unmatched quality with this breathable mesh shorts. Ideal for basketball enthusiasts."
    },
    {
        "id": 696,
        "name": "Reversible Practice Jersey",
        "category": "Basketball",
        "price": 79,
        "image": "reversible.jpg",
        "description": "Experience unmatched quality with this reversible practice jersey. Ideal for basketball enthusiasts."
    },
    {
        "id": 697,
        "name": "Compression Arm Sleeve",
        "category": "Basketball",
        "price": 79,
        "image": "compression.jpg",
        "description": "Experience unmatched quality with this compression arm sleeve. Ideal for basketball enthusiasts."
    },
    {
        "id": 698,
        "name": "Protective Knee Pad Sleeve",
        "category": "Basketball",
        "price": 35,
        "image": "protective knee.jpg",
        "description": "Experience unmatched quality with this protective knee pad sleeve. Ideal for basketball enthusiasts."
    },
    {
        "id": 699,
        "name": "Moisture Wicking Headband",
        "category": "Basketball",
        "price": 19,
        "image": "moisture.jpg",
        "description": "Experience unmatched quality with this moisture wicking headband. Ideal for basketball enthusiasts."
    },
    {
        "id": 700,
        "name": "Cushioned Crew Socks",
        "category": "Basketball",
        "price": 11,
        "image": "cushioned.jpg",
        "description": "Experience unmatched quality with this cushioned crew socks. Ideal for basketball enthusiasts."
    },
    {
        "id": 701,
        "name": "Spacious Gym Duffel Bag",
        "category": "Basketball",
        "price": 32,
        "image": "spacious.jpg",
        "description": "Experience unmatched quality with this spacious gym duffel bag. Ideal for basketball enthusiasts."
    },
    {
        "id": 702,
        "name": "Insulated Water Bottle",
        "category": "Basketball",
        "price": 9,
        "image": "biw.jpg",
        "description": "Experience unmatched quality with this insulated water bottle. Ideal for basketball enthusiasts."
    },
    {
        "id": 703,
        "name": "Microfiber Sweat Towel",
        "category": "Basketball",
        "price": 25,
        "image": "towel.jpg",
        "description": "Experience unmatched quality with this microfiber sweat towel. Ideal for basketball enthusiasts."
    },
    {
        "id": 704,
        "name": "Dual-Action Air Pump",
        "category": "Basketball",
        "price": 16,
        "image": "dual.jpg",
        "description": "Experience unmatched quality with this dual-action air pump. Ideal for basketball enthusiasts."
    },
    {
        "id": 705,
        "name": "Referee Tactics Whistle",
        "category": "Basketball",
        "price": 14,
        "image": "whistle.jpg",
        "description": "Experience unmatched quality with this referee tactics whistle. Ideal for basketball enthusiasts."
    },
    {
        "id": 706,
        "name": "Dry-Erase Coaches Board",
        "category": "Basketball",
        "price": 389,
        "image": "board.jpg",
        "description": "Experience unmatched quality with this dry-erase coaches board. Ideal for basketball enthusiasts."
    },
    {
        "id": 707,
        "name": "Over-the-Door Mini Hoop",
        "category": "Basketball",
        "price": 32,
        "image": "otd.jpg",
        "description": "Experience unmatched quality with this over-the-door mini hoop. Ideal for basketball enthusiasts."
    },
    {
        "id": 801,
        "name": "Pool Cue",
        "category": "Pool Tables",
        "price": 23,
        "image": "cues.jpg",
        "description": "Experience unmatched quality with this premium pool cue. Ideal for pool enthusiasts."
    },
    {
        "id": 802,
        "name": "Billiard Balls Set",
        "category": "Pool Tables",
        "price": 15,
        "image": "balls.jpg",
        "description": "Experience unmatched quality with this billiard balls set. Ideal for pool enthusiasts."
    },
    {
        "id": 803,
        "name": "Pool Cue Chalk",
        "category": "Pool Tables",
        "price": 79,
        "image": "chalk.jpg",
        "description": "Experience unmatched quality with this pool cue chalk. Ideal for pool enthusiasts."
    },
    {
        "id": 804,
        "name": "Professional Pool Table",
        "category": "Pool Tables",
        "price": 1200,
        "image": "table.jpg",
        "description": "Experience unmatched quality with this professional pool table. Ideal for pool enthusiasts."
    },
    {
        "id": 805,
        "name": "Standard Billiard Table",
        "category": "Pool Tables",
        "price": 850,
        "image": "sta.jpg",
        "description": "Experience unmatched quality with this standard billiard table. Ideal for pool enthusiasts."
    },
    {
        "id": 806,
        "name": "Heyball Table",
        "category": "Pool Tables",
        "price": 1500,
        "image": "hey.jpg",
        "description": "Experience unmatched quality with this heyball table. Ideal for pool enthusiasts."
    },
    {
        "id": 807,
        "name": "Mini Pool Table",
        "category": "Pool Tables",
        "price": 150,
        "image": "mini.jpg",
        "description": "Experience unmatched quality with this mini pool table. Ideal for pool enthusiasts."
    },
    {
        "id": 808,
        "name": "Triangle Ball Rack",
        "category": "Pool Tables",
        "price": 12,
        "image": "tri.jpg",
        "description": "Experience unmatched quality with this triangle ball rack. Ideal for pool enthusiasts."
    },
    {
        "id": 809,
        "name": "Billiard Table Cover",
        "category": "Pool Tables",
        "price": 45,
        "image": "bill.jpg",
        "description": "Experience unmatched quality with this billiard table cover. Ideal for pool enthusiasts."
    },
    {
        "id": 810,
        "name": "Pool Table Brush",
        "category": "Pool Tables",
        "price": 18,
        "image": "bru.jpg",
        "description": "Experience unmatched quality with this pool table brush. Ideal for pool enthusiasts."
    },
    {
        "id": 811,
        "name": "Wall-Mounted Cue Rack",
        "category": "Pool Tables",
        "price": 65,
        "image": "wmc.jpg",
        "description": "Experience unmatched quality with this wall-mounted cue rack. Ideal for pool enthusiasts."
    },
    {
        "id": 812,
        "name": "Cross Bridge Stick",
        "category": "Pool Tables",
        "price": 25,
        "image": "cbs.jpg",
        "description": "Experience unmatched quality with this cross bridge stick. Ideal for pool enthusiasts."
    },
    {
        "id": 813,
        "name": "Hard Tube Cue Case",
        "category": "Pool Tables",
        "price": 55,
        "image": "case.jpg",
        "description": "Experience unmatched quality with this hard tube cue case. Ideal for pool enthusiasts."
    },
    {
        "id": 814,
        "name": "Billiard Glove",
        "category": "Pool Tables",
        "price": 15,
        "image": "glove.jpg",
        "description": "Experience unmatched quality with this billiard glove. Ideal for pool enthusiasts."
    },
    {
        "id": 815,
        "name": "Replacement Felt (Green)",
        "category": "Pool Tables",
        "price": 110,
        "image": "felt.jpg",
        "description": "Experience unmatched quality with this replacement felt (green). Ideal for pool enthusiasts."
    },
    {
        "id": 816,
        "name": "Numbered Balls",
        "category": "Pool Tables",
        "price": 35,
        "image": "number.jpg",
        "description": "Experience unmatched quality with these numbered balls. Ideal for pool enthusiasts."
    }
];
