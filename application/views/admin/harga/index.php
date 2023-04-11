<br />
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <h3>Harga Index</h3>
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('error_harga') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('error_harga');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('success_harga') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('success_harga');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Harga</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($harga)) {
                                    foreach ($harga as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->id_harga ?></td>
                                            <td><?php echo $row->harga ?></td>
                                            <td><?php echo $row->created_at ?></td>
                                            <td><?php echo $row->updated_at ?></td>
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/harga/edit/') . $row->id_harga; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/harga/delete/' . $row->id_harga); ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>