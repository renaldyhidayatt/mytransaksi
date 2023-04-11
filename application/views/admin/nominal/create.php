<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create Nominal
                </div>
                <div class="card-body">
                    <?= form_error("nominal"); ?>
                    <form action="<?= base_url(); ?>admin/nominal/create" method="POST">
                        
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>