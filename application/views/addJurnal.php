
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <form id="form-tambah">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md">
                    <label class="h5">No Voucher</label>
                    <input type="text" name="no_voucher" class="form-control">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Date</label>
                    <input type="date" name="tgl_voucher" class="form-control">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Description</label>
                    <input type="text" name="description" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md">
                    <label class="h5">No Account</label>
                    <input type="text" id="no_account" class="form-control form-control-sm">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Account Name</label>
                    <input type="text" id="account_name" class="form-control form-control-sm">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Debit</label>
                    <input type="number" id="debit" class="form-control form-control-sm">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Credit</label>
                    <input type="number" id="credit" class="form-control form-control-sm">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Description</label>
                    <input type="number" id="description" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body table-responsive">
                <table class="table table-striped table-flush">
                  <thead>
                      <th class="text-center">No Account</th>
                      <th class="text-center">Nama Akun</th>
                      <th class="text-center">Debit</th>
                      <th class="text-center">Kredit</th>
                      <th class="text-center">Keterangan</th>
                      <th class="text-center">Aksi</th>
                  </thead>
                  <tbody id="table-list-transaksi">
                      
                  </tbody>

                </table>
              </div>
            </div>
          </form>
        </div>
      </div>