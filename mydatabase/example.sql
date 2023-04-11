CREATE TABLE
    `tbl_role` (
        role_id INT(11) PRIMARY KEY AUTO_INCREMENT,
        role_name VARCHAR(50) UNIQUE NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    );

CREATE TABLE
    `tbl_user` (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        role_id INT(11) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL,
        CONSTRAINT fk_user_role FOREIGN KEY (role_id) REFERENCES tbl_role(role_id) ON UPDATE CASCADE ON DELETE CASCADE
    );

-- Can't create table `mytugas`.`tb_user` (errno: 150 "Foreign key constraint is incorrectly formed")


CREATE TABLE
    IF NOT EXISTS `tbl_harga` (
        `id_harga` int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `harga` decimal(7, 0) DEFAULT NULL,
        `uid` int(5) DEFAULT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    );

CREATE TABLE
    IF NOT EXISTS `tbl_nominal` (
        `id_nominal` int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `nominal` varchar(12) DEFAULT NULL,
        `uid` int(5) DEFAULT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    );

CREATE TABLE
    IF NOT EXISTS `tbl_pelanggan` (
        `id_pelanggan` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `nama_pelanggan` varchar(50) DEFAULT NULL,
        `alamat` varchar(100) DEFAULT NULL,
        `no_telpn` varchar(15) DEFAULT NULL,
        `uid` int(5) DEFAULT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    );

CREATE TABLE
    IF NOT EXISTS `tbl_transaksi` (
        `id_transaksi` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `kode_transaksi` varchar(15) DEFAULT NULL,
        `no_telp` varchar(15) DEFAULT NULL,
        `id_pelanggan` int(11) DEFAULT NULL,
        `id_nominal` int(30) DEFAULT NULL,
        `id_harga` int(30) DEFAULT NULL,
        `uid` int(5) DEFAULT NULL,
        `status` enum('LUNAS', 'HUTANG') DEFAULT NULL,
        `tgl_transaksi` datetime DEFAULT NULL,
        `tgl_tempo` datetime NOT NULL,
        `tgl_bayar` datetime DEFAULT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    );

-- INSERT INTO `tbl_role` (`role_name`) VALUES 
-- (`admin`);