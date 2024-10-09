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
            <a class="navbar-brand" href="#">Navbar</a>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/logout') ?>">Logout</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Pendaftaran Peserta</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div style="color: green;">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <div style="color: red;">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('pendaftaran/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <div class="col-md-6 ">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Masukkan nama peserta" required>
                </div>
                <div class="col-md-6">
                    <label for="agama" class="form-label">Agama:</label>
                    <input type="text" class="form-control" id="agama" name="agama"
                        placeholder="Masukkan Agama" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 ">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        placeholder="Masukkan Tempat Lahir" required>
                    <div class="invalid-feedback">
                        Wajib diisi
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan:</label>
                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan"
                        placeholder="Masukkan Tinggi Badan (cm)" required>
                    <div class="invalid-feedback">
                        Wajib diisi
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 ">
                    <label for="berat_badan" class="form-label">Berat Badan:</label>
                    <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                        placeholder="Masukkan Berat Badan (kg)" required>
                    <div class="invalid-feedback">
                        Wajib diisi
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nama_hubungan" class="form-label">Hubungan:</label>
                    <input type="text" class="form-control" id="nama_hubungan" name="nama_hubungan"
                        placeholder="Masukkan Nama Hubungan" required>
                    <div class="invalid-feedback">
                        Wajib diisi
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 ">
                    <label for="jenis_dokumen" class="form-label">Jenis Dokumen:</label>
                    <input type="text" class="form-control" id="jenis_dokumen" name="jenis_dokumen"
                        placeholder="Masukkan Jenis Dokumen" required>
                    <div class="invalid-feedback">
                        Wajib diisi
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nomor_dokumen" class="form-label">Nomor Dokumen:</label>
                    <input type="text" class="form-control" id="nama_dokumen" name="nomor_dokumen"
                        placeholder="Masukkan nomor Dokumen" required>
                    <div class="invalid-feedback">
                        Wajib diisi
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
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>