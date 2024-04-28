CREATE TABLE `admin` (
  `id_admin` integer PRIMARY KEY,
  `nama_admin` varchar(255),
  `no_telp_admin` varchar(255),
  `email` varchar(255)
);

CREATE TABLE `jenis_motor` (
  `id_jenis_motor` integer PRIMARY KEY,
  `nama_jenis_motor` varchar(255),
  `harga_sewa` integer,
  `deskripsi_jenis_motor` varchar(255)
);

CREATE TABLE `penyewaan` (
  `id_penyewaan` integer PRIMARY KEY,
  `nama_penyewa` varchar(255),
  `jumlah_hari` integer,
  `total_biaya` integer,
  `jenis_motor_id` integer
);

ALTER TABLE `penyewaan` ADD FOREIGN KEY (`jenis_motor_id`) REFERENCES `jenis_motor` (`id_jenis_motor`);
