<?php

include_once('./Models/student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
  $response = Student::create([
    'name' => $_POST['name'],
    'nis' => $_POST['nis']
  ]);

  setcookie('message', $response, time() + 5);
  header("Location: index.php");
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $student = Student::show($id);
}

if(isset($_POST['delete'])) {
  $response = Student::delete($_POST['id']);

  setcookie('message', $response, time() + 5);
  header("Location: index.php");
}

?>

  <!-- HEADER -->
  <?php include_once('./Layout/top.php'); ?>
  <?php include_once('./Layout/header.php'); ?>

    <!-- ALERT -->
    <?php if(isset($_COOKIE['message'])) : ?>
    <div class="p-3 bg-green-600 text-white mt-1 mb-2 mx-10 rounded-lg text-center">
      <p><?= $_COOKIE['message'] ?></p>
    </div>
    <?php endif ?>

    <div class="flex-grow flex flex-col sm:flex-row">
      <!-- INPUT DATA -->
      <div class="md:basis-2/5 lg:basis-1/4 m-5 p-7 bg-slate-100 rounded-lg shadow-xl max-h-[500px]">
        <form action="" method="POST">
          <h1 class="mb-3 text-center font-bold text-xl">XI RPL'56</h1>
          <hr class="border border-slate-600" />
          <h3 class="my-4 font-bold text-lg">Input Data Siswa</h3>
          <div class="mb-3">
            <label for="name"><span class="text-blue-500 font-bold">-</span> Nama</label>
            <input id="name" type="text" name="name" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full hover:shadow-lg" placeholder="Masukkan nama siswa/i" required />
          </div>
          <div class="mb-6">
            <label for="nis"><span class="text-blue-500 font-bold">-</span> Nis</label>
            <input id="nis" type="number" name="nis" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full hover:shadow-lg" placeholder="Masukkan nis siswa/i" required />
          </div>
          <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded" style="letter-spacing: 0.5px" name="submit" type="submit">KIRIM</button>
        </form>
      </div>

      <!-- TABEL -->
      <div class="md:basis-4/5 lg:basis-3/4 m-5">
        <div class="bg-slate-100 rounded-lg p-5 shadow-xl">
          <h1 class="mb-5 text-center font-bold text-xl">Tabel Nis Siswa</h1>
          <table class="w-full text-center">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="p-4 border border-black">No.</th>
                <th class="p-4 border border-black">Nama</th>
                <th class="p-4 border border-black">Nis</th>
                <th class="p-4 border border-black">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($students as $key => $student) : ?>
              <tr class="hover:bg-slate-200">
                <td class="p-3 border border-black"><?= $key + 1 ?></td>
                <td class="p-3 border border-black"><?= $student["name"] ?></td>
                <td class="p-3 border border-black"><?= $student["nis"] ?></td>
                <td class="p-3 border border-black">
                  
                  <!-- DETAIL -->
                  <button title="Detail" type="button" onclick="toggleModalDTL('<?= $student['id'] ?>'); return false;">
                    <a href="" class="px-3 py-2 bg-sky-500 text-white rounded hover:bg-sky-600"><i class="bi bi-person-lines-fill"></i></a>
                  </button>
                  <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modalDTL-<?= $student['id'] ?>">
                    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                      <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                      </div>
                      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="p-7">
                          <h1 class="mb-2 text-center font-bold text-xl">DETAIL</h1>
                          <hr class="border border-blue-500" />
                          <p class="font-bold mt-4">Nama:<span class="font-normal"> <?= $student['name'] ?></span></p>
                          <p class="font-bold">Nis:<span class="font-normal"> <?= $student['nis'] ?></span></p>
                          <p class="font-bold">Waktu input data:<span class="font-normal"> <?= $student['created_at'] ?></span></p>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 text-right">
                          <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2" onclick="toggleModalDTL('<?= $student['id'] ?>')">Kembali</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- EDIT -->
                  <button title="Edit"><a href="edit.php?id=<?= $student['id'] ?>"  class="px-3 py-2 bg-emerald-500 text-white rounded hover:bg-emerald-600"><i class="bi bi-pencil-square"></i></a></button>

                  <!-- DELETE -->
                  <button title="Hapus" type="button" onclick="toggleModalDLT('<?= $student['id'] ?>'); return false;">
                        <a href="" class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700"><i class="bi bi-trash3"></i></a>
                  </button>
                  <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modalDLT-<?= $student['id'] ?>">
                    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                      <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-75" />
                      </div>
                      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <form action="" method="POST" class="inline">
                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                          <div class="p-7">
                            <p>Anda yakin ingin menghapus<span class="font-bold"> <?= $student['name'] ?> </span> dengan Nis<span class="font-bold"> <?= $student['nis'] ?></span>?</p>
                          </div>
                          <div class="bg-gray-100 px-4 py-3 text-right">
                            <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-600 mr-2" onclick="toggleModalDLT('<?= $student['id'] ?>')">Batal</button>
                            <button type="submit" name="delete" class="py-2 px-4 bg-red-600 text-white rounded hover:bg-red-700 mr-2">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <!-- FOOTER -->
  <?php include_once('./Layout/footer.php'); ?>

  <!-- JAVASCRIPT -->
  <script>
    function toggleModalDTL(studentId) { 
      document.getElementById('modalDTL-' + studentId).classList.toggle('hidden')
    }
    function toggleModalDLT(studentId) { 
      document.getElementById('modalDLT-' + studentId).classList.toggle('hidden')
    }
  </script>
  
  <!-- BOTTOM -->
  <?php include_once('./Layout/bottom.php'); ?>