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
    public function store(){
        // $fields = [
        //     'nama_penyewa' => 'required',
        //     'jumlah_hari' => 'int',
        //     'total_biaya' => 'int',
        //     'jenis_motor_id' => 'int',
        // ];

        // $message = [
        //     'nama_penyewa' => [
        //         'required' => 'Nama penyewa harus diisi',
        //     ], 
        // ];

        // [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        // if (($inputs['jenis_motor_id']) == '') {
        //     $inputs['jenis_motor_id'] = 1;
        // }

        // var_dump($inputs);

        // if ($errors) {
        //     Message::setFlash('error', 'Data gagal ditambahkan', $errors[0], $inputs);
        //     $this->redirect('rental/create');
        // }

        // $proc = $this->rental->insert($inputs);
        // if ($proc) {
        //     Message::setFlash('success', 'Berhasil!', 'Data berhasil ditambahkan', $inputs);
        //     $this->redirect('rental/list');
        // }

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // var_dump($_POST );
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




        // $proc = $this->rental->insert($data);
    }
}