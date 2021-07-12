
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <form id="form-addTransaksi">
            <div class="card my-1">
              <div class="card-body p-2">
                <div class="row">
                  <div class="form-group col-md">
                    <label class="h5">No Voucher</label>
                    <input type="text" name="no_voucher" class="form-control" required="">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Date</label>
                    <input type="date" name="tgl_voucher" class="form-control" required="">
                  </div>
                  <div class="form-group col-md">
                    <label class="h5">Description</label>
                    <input type="text" name="description" class="form-control" required="">
                  </div>
                </div>

                <div class="block">
                  <div class="col-md-2 float-right">
                      <label>Debit</label>
                      <h3 id="jumlahDebit"></h3>
                  </div>
                  <div class="col-md-2 float-right">
                      <label>Kredit</label>
                      <h3 id="jumlahKredit"></h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header pb-1">
                <div class="row">
                  <input type="hidden" name="jumlah">
                  <div class="form-group col-md">
                    <select id="no_account" class="form-control form-control-sm">
                      <option></option>
                    </select>
                  </div>
                  <div class="form-group col-md">
                    <input type="text" id="account_name" class="form-control form-control-sm" placeholder="Account Name" readonly="">
                  </div>
                  <div class="form-group col-md">
                    <input type="number" id="debit" class="form-control form-control-sm" placeholder="Debit">
                  </div>
                  <div class="form-group col-md">
                    <input type="number" id="credit" class="form-control form-control-sm" placeholder="Kredit">
                  </div>
                  <div class="form-group col-md">
                    <input type="text" id="description" class="form-control form-control-sm" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <button type="button" id="btn-addRowTransaksi" class="btn btn-sm btn-rounded"><span class="fas fa-plus"></span></button>
                  </div>
                </div>
              </div>
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

              <div class="card-footer p-2">
                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
              </div>
            </div>


          </form>
        </div>
      </div>