<?= view('nav'); ?>
<!--navbar-->
<!--content-->
<div class="container mt-5">
    <h2>Welcome, <?= session()->get('user_name'); ?>!</h2>
    <h3 class="text-center mb-4">Informasi Pengguna</h3>
    <p><strong>Nama:</strong> <?= esc($user['nama']); ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']); ?></p>
    <p><strong>Jenis Kelamin:</strong> <?= esc($user['jenis_kelamin']); ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']); ?></p>
    <p><strong>Tanggal Lahir:</strong> <?= esc($user['tanggal_lahir']); ?></p>
    <p><strong>Alamat:</strong> <?= esc($user['alamat']); ?></p>


    <!--content-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>

    </html>