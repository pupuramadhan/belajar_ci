<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href=<?= base_url('/') ?>>UNDIRA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=<?= base_url('/') ?>>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/profile') ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/data') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Login/Register
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('/login') ?>">Login</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/register') ?>">Register</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!--navbar-->
    <!--content-->
    <?= $this->extend('layout') ?>
    <?= $this->section('content') ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Registrasi</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/register') ?>" method="post" class="needs-validation" novalidate>
            <!-- Nama Pelanggan dan Nomor Telepon -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                        placeholder="Masukkan nama pelanggan" required>
                    <div class="invalid-feedback">
                        Nama pelanggan wajib diisi.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="kontak" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="kontak" name="kontak"
                        placeholder="Masukkan nomor telepon" required>
                    <div class="invalid-feedback">
                        Nomor telepon wajib diisi.
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"
                    required></textarea>
                <div class="invalid-feedback">
                    Alamat wajib diisi.
                </div>
            </div>

            <!-- Email dan Tanggal Lahir -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
                        required>
                    <div class="invalid-feedback">
                        Email wajib diisi dengan format yang benar.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    <div class="invalid-feedback">
                        Tanggal lahir wajib diisi.
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="username" class="form-label">username</label>
                    <input type="username" class="form-control" id="username" name="username" placeholder="Masukkan username"
                        required>
                    <div class="invalid-feedback">
                        username wajib diisi dengan format yang benar.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="foto_profil" class="form-label">Foto Profil</label>
                    <input type="foto_profil" class="form-control" id="foto_profil" name="foto_profil" placeholder="Masukkan foto_profil"
                        required>
                    <div class="invalid-feedback">
                        Foto wajib diisi dengan format yang benar.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        Status wajib dipilih.
                    </div>
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    Jenis kelamin wajib dipilih.
                </div>
            </div>

            <!-- Password -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <!-- Confirm Password -->
                <div class="col-md-6">
                    <label for="pass_confirm" class="form-label">Konfirmasi Password:</label>
                    <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" required>
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form>
    </div>
    <!--content-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>