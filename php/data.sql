CREATE DATABASE login;

USE login;

CREATE TABLE logindetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- Create the products table
CREATE TABLE products (
    id VARCHAR(5) PRIMARY KEY,
    name VARCHAR(50),
    price DECIMAL(5, 2),
    image VARCHAR(255),
    description TEXT
);

-- Insert product data into the products table
INSERT INTO products (id, name, price, image, description) VALUES
('ld01', 'Apple', 2.39, 'images/img1.jpg', 'Its sweet or tart flavor and various colors and varieties.'),
('ld02', 'Avocado', 1.36, 'images/avacodo.jpg', 'The avocado is a nutrient-dense, creamy fruit that is highly regarded for its flavor.'),
('ld03', 'Ackee', 2.99, 'images/ackee.jpg', 'Its buttery texture and mildly nutty flavor, popular in Caribbean cuisine.'),
('ld04', 'Banana', 0.69, 'images/banana.jpg', 'Its great nutritious value, sweet flavor, and creamy texture.'),
('ld05', 'Bilimbi', 7.99, 'images/bil.png', 'The bilimbi is a tropical fruit with a sour flavor, commonly used in Southeast Asian cuisine.'),
('ld06', 'Cherry', 10.97, 'images/cherry.jpg', 'Cherries are small, round stone fruits known for their sweet or tart flavor.'),
('ld07', 'Currant', 2.36, 'images/black.jpg', 'Currants are small, available in red, black, or white varieties.'),
('ld08', 'Dragon Fruit', 0.80, 'images/dragon.jpg', 'Its a vibrant tropical fruit with a sweet, mild flavor and striking appearance.'),
('ld09', 'Durian', 2.77, 'images/durian.jpg', 'The controversial tropical fruit durian has creamy, custard-like flesh and a strong scent.'),
('ld10', 'Dates', 2.69, 'images/dates.jpg', 'Dates are sweet, fruits with a caramel-like flavor, packed with nutrients.'),
('ld11', 'Fuji apple', 1.32, 'images/fugi.jpg', 'Fuji apples are crisp, sweet, and juicy with a hint of tartness.'),
('ld12', 'Grapes', 2.24, 'images/grape.jpg', 'Grapes are small, juicy fruits with a sweet or tart flavor.'),
('ld13', 'Gooseberry', 3.65, 'images/goose.jpg', 'Gooseberries are small, tart berries with a translucent skin, prized for their tangy flavor.'),
('ld14', 'Guava', 4.00, 'images/guava.jpg', 'Valued for its unique flavor and high vitamin C content.'),
('ld15', 'Ice apple', 2.00, 'images/ice.jpg', 'Its a refreshing fruit with clear, jelly-like flesh and a mildly sweet taste.'),
('ld16', 'Jack fruit', 1.02, 'images/jack.jpg', 'Jackfruit is a tropical flavor and fibrous texture.'),
('ld17', 'Kiwi', 1.00, 'images/kiwi.jpg', 'Its contains high vitamin C content and refreshing, sweet-tart flavor.'),
('ld18', 'Longan', 1.20, 'images/longan.jpg', 'Longan is a sweet, floral flavor.'),
('ld19', 'Lychee', 2.07, 'images/lychee.jpg', 'Its like floral aroma and sweet and contains unique flavor.'),
('ld20', 'Lemon', 1.07, 'images/lemon.jpg', 'Yellow citrus fruits known for their tangy, acidic flavor and high vitamin C content.'),
('ld21', 'Mangoes', 2.99, 'images/mango.jpg', 'Sweet, juicy fruits with a rich, creamy texture and a vibrant flavor reminiscent of sunshine.'),
('ld22', 'Mangosteen', 6.00, 'images/man.jpg', 'Purple rind and delicate, sweet flesh, prized for its unique flavor.'),
('ld23', 'Orange', 1.65, 'images/orange.jpg', 'Refreshing tangy-sweet taste, and high vitamin C content.'),
('ld24', 'Pine apples', 1.80, 'images/pine.jpg', 'Pine apples are juicy yellow flesh, and a perfect balance of sweet and tart flavors.'),
('ld25', 'Plum', 2.00, 'images/plum.jpg', 'Juicy stone fruit with smooth skin and a sweet-tart flavor.'),
('ld26', 'Papaya', 2.00, 'images/papaya.jpg', 'Sweet taste, and a buttery texture, rich in vitamins.'),
('ld27', 'Peach', 1.99, 'images/peach.jpg', 'Juicy stone fruit with fuzzy skin, a sweet aroma, and a deliciously soft, succulent flesh.'),
('ld28', 'Pomegranate', 1.99, 'images/pom.jpg', 'Red fruits with a hard outer skin, jewel-like seeds that offer a sweet-tart flavor.'),
('ld29', 'Rambutans', 4.99, 'images/ram.jpg', 'Hairy red skin, sweet flesh surrounding a single seed, reminiscent of lychee in flavor.'),
('ld30', 'Watermelon', 2.25, 'images/water.jpg', 'Refreshing, juicy, and hydrating qualities, with sweet pink or red flesh.');



