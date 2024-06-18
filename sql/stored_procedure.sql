#STORED PROCEDURE

#barang
DELIMITER //
CREATE PROCEDURE semua_barang(
    IN id_barang_ INT
)
BEGIN
    IF id_barang_ IS NULL THEN
        SELECT * FROM barang;
    ELSE
        SELECT * FROM barang WHERE id_barang = id_barang_;
    END IF;
END//
DELIMITER ;
CALL semua_barang(NULL);


#peminjam
DELIMITER //
CREATE PROCEDURE tambah_data(
    IN nama_peminjam_baru VARCHAR(255),
    IN notlp_baru VARCHAR(20)
)
BEGIN
    INSERT INTO peminjam (nama_peminjam, no_telp)
    VALUES (nama_peminjam_baru, notlp_baru);
END//
CALL tambah_data ('Ayu', '09876542356');
SELECT * FROM peminjam;


#pembayaran
DELIMITER //

CREATE PROCEDURE tampilkan_pembayaran(
    IN id_start INT,
    IN id_end INT
)
BEGIN
    -- Seleksi data pembayaran antara id_start dan id_end
    SELECT id_pembayaran, id_transaksi, total_bayar
    FROM pembayaran
    WHERE id_pembayaran BETWEEN id_start AND id_end;
END //

DELIMITER ;
CALL tampilkan_pembayaran(1, 5);


#transaksi
DELIMITER //
CREATE PROCEDURE Hapus_Transaksi(
    IN p_id_transaksi INT
)
BEGIN
    DECLARE is_exists INT;
    SELECT COUNT(*) INTO is_exists FROM laporan_peminjaman 
    INNER JOIN pembayaran ON laporan_peminjaman.id_pembayaran = pembayaran.id_pembayaran
    INNER JOIN transaksi ON pembayaran.id_transaksi = transaksi.id_transaksi
    WHERE transaksi.id_transaksi = p_id_transaksi;
    
    IF is_exists > 0 THEN
        DELETE FROM laporan_peminjaman 
        WHERE id_pembayaran IN (SELECT id_pembayaran FROM pembayaran WHERE id_transaksi = p_id_transaksi);
    END IF;
    
    DELETE FROM pembayaran WHERE id_transaksi = p_id_transaksi;
    DELETE FROM transaksi WHERE id_transaksi = p_id_transaksi;
    
END //
DELIMITER ;
CALL Hapus_Transaksi(27);
SELECT * FROM transaksi;


#laporan peminjaman
DELIMITER //
CREATE PROCEDURE tampilkan_laporan_peminjaman()
BEGIN
    DECLARE id_sekarang INT;
    DECLARE query_dinamis VARCHAR(500);  
    
    -- Inisialisasi untuk menghindari infinite loop
    SET id_sekarang = 1;
    SET query_dinamis = 'SELECT * FROM laporan_peminjaman WHERE id_peminjaman IN (';

    -- Looping untuk mengambil data peminjaman dari id 1 sampai 10
    WHILE id_sekarang <= 10 DO
        SET query_dinamis = CONCAT(query_dinamis, id_sekarang);
        SET id_sekarang = id_sekarang + 1;
        
        IF id_sekarang <= 10 THEN
            SET query_dinamis = CONCAT(query_dinamis, ', ');
        END IF;
    END WHILE;
    SET query_dinamis = CONCAT(query_dinamis, ');');

    -- Eksekusi query dinamis
    PREPARE ket FROM query_dinamis;
    EXECUTE ket;
    DEALLOCATE PREPARE ket;
END //
DELIMITER ;
CALL tampilkan_laporan_peminjaman();