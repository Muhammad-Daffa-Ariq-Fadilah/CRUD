<?php
    include "koneksi.php";

    $proses = mysqli_query($koneksi,"SELECT * FROM mahasiswa") or die (mysqli_error($koneksi));

    if(isset($_POST["reset"])){
        $proses = mysqli_query($koneksi,"SELECT * FROM mahasiswa") or die (mysqli_error($koneksi));
    }
    
    if(isset($_POST["search"])){
        $search = $_POST["search"];
        $proses = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nama_mahasiswa LIKE '%$search%' OR id LIKE  '%$search%'");
    }
?>