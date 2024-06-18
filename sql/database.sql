-- Membuat tabel barang
CREATE TABLE barang (
    id_barang INT PRIMARY KEY AUTO_INCREMENT,
    nama_barang VARCHAR(50) NOT NULL,
    jumlah_stok INT NOT NULL,
    harga_sewa INT NOT NULL
);
INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_stok`, `harga_sewa`) VALUES
(1, 'gendang', 5, 34000),
(2, 'Seruling', 3, 18000),
(3, 'piano', 3, 20000),
(4, 'drum', 1, 5000),
(5, 'flute', 1, 5000),
(6, 'sitar', 3, 15000),
(7, 'harmonika', 1, 20000),
(8, 'saxophone', 4, 25000),
(9, 'terompet', 2, 10000),
(10, 'cajon', 1, 15000),
(11, 'harpa', 2, 10000),
(12, 'trombon', 3, 5000),
(13, 'clarinet', 2, 20000),
(14, 'akordion', 2, 25000),
(15, 'tabla', 1, 10000),
(16, 'xylophone', 1, 5000),
(17, 'violoncello', 3, 15000),
(18, 'gong', 2, 20000),
(19, 'mandolin', 1, 15000),
(20, 'marakas', 2, 5000),
(21, 'ukulele', 5, 10000),
(22, 'ukulele', 5, 10000);

-- Membuat tabel peminjam
CREATE TABLE peminjam (
    id_peminjam INT PRIMARY KEY AUTO_INCREMENT,
    nama_peminjam VARCHAR(255) NOT NULL,
    no_telp VARCHAR(20) NOT NULL
);
INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `no_telp`) VALUES
(1, 'budi', '081234567890'),
(2, 'siti', '085678901234'),
(3, 'joko', '087654321098'),
(4, 'ani', '089012345678'),
(5, 'dian', '082345678901'),
(6, 'rudi', '084567890123'),
(7, 'dewi', '088765432109'),
(8, 'hadi', '083456789012'),
(9, 'rina', '086789012345'),
(10, 'andi', '080123456789'),
(11, 'nita', '081345678901'),
(12, 'agus', '085678901234'),
(13, 'maya', '087890123456'),
(14, 'anto', '082123456789'),
(15, 'lina', '084567890123'),
(16, 'bambang', '088901234567'),
(17, 'nita', '083234567890'),
(18, 'eka', '086789012345'),
(19, 'dini', '080456789012'),
(20, 'aprilia', '081234567891'),
(21, 'key', '081234567871'),
(22, 'roy', '081234567841'),
(23, 'Nana', '12345689910'),
(24, 'ry', '081234567541'),
(25, 'Nana', '1234568910'),
(26, 'Ayu', '09876542356'),
(27, 'John Doe', '081234567890'),
(28, 'John Doe', '081234567890'),
(29, 'Ayu', '09876542356'),
(30, 'Ayu', '09876542356'),
(31, 'Ayu', '09876542356'),
(32, 'Ayu', '09876542356'),
(33, 'Ayu', '09876542356'),
(34, 'Ayu', '09876542356'),
(35, 'Ayu', '09876542356'),
(36, 'Ayu', '09876542356'),
(37, 'Ayu', '09876542356'),
(38, 'Ayu', '09876542356'),
(39, 'Ayu', '09876542356'),
(40, 'Ayu', '09876542356'),
(41, 'Ayu', '09876542356');

-- Membuat tabel transaksi
CREATE TABLE transaksi (
    id_transaksi INT PRIMARY KEY AUTO_INCREMENT,
    tgl_peminjaman DATE NOT NULL,
    id_barang INT,
    id_peminjam INT,
    tgl_pengembalian DATE,
    FOREIGN KEY (id_barang) REFERENCES barang(id_barang),
    FOREIGN KEY (id_peminjam) REFERENCES peminjam(id_peminjam)
);

INSERT INTO `transaksi` (`id_transaksi`, `tgl_peminjaman`, `id_barang`, `id_peminjam`, `tgl_pengembalian`) VALUES
(1, '2024-01-01', 1, 1, '2024-01-02'),
(2, '2024-01-02', 2, 2, '2024-01-03'),
(3, '2024-01-03', 3, 3, '2024-01-04'),
(4, '2024-02-01', 4, 4, '2024-02-02'),
(5, '2024-03-28', 5, 5, '2024-03-29'),
(6, '2024-02-20', 6, 6, '2024-02-21'),
(7, '2024-02-05', 7, 7, '2024-02-06'),
(8, '2024-02-19', 8, 8, '2024-02-20'),
(9, '2024-02-15', 9, 9, '2024-02-16'),
(10, '2024-03-04', 10, 10, '2024-03-05'),
(12, '2024-03-26', 12, 12, '2024-03-27'),
(13, '2024-03-21', 13, 13, '2024-03-18'),
(14, '2024-02-28', 14, 14, '2024-02-29'),
(15, '2024-02-23', 15, 15, '2024-02-24'),
(16, '2024-03-16', 16, 16, '2024-03-17'),
(17, '2024-03-24', 17, 17, '2024-03-25'),
(18, '2024-01-31', 18, 18, '2024-02-01'),
(19, '2024-01-23', 19, 19, '2024-01-24'),
(20, '2024-03-05', 20, 20, '2024-03-05'),
(21, '2024-05-01', 1, 7, '2024-05-02'),
(22, '2024-01-30', 3, 20, '2024-05-02'),
(23, '2024-05-02', 18, 20, '2024-05-03'),
(24, '2024-05-27', 7, 20, '2024-05-30'),
(25, '2024-05-22', 10, 5, '2024-05-22'),
(26, '2024-05-21', 10, 4, '2024-05-23');


-- Membuat tabel pembayaran
CREATE TABLE pembayaran (
    id_pembayaran INT PRIMARY KEY AUTO_INCREMENT,
    id_transaksi INT,
    jumlah_bayar INT NOT NULL,
    tanggal_bayar DATE NOT NULL,
    FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi)
);
INSERT INTO `pembayaran` (`id_pembayaran`, `id_transaksi`, `total_bayar`) VALUES
(1, 1, '20000.00'),
(2, 2, '35000.00'),
(3, 3, '35000.00'),
(4, 4, '60000.00'),
(5, 5, '5000.00'),
(6, 6, '15000.00'),
(7, 2, '35000.00'),
(8, 4, '60000.00'),
(9, 1, '20000.00'),
(10, 3, '35000.00'),
(12, 12, '5000.00'),
(13, 13, '20000.00'),
(14, 14, '25000.00'),
(15, 15, '10000.00'),
(16, 16, '5000.00'),
(17, 17, '15000.00'),
(18, 18, '20000.00'),
(19, 19, '15000.00'),
(20, 20, '5000.00');

-- Membuat tabel laporan_peminjaman
CREATE TABLE laporan_peminjaman (
    id_laporan INT PRIMARY KEY AUTO_INCREMENT,
    id_pembayaran INT,
    keterangan VARCHAR(255),
    FOREIGN KEY (id_pembayaran) REFERENCES pembayaran(id_pembayaran)
);
INSERT INTO `laporan_peminjaman` (`id_peminjaman`, `id_pembayaran`, `id_transaksi`, `nama_peminjam`, `nama_barang`, `no_telp`) VALUES
(1, 1, 1, 'budi', 'gendang', '081234567890'),
(2, 2, 2, 'siti', 'Seruling', '085678901234'),
(3, 3, 3, 'joko', 'piano', '087654321098'),
(4, 4, 4, 'ani', 'drum', '089012345678'),
(5, 5, 5, 'dian', 'flute', '082345678901'),
(6, 6, 6, 'rudi', 'sitar', '084567890123'),
(7, 7, 7, 'siti', 'Seruling', '085678901234'),
(8, 8, 8, 'ani', 'drum', '089012345678'),
(9, 9, 9, 'budi', 'gendang', '081234567890'),
(10, 10, 10, 'joko', 'piano', '087654321098'),
(12, 12, 12, 'agus', 'trombon', '085678901234'),
(13, 13, 13, 'maya', 'clarinet', '087890123456'),
(14, 14, 14, 'anto', 'akordion', '082123456789'),
(15, 15, 15, 'lina', 'tabla', '084567890123'),
(16, 16, 16, 'bambang', 'xylophone', '088901234567'),
(17, 17, 17, 'nita', 'violoncello', '083234567890'),
(18, 18, 18, 'eka', 'gong', '086789012345'),
(19, 19, 19, 'dini', 'mandolin', '080456789012'),
(20, 20, 20, 'aprilia', 'marakas', '081234567891');

-- membuat tabel log_peminjaman--
CREATE TABLE `log_peminjam` (
  `log_id` INT(10) NOT NULL,
  `id_peminjam` INT(11) NOT NULL,
  `nama_peminjam` VARCHAR(255) NOT NULL,
  `no_telp` VARCHAR(20) NOT NULL
);
INSERT INTO `log_peminjam` (`log_id`, `id_peminjam`, `nama_peminjam`, `no_telp`) VALUES
(1, 21, 'keya', '081234567871'),
(2, 22, 'roy', '081234567841'),
(3, 23, 'Nana', '12345689910'),
(4, 24, 'ry', '081234567541'),
(5, 25, 'Nana', '1234568910'),
(6, 26, 'Ayu', '09876542356'),
(7, 27, 'John Doe', '081234567890'),
(8, 28, 'John Doe', '081234567890'),
(9, 29, 'Ayu', '09876542356'),
(10, 30, 'Ayu', '09876542356'),
(11, 31, 'Ayu', '09876542356'),
(12, 32, 'Ayu', '09876542356'),
(13, 33, 'Ayu', '09876542356'),
(16, 36, 'Ayu', '09876542356'),
(22, 43, 'dia', '0987654321'),
(23, 44, 'kamu', '0678542765'),
(25, 46, 'Aprilia', '08552435689'),
(26, 47, 'putri', '087654321'),
(27, 41, 'Ayu', '09876542356');