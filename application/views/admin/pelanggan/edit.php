<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Update Pelanggan
                </div>
                <div class="card-body">
                    <?= form_error("nama_pelanggan"); ?>
                    <?= form_error("alamat"); ?>
                    <?= form_error("no_telepon"); ?>
                    <?php foreach ($pelanggan as $row) { ?>
                        <form action="<?= base_url(); ?>admin/pelanggan/edit" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row->id_pelanggan ?>">

                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $row->nama_pelanggan; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No telepon</label>
                                <input type="number" name="no_telepon" class="form-control" value="<?php echo $row->no_telpn ?>" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>