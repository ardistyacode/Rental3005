<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Masukkan elemen head yang diperlukan di sini -->
</head>
<body>
    <!-- Formulir untuk membuat data baru -->
    <form action="<?= BASE_URL . '/rental/store' ?>" method="post">
        <label for="nama_penyewa">Nama Penyewa:</label>
        <input type="text" id="nama_penyewa" name="nama_penyewa">
        <label for="jumlah_hari">Jumlah Hari:</label>
        <input  type="number" id="jumlah_hari" name="jumlah_hari">
        <label for="total_biaya">total biaya:</label>
        <input type="number" id="total_biaya" name="total_biaya">
        <label for="jenis_motor_id">Jenis Motor:</label>
        <input type="text" id="jenis_motor_id" name="jenis_motor_id">
        <button type="submit">Create</button>
    </form>
        <!-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.querySelector('form');
                form.addEventListener("submit", function() {
                    var submitButton = form.querySelector('button[type="submit"]');
                    submitButton.disabled = true;
                });
            });
        </script>     -->
    <script src="sweetalert2.all.min.js"></script>
</body>

</html>
