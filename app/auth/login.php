<?php
// Alert
if(isset($_GET['pesan'])){
    if($_GET['pesan']=="berhasil"){
        echo "<script>alert('Berhasil logout')</script>";
    } else if($_GET['pesan']=="gagal"){
        echo "<div class='text-center text-danger mt-3'>Periksa Username dan Password!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- Form Login -->
    <div class="container pt-5 ps-5 pe-5">
        <div class="row g-0 mt-4 border border-secondary">
            <div class="col-md-7 d-flex justify-content-center align-items-center flex-column">
                <h1>BEASISWA GRATIS</h1>
                <h4>Pilihan Beasiswa</h4>
                <ul>
                    <li>Akademik</li>
                    <li>Non Akademik</li>
                </ul>
            </div>
            <div class="col-md-5 p-5 bg-light">
                <form class="mt-6 w-100" action="proses-login.php" method="post">
                    <h3 class="text-center mb-4">LOGIN</h3>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                        <button type="submit" class="btn btn-secondary w-100">Login</button>
                </form>
                <h6 class="text-center fw-normal mt-4">Belum punya akun?<a href="register.php">Register</a></h6>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>