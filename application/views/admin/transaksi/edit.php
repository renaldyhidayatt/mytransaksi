<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Update Transaksi
                </div>
                <div class="card-body">
                    <?= form_error("no_telp"); ?>
                    <?= form_error("id_pelanggan"); ?>
                    <?= form_error("id_nominal"); ?>
                    <?= form_error("id_harga"); ?>
                    <?= form_error("status"); ?>
                    <?= form_error("tgl_tempo"); ?>
                    <?= form_error("keterangan"); ?>
                    <?php foreach($transaksi as $row){ ?>
                    <form action="<?= base_url(); ?>admin/transaksi/edit" method="POST">
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telepon</label>
                            <input type="number" name="no_telp" class="form-control" id="no_telp" value="<?php echo $row->no_telp ?>">
                        </div>

                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">Pilih Pelanggan id</label>
                            <select class="form-control" name="id_pelanggan">
                                <option value="---">Pilih Pelanggan id</option>
                                <?php foreach ($pelanggan as $row) { ?>
                                    <option value="<?php echo $row->id_pelanggan ?>"><?php echo $row->nama_pelanggan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_nominal" class="form-label">Pilih Nominal id</label>
                            <select class="form-control" name="id_nominal">
                                <option value="---">Pilih Nominal id</option>
                                <?php foreach ($nominal as $row) { ?>
                                    <option value="<?php echo $row->id_nominal ?>"><?php echo $row->nominal ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_harga" class="form-label">Pilih Harga id</label>
                            <select class="form-control" name="id_harga">
                                <option value="---">Pilih harga id</option>
                                <?php foreach ($harga as $row) { ?>
                                    <option value="<?php echo $row->id_harga ?>"><?php echo $row->harga ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="---">Pilih Status</option>
                                <option value="LUNAS">LUNAS</option>
                                <option value="HUTANG">HUTANG</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>