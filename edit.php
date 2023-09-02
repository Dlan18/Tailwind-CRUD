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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Ranks Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <nav class="p-4 shadow-xl mb-10 bg-white z-3 sticky top-0">
      <a class="flex justify-center items-center gap-1" href="">
        <img src="logo.jpeg" width="37" height="auto" class="me-3" alt="" />
        <h1 class="font-bold text-3xl m-0">SMKN 10 JKT</h1>
      </a>
    </nav>

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
          <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded" style="letter-spacing: 0.5px" name="submit" type="submit">KIRIM</button>
        </form>
      </div>
</body>
</html>