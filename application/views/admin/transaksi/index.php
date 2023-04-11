<br />
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <h3>Pelanggan List</h3>
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('error_pelanggan') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('error_pelanggan');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('success_pelanggan') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('success_pelanggan');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($pelanggan)) {
                                    foreach ($pelanggan as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->id_pelanggan ?></td>
                                            <td><?php echo $row->nama_pelanggan ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td><?php echo $row->no_telpn ?></td>
                                            <td><?php echo $row->created_at ?></td>
                                            <td><?php echo $row->updated_at ?></td>
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/pelanggan/edit/') . $row->id_pelanggan; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/pelanggan/delete/' . $row->id_pelanggan); ?>" class="btn btn-danger">Delete</a>
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