<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create Categories
                </div>
                <div class="card-body">
                    <?= form_error("nama_pelanggan"); ?>
                    <?= form_error("alamat"); ?>
                    <?= form_error("no_telepon"); ?>
                    <form action="<?= base_url(); ?>admin/pelanggan/create" method="POST">
                        
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No telepon</label>
                            <input type="number" name="no_telepon" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>