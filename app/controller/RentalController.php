<?php

class RentalController extends Controller {
    private $rental;

    public function __construct() {
        $this->rental = $this->model('Rental');
    }

    public function index(){
        $data = [
            'judul' => 'Rentall PS Ardist',
            'rental' => $this->rental->getAllData()
        ];

        $this->view('pages/rental/list', $data);
    }

    public function create(){
        $data = [
            'judul' => 'Rentall PS Ardist',
            'rental' => $this->rental->getAllData()
        ];

        $this->view('pages/rental/create', $data);
    }

    public function edit($id){
        // Mengambil data rental berdasarkan ID
        $rental = $this->rental->getDataById($id);

        // Memeriksa apakah data rental ditemukan
        if (!$rental) {
            // Jika tidak ditemukan, mungkin hendak dilakukan redirect atau menampilkan pesan kesalahan
            echo "Data rental tidak ditemukan";
            // Atau bisa diarahkan ke halaman list
            // $this->redirect('/rental');
            exit;
        }

        // Menyiapkan data untuk ditampilkan dalam formulir edit
        $data = [
            'judul' => 'Rentall PS Ardist - Edit Data',
            'rental' => $rental
        ];

        // Render view untuk formulir edit dengan data rental
        $this->view('pages/rental/edit', $data);
    }

    public function deleteConfirmation($id){
        // Mengambil data rental berdasarkan ID untuk ditampilkan dalam konfirmasi
        $rental = $this->rental->getDataById($id);

        if (!$rental) {
            // Jika data tidak ditemukan, bisa lakukan redirect atau tampilkan pesan error
            echo "Data tidak ditemukan";
            // Atau bisa diarahkan ke halaman list
            // $this->redirect('/rental');
            exit;
        }

        $data = [
            'judul' => 'Konfirmasi Penghapusan',
            'rental' => $rental
        ];

        $this->view('pages/rental/confirm_delete', $data);
    }

    public function delete($id){
        // Proses penghapusan data berdasarkan ID
        $deleted = $this->rental->deleteData($id);

        if($deleted){
            // Jika penghapusan berhasil, arahkan kembali ke halaman list atau halaman lainnya
            header('Location: ' . BASE_URL . '/rental');
            exit;
        } else {
            // Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
            echo 'Delete gagal';
        }
    }

    public function store(){
        // Validasi data

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // Proses penyimpanan data
            $namaPenyewa = $_POST['nama_penyewa'];
            $jumlahHari = $_POST['jumlah_hari'];
            $totalBiaya = $_POST['total_biaya'];
            $jenisMotorId = $_POST['jenis_motor_id'];

            $data = [
                'nama_penyewa'=> $namaPenyewa,
                'jumlah_hari' => $jumlahHari,
                'total_biaya'=> $totalBiaya,
                'jenis_motor_id' => $jenisMotorId,
            ];

            $result = $this->rental->insert($data);
            if ($result) {
                $this->redirect('/rental');
            } else {
                echo 'Data gagal disimpan';
            }
        }
    }
}

?>
