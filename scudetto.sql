CREATE OR REPLACE TABLE USER(
id_user CHAR(8),
nama_user VARCHAR(50),
pasword_user VARCHAR(50),
no_tlp_user VARCHAR(13),
email_user VARCHAR(50),
jk_user BOOLEAN,
alamat_user VARCHAR(100),
jabatan_user VARCHAR(50),
status_user BOOLEAN,
PRIMARY KEY (id_user));

CREATE OR REPLACE TABLE user_seq(
hitung INT NOT NULL AUTO_INCREMENT KEY
);

DELIMITER $$
CREATE OR REPLACE TRIGGER auto_id_user
BEFORE INSERT ON USER 
FOR EACH ROW
BEGIN 
	INSERT INTO user_seq VALUES ('');
	SELECT MAX(hitung) INTO @ID
	FROM user_seq;
	IF(@ID > 1)THEN
		SET new.id_user=CONCAT('USER-',LPAD(@ID,3,'0'));
	ELSE
		SET new.id_user=CONCAT('USER-',LPAD(1,3,'0'));
	END IF;
END $$
DELIMITER ;

CREATE OR REPLACE TABLE katalog(
id_katalog CHAR(8),
nama_katalog VARCHAR(50) NOT NULL,
status_katalog BOOLEAN NOT NULL,
foto_katalog VARCHAR(100),
PRIMARY KEY (id_katalog));

CREATE OR REPLACE TABLE katalog_seq(
hitung INT NOT NULL AUTO_INCREMENT KEY
);

DELIMITER $$
CREATE OR REPLACE TRIGGER auto_id_katalog
BEFORE INSERT ON katalog 
FOR EACH ROW
BEGIN 
	INSERT INTO katalog_seq VALUES ('');
	SELECT MAX(hitung) INTO @ID
	FROM katalog_seq;
	IF(@ID > 1)THEN
		SET new.id_katalog=CONCAT('KTLG-',LPAD(@ID,3,'0'));
	ELSE
		SET new.id_katalog=CONCAT('KTLG-',LPAD(1,3,'0'));
	END IF;
END $$
DELIMITER ;

CREATE OR REPLACE TABLE kategori(
id_kategori CHAR(8),
id_katalog CHAR(8),
nama_kategori VARCHAR(50) NOT NULL,
status_kategori BOOLEAN NOT NULL,
PRIMARY KEY (id_kategori),
CONSTRAINT FOREIGN KEY(id_katalog) REFERENCES katalog(id_katalog)
);

CREATE OR REPLACE TABLE kategori_seq(
hitung INT NOT NULL AUTO_INCREMENT KEY
);

DELIMITER $$
CREATE OR REPLACE TRIGGER auto_id_kategori
BEFORE INSERT ON kategori 
FOR EACH ROW
BEGIN 
	INSERT INTO kategori_seq VALUES ('');
	SELECT MAX(hitung) INTO @ID
	FROM kategori_seq;
	IF(@ID > 1)THEN
		SET new.id_kategori=CONCAT('KTGR-',LPAD(@ID,3,'0'));
	ELSE
		SET new.id_kategori=CONCAT('KTGR-',LPAD(1,3,'0'));
	END IF;
END $$
DELIMITER ;

CREATE OR REPLACE TABLE produk(
id_produk CHAR(13),
id_kategori CHAR(8),
tgl_produk DATE,
nama_produk VARCHAR(100) NOT NULL,
harga_produk INT NOT NULL,
stok_produk INT NOT NULL,
foto_produk VARCHAR(100),
keterangan_produk TEXT(200),
ukuran_produk VARCHAR(20),
status_produk BOOLEAN NOT NULL,
PRIMARY KEY (id_produk),
CONSTRAINT FOREIGN KEY(id_kategori) REFERENCES kategori(id_kategori)
);

DELIMITER $$
CREATE OR REPLACE TRIGGER auto_id_produk
BEFORE INSERT ON produk 
FOR EACH ROW
BEGIN 
	SELECT COUNT(*) INTO @ID
	FROM produk
	WHERE tgl_produk = new.tgl_produk;
	SET new.id_produk=CONCAT("P",YEAR(new.tgl_produk),LPAD(MONTH(new.tgl_produk),2,"0"),LPAD(DAY(new.tgl_produk),2,"0"),"-",LPAD(@ID+1,3,'0'));
END $$
DELIMITER ;

INSERT INTO produk (id_kategori,tgl,nama,harga,stok,STATUS) VALUES ("KTGR-001","2020-12-18","Teguh",5,66,"0");

CREATE OR REPLACE TABLE penjualan(
id_penjualan CHAR(17),
id_user CHAR(8),
tgl_penjualan DATE,
total_pembayaran INT,
PRIMARY KEY(id_penjualan),
CONSTRAINT FOREIGN KEY(id_user) REFERENCES USER(id_user)
);

DELIMITER $$
CREATE OR REPLACE TRIGGER auto_id_penjualan
BEFORE INSERT ON penjualan 
FOR EACH ROW
BEGIN 
	SELECT COUNT(*) INTO @ID
	FROM penjualan
	WHERE tgl_penjualan = new.tgl_penjualan;
	SET new.id_penjualan=CONCAT("NOTA-",YEAR(new.tgl_penjualan),LPAD(MONTH(new.tgl_penjualan),2,"0"),LPAD(DAY(new.tgl_penjualan),2,"0"),"-",LPAD(@ID+1,3,'0'));
END $$
DELIMITER ;

CREATE OR REPLACE TABLE detail_penjualan(
id_penjualan CHAR(17) NOT NULL,
id_produk CHAR(13) NOT NULL,
jumlah_produk INT,
harga_jual_produk INT,
diskon_produk INT,
total_harga_produk INT,
PRIMARY KEY(id_penjualan, id_produk),
CONSTRAINT FOREIGN KEY(id_penjualan) REFERENCES penjualan(id_penjualan),
CONSTRAINT FOREIGN KEY(id_produk) REFERENCES produk(id_produk)
);