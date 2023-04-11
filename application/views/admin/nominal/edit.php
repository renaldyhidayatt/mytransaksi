<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Update Nominal 
                </div>
                <div class="card-body">
                    <?= form_error("nominal"); ?>
                    <?php foreach($nominal as $row){ ?>
                    <form action="<?= base_url(); ?>admin/nominal/edit" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row->id_nominal ?>">
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" id="nominal" name="nominal" value="<?php echo $row->nominal ?>" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>