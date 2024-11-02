<?= view('nav'); ?>
<div class="container mt-5">
    <h3>Edit Produk</h3>
    <form action="<?= site_url('produk/update/' . esc($produk['produk_id'])) ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk:</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= esc($produk['nama_produk']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_produk" class="form-label">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" required><?= esc($produk['deskripsi_produk']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= esc($produk['harga']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= esc($produk['stok']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gambar_produk" class="form-label">Gambar Produk:</label>
            <input type="text" class="form-control" id="gambar_produk" name="gambar_produk" value="<?= esc($produk['gambar_produk']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="<?= esc($produk['status']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat:</label>
            <input type="text" class="form-control" id="berat" name="berat" value="<?= esc($produk['berat']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran:</label>
            <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= esc($produk['ukuran']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>