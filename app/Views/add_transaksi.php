<?= view('nav'); ?>
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

    <form action="<?= site_url('transaksi/store') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="produk_id" class="form-label">Nama Produk:</label>
                <select class="form-control" id="produk_id" name="produk_id" required>
                    <option value="">Pilih Produk</option>
                    <?php foreach ($produks as $produk): ?>
                        <option value="<?= esc($produk['produk_id']); ?>">
                            <?= esc($produk['nama_produk']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div class="col-md-6">
                <div class="col-md-6">
                    <label for="user_id" class="form-label">Nama User:</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">Pilih pelanggan</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?= esc($user['user_id']); ?>">
                                <?= esc($user['nama_pelanggan']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi:</label>
                <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                    value="<?= date('Y-m-d H:i:s') ?>" required readonly>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>


            <div class="col-md-6">
                <label for="jumlah" class="form-label">jumlah:</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah"
                    placeholder="Masukkan Nama jumlah" required>
                <div class="invalid-feedback">
                    Wajib diisi
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 ">
                <label for="total_harga" class="form-label">Total Harga:</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga"
                    placeholder="Masukkan Total Harga" required>
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