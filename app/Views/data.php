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
    <!--navbar-->
    <!--content-->
    <div class="container mt-5">
        <h2>Welcome, <?= session()->get('user_name'); ?>!</h2>
        <h3 class="text-center mb-4">Data Peserta Terdaftar</h3>
        <form action="<?= site_url('pendaftaran/search') ?>" method="post">
            <input type="text" name="search" placeholder="Cari nama..." value="<?= isset($search) ? $search : ''; ?>">
            <button type="submit">Cari</button>
        </form>
        <table class='table table-dark table-hover'>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Agama</th>
                    <th>Tempat Lahir</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Nama Hubungan</th>
                    <th>Jenis Dokumen</th>
                    <th>Nomor Dokumen</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pendaftars)): ?>
                    <?php foreach ($pendaftars as $pendaftar): ?>
                        <tr>
                            <td><?= esc($pendaftar['id_pendaftaran']); ?></td>
                            <td><?= esc($pendaftar['nama']); ?></td>
                            <td><?= esc($pendaftar['agama']); ?></td>
                            <td><?= esc($pendaftar['tempat_lahir']); ?></td>
                            <td><?= esc($pendaftar['tinggi_badan']); ?></td>
                            <td><?= esc($pendaftar['berat_badan']); ?></td>
                            <td><?= esc($pendaftar['nama_hubungan']); ?></td>
                            <td><?= esc($pendaftar['jenis_dokumen']); ?></td>
                            <td><?= esc($pendaftar['nomor_dokumen']); ?></td>
                            <td><?= esc($pendaftar['alamat']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Tidak ada data pendaftar yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="<?= site_url('pendaftaran') ?>" class="btn btn-warning">Peserta Baru</a>
    </div>
    <!--content-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>