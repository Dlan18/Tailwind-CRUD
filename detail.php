<?php

include_once("./Models/student.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

    <?php include_once('./Layout/top.php'); ?>
    <?php include_once('./Layout/header.php'); ?>

    <div class="flex-grow flex flex-col">
        <div class="flex bg-slate-100 rounded mx-10 p-10 max-h-[200px]">
            <div class="basis-1/3">
                <p class="font-bold">Nama:</p>
                <p class="font-bold">Nis:</p>
            </div>
            <div class="basis-1/3">
                <p><?= $student['name'] ?></p>
                <p><?= $student['nis'] ?></p>
            </div>
            <div class="basis-1/3">
                <a href="index.php"><div class="bg-blue-500 hover:bg-blue-600 rounded p-3 text-white text-center">↤ Kembali</div></a>
            </div>
        </div>
    </div>

    <?php include_once('./Layout/bottom.php'); ?>
    
</body>
</html>