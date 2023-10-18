<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-2">
        <div class="container-fluid">
            <h2>BEASISWA UNGGULAN</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-dark" href="app/auth/login.php">Buat Akun</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container d-felx justify-content-center align-items-center w-25">
        <h3 class="text-center mt-5">PILIHAN BEASISWA</h3>
        <div class="mt-4 d-flex justify-content-around align-items-center">
            <a class="btn btn-secondary" href="app/auth/login.php">Akademik</a>
            <a class="btn btn-secondary" href="app/auth/login.php">Non Akademik</a>
        </div>
    </div>

</body>
</html>