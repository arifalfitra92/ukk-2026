-- create_peminjams_table

CREATE TABLE IF NOT EXISTS `peminjam` (
    id_peminjam       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,\
    nis          INT(11) NOT NULL,
    nama_peminjam     VARCHAR(255) NOT NULL,
    kelas           VARCHAR?(255) NOT NULL,
    
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
