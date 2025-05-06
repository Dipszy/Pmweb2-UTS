
-- DROP TABLES KALO MAU RISET
-- DROP TABLE faskes;
-- DROP TABLE kategori;
-- DROP TABLE jenis_faskes;
-- DROP TABLE kabkota;
-- DROP TABLE provinsi;

CREATE TABLE provinsi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(45),
    ibukota VARCHAR(45),
    latitude DOUBLE,
    longitude DOUBLE
);

CREATE TABLE kabkota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    latitude DOUBLE,
    longitude DOUBLE,
    provinsi_id INT,
    FOREIGN KEY (provinsi_id) REFERENCES provinsi(id)
);

CREATE TABLE jenis_faskes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(45)
);

CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50)
);

CREATE TABLE faskes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nama_pengelola VARCHAR(45),
    alamat VARCHAR(100),
    website VARCHAR(45),
    email VARCHAR(45),
    kabkota_id INT,
    rating INT,
    latitude DOUBLE,
    longitude DOUBLE,
    jenis_faskes_id INT,
    kategori_id INT,
    FOREIGN KEY (kabkota_id) REFERENCES kabkota(id),
    FOREIGN KEY (jenis_faskes_id) REFERENCES jenis_faskes(id),
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

INSERT INTO provinsi (nama, ibukota, latitude, longitude) VALUES
('Jawa Barat', 'Bandung', -6.914744, 107.609810),
('DKI Jakarta', 'Jakarta', -6.208763, 106.845599);

INSERT INTO kabkota (nama, latitude, longitude, provinsi_id) VALUES
('Kota Bandung', -6.914744, 107.609810, 1),
('Kota Jakarta Selatan', -6.261492, 106.810600, 2);

INSERT INTO jenis_faskes (nama) VALUES
('Rumah Sakit'),
('Puskesmas'),
('Klinik');

INSERT INTO kategori (nama) VALUES
('Pemerintah'),
('Swasta');

INSERT INTO faskes (nama, nama_pengelola, alamat, website, email, kabkota_id, rating, latitude, longitude, jenis_faskes_id, kategori_id) VALUES
('RSUP Hasan Sadikin', 'Kemenkes', 'Jl. Pasteur No.38, Bandung', 'www.rshs.or.id', 'info@rshs.or.id', 1, 5, -6.902480, 107.618782, 1, 1),
('Puskesmas Kebayoran Baru', 'Pemprov DKI', 'Jl. Gandaria I, Jakarta Selatan', NULL, NULL, 2, 4, -6.244669, 106.790841, 2, 1),
('Klinik Sehat Sentosa', 'PT Sehat Abadi', 'Jl. Melati No.5, Bandung', NULL, 'kliniksehat@gmail.com', 1, 3, -6.921940, 107.634580, 3, 2);
