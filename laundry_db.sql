CREATE DATABASE laundry_db;

USE laundry_db;

CREATE TABLE deterjen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    merek VARCHAR(100),
    jenis VARCHAR(100),
    supplier VARCHAR(100),
    tanggal_pembelian DATE,
    stok INT
);

INSERT INTO deterjen (merek, jenis, supplier, tanggal_pembelian, stok) VALUES
('Rinso Anti Noda', 'Deterjen', 'PT Unilever Indonesia', '2026-10-01', 50),
('Attack Sensor Matic', 'Deterjen', 'PT Kao Indonesia', '2026-10-02', 30),
('So Klin Liquid', 'Deterjen', 'PT Wings Surya', '2026-10-03', 45),
('Molto Pure', 'Pewangi', 'PT Unilever Indonesia', '2026-10-01', 25),
('Downy Passion', 'Pewangi', 'PT Procter & Gamble', '2026-10-04', 20),
('So Klin Royalle', 'Pewangi', 'PT Wings Surya', '2026-10-05', 35),
('Softlan Super Soft', 'Pelembut', 'PT Colgate-Palmolive', '2026-10-02', 15),
('Soklin Softener', 'Pelembut', 'PT Wings Surya', '2026-10-04', 40),
('Molto Softener Ultra', 'Pelembut', 'PT Unilever Indonesia', '2026-10-06', 10);
