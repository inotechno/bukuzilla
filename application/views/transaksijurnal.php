
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="text-right mb-2">
            <a class="btn btn-sm btn-neutral btn-round btn-icon" href="<?= site_url('TransaksiJurnal/pageAddJurnal') ?>">
              <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
              <span class="btn-inner--text">Tambah</span>
            </a>
          </div>
          <div class="card">
            
            <div class="table-responsive py-3">
              <table class="table table-flush" id="table-jurnal">
                <thead class="thead-light">
                  <tr>
                      <th>Nomor Voucher</th>
                      <th>Description</th>
                      <th>Voucher Date</th>
                      <th>Status Balance</th>
                      <th>Status Post</th>
                      <th>Created At</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody id="table-daftar-jurnal">
                      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>