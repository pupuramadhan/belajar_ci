<?= view('nav'); ?>
<!-- Navbar -->
<div class="container mt-5">
    <h2>Edit Transaksi</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/transaksi/update/' . $transaksi['transaksi_id']) ?>" method="POST">
        <?= csrf_field() ?>

        <label for="produk_id">Produk:</label>
        <select name="produk_id" id="produk_id" required>
            <?php foreach ($produks as $produk): ?>
                <option value="<?= $produk['produk_id'] ?>" <?= $produk['produk_id'] == $transaksi['produk_id'] ? 'selected' : '' ?>><?= $produk['nama_produk'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="user_id">Pengguna:</label>
        <select name="user_id" id="user_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['user_id'] ?>" <?= $user['user_id'] == $transaksi['user_id'] ? 'selected' : '' ?>><?= $user['nama_pelanggan'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="tanggal_transaksi">Tanggal Transaksi:</label>
        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= $transaksi['tanggal_transaksi'] ?>" required><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" value="<?= $transaksi['jumlah'] ?>" required><br>

        <label for="total_harga">Total Harga:</label>
        <input type="number" name="total_harga" id="total_harga" value="<?= $transaksi['total_harga'] ?>" required><br>

        <button type="submit">Update Transaksi</button>
    </form>
</div>
<!-- End of Container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>