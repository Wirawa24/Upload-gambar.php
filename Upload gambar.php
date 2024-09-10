<?php
if(isset($_POST['submit'])){
    $file = $_FILES['image'];

    // Menentukan direktori tujuan untuk menyimpan gambar yang diunggah
    $target_dir = "uploads/";

    // Mendapatkan nama file yang diunggah
    $target_file = $target_dir . basename($file['name']);

    // Memeriksa apakah file gambar yang diunggah adalah file gambar yang valid
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if(!in_array($imageFileType, $allowed_types)){
        echo "Hanya gambar JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        exit();
    }

    // Memindahkan file gambar yang diunggah ke direktori tujuan
    if(move_uploaded_file($file['tmp_name'], $target_file)){
        echo "Gambar berhasil diunggah.";
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }
}
?>