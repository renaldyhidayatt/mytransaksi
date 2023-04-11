<br />
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <h3>Nominal Index</h3>
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('error_nominal') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('error_nominal');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('success_nominal') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('success_nominal');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nominal</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($nominal)) {
                                    foreach ($nominal as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->id_nominal ?></td>
                                            <td><?php echo $row->nominal ?></td>
                                            <td><?php echo $row->created_at ?></td>
                                            <td><?php echo $row->updated_at ?></td>
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/nominal/edit/') . $row->id_nominal; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/nominal/delete/' . $row->id_nominal); ?>" class="btn btn-danger">Delete</a>
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