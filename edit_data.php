<!doctype html>
<?php
    include "koneksi.php";

    $npm = $_GET['id'];
    $proses_ambil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $npm");

    $edit = mysqli_fetch_assoc($proses_ambil);

    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $prodi = $_POST["prodi"];
        $nilai = $_POST["nilai"];

        $proses = mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mahasiswa = '$nama', prodi ='$prodi', nilai ='$nilai' WHERE id=$npm");
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        body.dark-mode .form-control {
            background-color: #333;
            color: #ffffff;
            border-color: #444;
        }
        body.dark-mode .form-label, 
        body.dark-mode .btn-primary,
        body.dark-mode a {
            color: #ffffff;
        }
        body.dark-mode .btn-outline-success {
            color: #ffffff;
            border-color: #6c757d;
        }
        body.dark-mode .btn-outline-success:hover {
            background-color: #6c757d;
        }
        body.dark-mode .btn-primary {
            background-color: #3b5998;
        }
        #dark-mode-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <button id="dark-mode-btn" class="btn btn-secondary">Dark Mode</button>
    <div class="container-2 w-75 p-2 d-flex justify-content-center mt-2 ms-auto me-auto">
        <div class="items-1 w-75 border rounded p-2">
            <h3 class="text-primary">Edit Data Mahasiswa</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $edit['nama_mahasiswa'] ?>">
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi Mahasiswa</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $edit['prodi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai Mahasiswa</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" value="<?php echo $edit['nilai'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a class="btn btn-secondary" href="index.php" role="button">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('dark-mode-btn');
            const body = document.body;

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                body.classList.add(savedTheme);
            }

            toggleButton.addEventListener('click', function() {
                body.classList.toggle('dark-mode');

                if (body.classList.contains('dark-mode')) {
                    localStorage.setItem('theme', 'dark-mode');
                } else {
                    localStorage.removeItem('theme');
                }
            });
        });
    </script>
</body>
</html>
