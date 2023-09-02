<?php

include_once('./Models/student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
  $response = Student::create([
    'name' => $_POST['name'],
    'nis' => $_POST['nis']
  ]);

  setcookie('message', $response, time() + 10);
  header("Location: index.php");
}

if(isset($_POST['delete'])) {
  $response = Student::delete($_POST['id']);

  setcookie('message', $response, time() + 10);
  header("Location: index.php");
}

?>

    <?php include_once('./Layout/top.php'); ?>
    <?php include_once('./Layout/header.php'); ?>

    <?php if(isset($_COOKIE['message'])) : ?>
    <div class="p-3 bg-sky-500 text-white m-3 rounded-lg text-center">
      <p><?= $_COOKIE['message'] ?></p>
    </div>
    <?php endif ?>

    <div class="flex-grow flex flex-col sm:flex-row">
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
                   <button title="Detail"><a href="detail.php?id=<?= $student["id"] ?>" class="px-3 py-2 bg-sky-500 text-white rounded hover:bg-sky-600" ><i class="bi bi-person-lines-fill"></i></a></button>

                   <button title="Edit"><a href="edit.php?id=<?= $student['id'] ?>"  class="px-3 py-2 bg-emerald-500 text-white rounded hover:bg-emerald-600"><i class="bi bi-pencil-square"></i></a></button>

                   <form action="" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                    <button title="Hapus" type="submit" name="delete"><a href=""  class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700"><i class="bi bi-trash3"></i></a></button>
                   </form>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <?php include_once('./Layout/bottom.php'); ?>

  </body>
</html>