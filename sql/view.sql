#barang
CREATE VIEW new_barang AS 
SELECT * FROM barang;
UPDATE new_barang 
SET jumlah_stok = '3' 
WHERE id_barang = 1;

#peminjam
CREATE VIEW new_peminjam AS
SELECT * FROM peminjam;
INSERT INTO new_peminjam (nama_peminjam, no_telp)
VALUES ('nana', '081234567891');

#pembayaran
CREATE VIEW infopembayaran AS
SELECT p.id_pembayaran, p.total_bayar, b.harga_sewa
FROM pembayaran p
JOIN transaksi t ON p.id_transaksi = t.id_transaksi
JOIN barang b ON t.id_barang = b.id_barang;
SELECT * FROM infopembayaran;

#peminjaman
CREATE VIEW infopeminjaman AS
SELECT t.id_transaksi, b.nama_barang, p.nama_peminjam
FROM transaksi t
JOIN barang b ON t.id_barang = b.id_barang
JOIN peminjam p ON t.id_peminjam = p.id_peminjam;
SELECT * FROM infopeminjaman;

#transaksi
CREATE VIEW infotransaksi AS
SELECT t.id_transaksi, t.tgl_peminjaman, t.id_barang,b.nama_barang,
	b.harga_sewa,p.nama_peminjam,p.no_telp,t.tgl_pengembalian
FROM transaksi t
JOIN barang b ON t.id_barang = b.id_barang
JOIN peminjam p ON t.id_peminjam = p.id_peminjam;
SELECT * FROM infotransaksi;