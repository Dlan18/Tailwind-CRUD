<?php

include_once('DB.php');

class Student extends DB {
    public static function create($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        
        $name = $data["name"];
        $nis = $data["nis"];
        $timestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO students (name, nis, created_at) VALUES ('$name', '$nis', '$timestamp')";
        $result = DB::connect()->query($sql);

        if($result) {
            return "Berhasil Menambahkan Data";
        }
        else {
            return "Gagal Menambah Data";
        }
    }

    public static function index() {
        $sql = "SELECT * FROM students";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        

        return $data;
    }

    public static function show($id) {
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = DB::connect()->query($sql);
        $data = $result->fetch_assoc();
        return $data;
    }

    public static function update($data) {
        $name = $data['name'];
        $nis = $data['nis'];
        $id = $data['id'];


        $sql = "UPDATE students SET name='$name', nis='$nis' WHERE id = '$id'";
        $result = DB::connect()->query($sql);

        if($result) {
            return "Berhasil Mengedit Data";
        }
        else {
            return "Gagal Mengedit Data";
        }
    }

    public static function delete($id) {
        $sql = "DELETE FROM students WHERE id ='$id'";
        $result = DB::connect()->query($sql);

        if($result) {
            return "Berhasil Menghapus Data";
        }
        else {
            return "Gagal Menghapus Data";
        }
    }
}