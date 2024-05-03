<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
</head>
<body>
    <!-- component -->
<div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>

      <!-- Sidebar backdrop -->
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>

      <!-- Sidebar -->
      <?php include'../views/pages/layouts/sidebar.blade.php'; ?>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Navbar -->
        <?php include'../views/pages/layouts/header.blade.php'; ?>
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
            <div class="space-y-6 md:space-x-2 md:space-y-0">
              <a
              href="https://github.com/Kamona-WD/starter-dashboard-layout"
              target="_blank"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-200 rounded-md shadow hover:bg-opacity-20"
            >
              <span>
                <svg class="w-4 h-4 text-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                  ></path>
                </svg>
              </span>
              <span>View on Github</span>
            </a>
            <a
              href="https://kamona-wd.github.io/kwd-dashboard/"
              target="_blank"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow animate-bounce hover:bg-red-600"
            >
              <span>See Dark & Light version</span>
            </a>
            </div>
          </div>

          <!-- Deskripsi Motor -->
          <div class="mt-6">
            <h2 class="text-lg font-medium text-gray-700">Deskripsi Motor</h2>
            <div id="deskripsi_motor" class="mt-1 px-3 py-2 bg-gray-100 border border-gray-300 rounded-md">
              <!-- Input untuk mengunggah gambar -->
              <div>
                <input type="file" accept="image/*" onchange="previewImage(this, 'previewImage')"> <br>
                <img id="previewImage" src="" alt="Preview Image" style="max-width: 200px;"> <br>
                <!-- Textarea untuk deskripsi -->
                <textarea id="deskripsiTextarea" class="mt-2 px-3 py-2 w-full border border-gray-300 rounded-md" placeholder="Deskripsi"></textarea>
              </div>
              <!-- Tombol Save dan Edit -->
              <div class="flex mt-2 space-x-4">
                <button id="saveButton" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Save</button>
                <button id="editButton" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</button>
              </div>
            </div>
          </div>

          <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
          <div class="w-full flex justify-between">
            <h3 class="mt-6 text-xl">Rental</h3>
            <div class="flex items-center space-x-2"> <!-- Baris baru untuk tombol "Tambah data" -->
                <a href="<?= BASE_URL . '/rental/create' ?>">
                    <button class="border border-blue-500 text-white bg-blue-500 rounded-md px-4 py-2 hover:bg-blue-600 hover:border-blue-600">Tambah data</button>
                </a>
                <!-- Tambahkan spasi vertikal -->
                <div class="border-t border-gray-300 h-0 w-0"></div>
                <!-- Tambahkan elemen lainnya di sini jika diperlukan -->
            </div>
          </div>
          
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          No
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Nama Penyewa
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Jumlah Hari
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Jenis Biaya
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Jenis Motor
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        ></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $no=1;
                        foreach($rental as $rentals): ?>
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">                              
                              <div class="">
                                <div class="text-sm font-medium text-gray-900"><?= $no++; ?></div>                                
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?= $rentals['nama_penyewa'] ?></div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                              <?= $rentals['jumlah_hari'] ?>
                            </span>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?= $rentals['total_biaya'] ?></td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            <?php if(isset($rentals['jenis_motor_id'])): ?>
                              <?= $rentals['jenis_motor_id'] ?>
                            <?php endif; ?>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <a href="<?= BASE_URL . '/rental/edit/' . $rentals['id_penyewaan'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>  
                          <!-- Tombol Hapus dengan konfirmasi -->
                          <a href="<?= BASE_URL . '/rental/delete/' . $rentals['id_penyewaan'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')" class="text-red-600 hover:text-red-900">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- Main footer -->
        <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
          <div>K-WD &copy; 2020</div>
          <div class="text-sm">
            Made by
            <a
              class="text-blue-400 underline"
              href="https://github.com/Kamona-WD"
              target="_blank"
              rel="noopener noreferrer"
              >Ahmed Kamel</a
            >
          </div>
          <div>
            <!-- Github svg -->
            <a
              href="https://github.com/Kamona-WD/starter-dashboard-layout"
              target="_blank"
              class="flex items-center space-x-1"
            >
              <svg class="w-6 h-6 text-gray-400" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                <path
                  fill-rule="evenodd"
                  d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                ></path>
              </svg>
              <span class="hidden text-sm md:block">View on Github</span>
            </a>
          </div>
        </footer>
      </div>

      <!-- Setting panel button -->
      <div>
        <button
          @click="isSettingsPanelOpen = true"
          class="fixed right-0 px-4 py-2 text-sm font-medium text-white uppercase transform rotate-90 translate-x-8 bg-gray-600 top-1/2 rounded-b-md"
        >
          Settings
        </button>
      </div>

      <!-- Settings panel -->
      <div
        x-show="isSettingsPanelOpen"
        @click.away="isSettingsPanelOpen = false"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        <div class="flex items-center justify-between flex-shrink-0 p-2">
          <h6 class="p-2 text-lg">Settings</h6>
          <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
            <svg
              class="w-6 h-6 text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
          <span>Settings Content</span>
          <!-- Settings Panel Content ... -->
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }

      // Fungsi untuk menampilkan preview gambar
      function previewImage(input, imgId) {
        const preview = document.getElementById(imgId);
        if (input.files && input.files[0]) {
          const reader = new FileReader();

          reader.onload = function(e) {
            preview.src = e.target.result;
          }

          reader.readAsDataURL(input.files[0]); // Convert to base64 string
        } else {
          preview.src = "";
        }
      }
    </script>
</div>
</body>
</html>
