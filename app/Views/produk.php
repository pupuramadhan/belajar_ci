<?= view('nav'); ?>
<!--navbar-->
<!--content-->
<div class="container mt-5">
    <h2> <?= session()->get('user_name'); ?>!</h2>
    <h3 class="text-center mb-4">Data Produk</h3>
    <form action="<?= site_url('produk/search') ?>" method="post">
        <input type="text" name="search" placeholder="Cari nama..." value="<?= isset($search) ? $search : ''; ?>">
        <button type="submit">Cari</button>
    </form>
    <table class='table table-dark table-hover'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Berat</th>
                <th>Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produks)): ?>
                <?php foreach ($produks as $produk): ?>
                    <tr>

                        <td><?= esc($produk['produk_id']); ?></td>
                        <td><?= esc($produk['nama_produk']); ?></td>
                        <td><?= esc($produk['deskripsi_produk']); ?></td>
                        <td><?= esc($produk['harga']); ?></td>
                        <td><?= esc($produk['stok']); ?></td>
                        <td><?= esc($produk['gambar_produk']); ?></td>
                        <td><?= esc($produk['status']); ?></td>
                        <td><?= esc($produk['berat']); ?></td>
                        <td><?= esc($produk['ukuran']); ?></td>
                        <td>
                            <a href="<?= site_url('produk/edit/' . esc($produk['produk_id'])); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?= site_url('produk/delete/' . esc($produk['produk_id'])) ?>" method="post" style="display:inline;">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE"> <!-- Menggunakan input hidden untuk mengindikasikan DELETE -->
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">Tidak ada data produk yang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="text-center">
    <a href="<?= site_url('add_produk') ?>" class="btn btn-warning">Produk Baru</a>
</div>
<!--content-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>