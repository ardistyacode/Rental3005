<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Cak Ardis</title>
    <!-- Tambahkan CSS eksternal untuk tampilan yang lebih menarik -->
    <link rel="stylesheet" href="style.css">
    <!-- Tambahkan Font Awesome untuk simbol -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Tambahkan CSS untuk latar belakang yang menarik */
        body {
            background-color: #f4f4f4; /* Warna latar belakang yang menarik */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff; /* Warna latar belakang kontainer */
            padding: 30px;
            border-radius: 12px; /* Perbesar border */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Perbesar shadow */
            text-align: center;
            max-width: 800px; /* Lebar kontainer */
            width: 100%;
            display: flex;
            justify-content: space-between; /* Letakkan formulir dan daftar motor di sisi yang berlawanan */
        }
        .form-container {
            max-width: 400px; /* Lebar formulir */
            width: 100%;
            text-align: left;
        }
        h1 {
            margin-bottom: 30px;
        }
        /* Tambahkan CSS untuk tombol create */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        /* Tambahkan CSS untuk input */
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px); /* Penyesuaian lebar input */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        /* Tambahkan CSS untuk daftar motor */
        .motor-list {
            max-width: 400px; /* Lebar daftar motor */
            width: 100%;
            text-align: left;
            padding-left: 20px; /* Padding agar rapi */
        }
        .motor-list h2 {
            margin-bottom: 10px;
        }
        .motor-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1><i class="fas fa-motorcycle"></i> Rental Cak Ardis <i class="fas fa-motorcycle"></i></h1>
            <!-- Formulir untuk membuat data baru -->
            <form action="<?= BASE_URL . '/rental/store' ?>" method="post">
                <div class="form-group">
                    <label for="nama_penyewa"><i class="fas fa-user"></i> Nama Penyewa:</label>
                    <input type="text" id="nama_penyewa" name="nama_penyewa" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_hari"><i class="fas fa-calendar-alt"></i> Jumlah Hari:</label>
                    <input type="number" id="jumlah_hari" name="jumlah_hari" required>
                </div>
                <div class="form-group">
                    <label for="total_biaya"><i class="fas fa-money-bill-wave"></i> Total Biaya:</label>
                    <input type="number" id="total_biaya" name="total_biaya" required>
                </div>
                <div class="form-group">
                    <label for="jenis_motor_id"><i class="fas fa-motorcycle"></i> Jenis Motor:</label>
                    <input type="text" id="jenis_motor_id" name="jenis_motor_id" required>
                </div>
                <button type="submit"><i class="fas fa-check"></i> Create</button>
            </form>
        </div>
        <!-- Kolom untuk daftar motor -->
        <div class="motor-list">
            <h2><i class="fas fa-motorcycle"></i> Daftar Motor Tersedia</h2>
            <div class="motor-item">
                <p><strong>Motor 1:</strong> Yamaha NMAX = 2000</p>
            </div>
            <div class="motor-item">
                <p><strong>Motor 2:</strong> Honda PCX = 3000</p>
            </div>
            <div class="motor-item">
                <p><strong>Motor 3:</strong> Vespa = 4000</p>
            </div>
            <div class="motor-item">
                <p><strong>Motor 4:</strong> Honda Beat = 3000</p>
            </div>
            <div class="motor-item">
                <p><strong>Motor 5:</strong> Honda Vario = 3000</p>
            </div>
            <!-- Tambahkan motor lainnya sesuai kebutuhan -->
        </div>
    </div>
    
    <!-- Tambahkan SweetAlert2 untuk pesan yang menarik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Tambahkan JavaScript untuk menonaktifkan tombol setelah diklik -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.querySelector('form');
            form.addEventListener("submit", function() {
                var submitButton = form.querySelector('button[type="submit"]');
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>
