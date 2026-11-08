USE giftpixie_portfolio;

-- Tambah produk baru (tanpa kolom stock yang menyebabkan error)
INSERT INTO products (name, description, price, category_id, image)
VALUES
('Mug Custom UTS', 'Mug keramik dengan desain custom', 75000, 1, 'mug.jpg'),
('Tote Bag DevOps', 'Tote bag kanvas edisi DevOps', 60000, 1, 'totebag.jpg');

-- Tabel baru: ulasan produk
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    reviewer VARCHAR(100) NOT NULL,
    rating TINYINT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_id, reviewer, rating, comment)
VALUES (1, 'Kelompok UTS-Akebo', 5, 'Produk bagus!');