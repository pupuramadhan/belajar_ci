<?= view('nav'); ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Tambah Produk</h2>
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

    <form action="<?= site_url('produk/store') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <div class="col-md-6 ">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    placeholder="Masukkan Produk" required>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-6 ">
                <label for="deskripsi_produk" class="form-label">Deskripsi produk:</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk"
                    placeholder="Masukkan Deskripsi produk" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
            <div class="col-md-6">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga"
                    placeholder="Masukkan Harga" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="created_at" class="form-label">Created At:</label>
                <input type="text" class="form-control" id="created_at" name="created_at"
                    value="<?= date('Y-m-d H:i:s') ?>" required readonly>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>


            <div class="col-md-6">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" class="form-control" id="stok" name="stok"
                    placeholder="Masukkan Nama Stok" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 ">
                <label for="gambar_produk" class="form-label">Gambar Produk:</label>
                <input type="text" class="form-control" id="gambar_produk" name="gambar_produk"
                    placeholder="Masukkan Gambar Produk" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-6 ">
                <label for="berat" class="form-label">Berat:</label>
                <input type="text" class="form-control" id="berat" name="berat"
                    placeholder="Masukkan Berat Produk" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
            <div class="col-md-6">
                <label for="ukuran" class="form-label">ukuran:</label>
                <input type="text" class="form-control" id="ukuran" name="ukuran"
                    placeholder="Masukkan ukuran" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
        </div>

        <!-- Alamat -->

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>

    </html>