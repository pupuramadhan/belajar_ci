<?= view('nav'); ?>
<!--navbar-->
<!--content-->
<div class="container mt-5">
    <h2>Welcome, <?= session()->get('user_name'); ?>!</h2>
    <h3 class="text-center mb-4">Data Transaksi</h3>
    <form action="<?= site_url('transaksi/search') ?>" method="post">
        <input type="text" name="search" placeholder="Cari id..." value="<?= isset($search) ? $search : ''; ?>">
        <button type="submit">Cari</button>
    </form>
    <table class='table table-dark table-hover'>
        <thead>
            <tr>

                <th>Transaksi ID</th>
                <th>Supplier ID</th>
                <th>User ID</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksis)): ?>
                <?php $no = 1; // Inisialisasi variabel nomor urut 
                ?>
                <?php foreach ($transaksis as $transaksi): ?>
                    <tr>
                        <td><?= esc($no++); ?></td>
                        <td><?= esc($transaksi['nama_produk']); ?></td>
                        <td><?= esc($transaksi['nama_pelanggan']); ?></td>
                        <td><?= esc($transaksi['tanggal_transaksi']); ?></td>
                        <td><?= esc($transaksi['jumlah']); ?></td>
                        <td><?= esc($transaksi['total_harga']); ?></td>
                        <td>

                            <form action="<?= site_url('transaksi/delete/' . esc($transaksi['transaksi_id'])) ?>" method="post" style="display:inline;">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE"> <!-- Menggunakan input hidden untuk mengindikasikan DELETE -->
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                            </form>

                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Tidak ada data transaksi yang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="text-center">
    <a href="<?= site_url('add_transaksi') ?>" class="btn btn-warning">Peserta Baru</a>
</div>
<!--content-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>