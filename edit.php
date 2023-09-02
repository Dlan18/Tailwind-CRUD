<?php

include_once("./Models/student.php");

$student = Student::show($_GET['id']);

if(isset($_POST['submit'])) {
    $response = Student::update([
        'id' => $_GET['id'],
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}

?>

  <?php include_once('./Layout/top.php'); ?>
  <?php include_once('./Layout/header.php'); ?>


    <div class="flex-grow flex flex-col">
      <div class="m-5 p-7 bg-slate-100 rounded-lg shadow-xl">
          <input type="hidden" name="id" value="<?= $student['id'] ?>">
          <form action="" method="POST">
            <h1 class="mb-3 text-center font-bold text-xl">XI RPL'56</h1>
            <hr class="border border-slate-600" />
            <h3 class="my-4 font-bold text-lg">Input Data</h3>
            <div class="mb-3">
              <label for="name"><span class="text-blue-500 font-bold">-</span> Nama</label>
              <input id="name" type="text" name="name" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full hover:shadow-lg" value="<?= $student['name'] ?>" required />
            </div>
            <div class="mb-6">
              <label for="nis"><span class="text-blue-500 font-bold">-</span> nis</label>
              <input id="nis" type="number" name="nis" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full hover:shadow-lg" value="<?= $student['nis'] ?>" required />
            </div>
            <button class="mr-1 px-4 py-2 bg-slate-500 text-white hover:bg-slate-600 rounded" style="letter-spacing: 0.5px" type="submit"><a href="index.php">BATAL</a></button>
            <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded" style="letter-spacing: 0.5px" name="submit" type="submit">SIMPAN</button>
          </form>
        </div>
    </div>

  <?php include_once('./Layout/footer.php'); ?>
  <?php include_once('./Layout/bottom.php'); ?>