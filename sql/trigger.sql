#trigger
CREATE TABLE log_peminjam (
  log_id INT(10) NOT NULL AUTO_INCREMENT,
  id_peminjam INT(11) NOT NULL,
  nama_peminjam VARCHAR(255) NOT NULL,
  no_telp VARCHAR(20) NOT NULL,
  PRIMARY KEY (log_id)
);

#
CREATE TRIGGER trg_log_peminjam_insert
AFTER INSERT ON log_peminjam
FOR EACH ROW
BEGIN
  INSERT INTO log_peminjam_audit (log_id, id_peminjam, nama_peminjam, no_telp, action_type)
  VALUES (NEW.log_id, NEW.id_peminjam, NEW.nama_peminjam, NEW.no_telp, 'INSERT');
END;
//

#
CREATE TRIGGER trg_log_peminjam_update
AFTER UPDATE ON log_peminjam
FOR EACH ROW
BEGIN
  INSERT INTO log_peminjam_audit (log_id, id_peminjam, nama_peminjam, no_telp, action_type)
  VALUES (NEW.log_id, NEW.id_peminjam, NEW.nama_peminjam, NEW.no_telp, 'UPDATE');
END;
//

#
CREATE TRIGGER trg_log_peminjam_delete
AFTER DELETE ON log_peminjam
FOR EACH ROW
BEGIN
  INSERT INTO log_peminjam_audit (log_id, id_peminjam, nama_peminjam, no_telp, action_type)
  VALUES (OLD.log_id, OLD.id_peminjam, OLD.nama_peminjam, OLD.no_telp, 'DELETE');
END;
//