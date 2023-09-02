<?php

include_once("./Models/student.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

    <?php include_once('./Layout/top.php'); ?>
    <?php include_once('./Layout/header.php'); ?>

    <div class="flex-grow flex flex-col">
        <div class="flex flex-col sm:flex-row bg-slate-100 rounded-lg mt-3 mx-12 p-10 max-h-[200px]">
            <div class="basis-1/2">
                <p class="font-bold">Nama:<span class="font-normal"> <?= $student['name'] ?></span></p>
                <p class="font-bold">Nis:<span class="font-normal"> <?= $student['nis'] ?></span></p>
            </div>
            <div class="basis-1/2">
                <a href="index.php"><div class="bg-blue-500 hover:bg-blue-600 rounded p-3 text-white text-center"><i class="bi bi-arrow-left"></i> Kembali</div></a>
            </div>
        </div>
    </div>

    <?php include_once('./Layout/footer.php'); ?>
    <?php include_once('./Layout/bottom.php'); ?>