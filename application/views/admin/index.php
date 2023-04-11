<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4>Dashboard</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white h-100">
          <div class="card-head text-center py-5">
            Harga
          </div>
          <div class="card-body py-5 text-center"><?php echo $harga; ?></div>

        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white h-100">
          <div class="card-head text-center py-5">
            Hutang
          </div>
          <div class="card-body py-5 text-center"><?php echo $hutang; ?></div>

        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white h-100">
          <div class="card-head text-center py-5">
            Lunas
          </div>
          <div class="card-body py-5 text-center"><?php echo $lunas; ?></div>

        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white h-100">
          <div class="card-head text-center py-5">
            User
          </div>
          <div class="card-body py-5 text-center"><?php echo $user; ?></div>

        </div>
      </div>


    </div>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="card h-100">
          <div class="card-header">
            <h3>Transaksi Terakhir dalam 10 count</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th>No Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>No.Telepon</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($transaksi)) {
                    foreach ($transaksi as $row) {
                      if($row->status == "LUNAS"){
                        $status = "<span class='label label-success'>".$row->status."</span";
                      }elseif($transaksi->status == "HUTANG"){
                        $status = "<span class='label label-danger'>".$row->status."</span";
                      }
                  ?>
                      <tr>
                        <td><?php echo $row->transaksi_id ?></td>
                        <td><?php echo $row->nama_pelanggan ?></td>
                        <td><?php echo $row->no_telp ?></td>
                        <td><?php echo $status ?></td>
                        
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

  </div>
</main>