<br />
<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <h3>Lunas List</h3>
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('error_transaksi') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('error_transaksi');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('success_transaksi') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('success_transaksi');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Trans</th>
                                    <th>No Telp</th>
                                    <th>Pelanggan</th>
                                    <th>Nominal</th>
                                    <th>Harga</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($transaksi)) {
                                    foreach ($transaksi as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->id_transaksi ?></td>
                                            <td><?php echo $row->kode_transaksi ?></td>
                                          
                                            <td><?php echo $row->nama_pelanggan ?></td>
                                            <td><?php echo $row->no_telpn ?></td>
                                            <td><?php echo $row->nominal ?></td>
                                            <td><?php echo $row->harga ?></td>
                                            <td><?php echo $row->tgl_transaksi ?></td>
                                            <td><?php echo $row->status ?></td>
                                            
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/transaksi/edit/') . $row->id_transaksi; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/transaksi/delete/' . $row->id_transaksi); ?>" class="btn btn-danger">Delete</a>
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