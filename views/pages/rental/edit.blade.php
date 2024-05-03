<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Rental</h1>
        <form action="<?= BASE_URL . '/rental/update/' . $rental['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="nama_penyewa" class="block text-gray-700 text-sm font-bold mb-2">Nama Penyewa:</label>
                <input type="text" id="nama_penyewa" name="nama_penyewa" value="<?= $rental['nama_penyewa'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="jumlah_hari" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Hari:</label>
                <input type="number" id="jumlah_hari" name="jumlah_hari" value="<?= $rental['jumlah_hari'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="total_biaya" class="block text-gray-700 text-sm font-bold mb-2">Total Biaya:</label>
                <input type="number" id="total_biaya" name="total_biaya" value="<?= $rental['total_biaya'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                <a href="<?= BASE_URL . '/rental' ?>" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
