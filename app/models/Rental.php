<?php

class Rental extends Model {
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('penyewaan');
        $this->setColumn([
            'id_penyewaan',
            'nama_penyewa',
            'jumlah_hari',
            'total_biaya',
            'jenis_motor_id',
        ]);
    }

    public function getAllData(){
        return  $this->get()->fetchAll();
    }

    public function insert($data)
    {
        // $query = 'INSERT INTO barang (nama_barang, jumlah, harga_satuan, expire_date) VALUES (?, ?, ?, ?)';
        // return $this->qry($query, [
        //     $data['nama_barang'],
        //     $data['jumlah'],
        //     $data['harga_satuan'],
        //     $data['kadaluarsa'],
        // ]);
        $table =[
            'nama_penyewa' => $data['nama_penyewa'],
            'jumlah_hari' => $data['jumlah_hari'],
            'total_biaya' => $data['total_biaya'],
            'jenis_motor_id' => $data['jenis_motor_id'],
        ];
        return $this->insertData($table);
    }

}