
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="table-responsive p-3">
              <table class="table table-flush" id="table-akun">
                <thead>
                  <tr>
                      <th>Nomor Akun</th>
                      <th>Nama Akun</th>
                      <th>Level Akun</th>
                      <th>Status</th>
                      <th>Saldo Awal</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody id="table-daftar-akun">
                      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-updateSaldoAwal" tabindex="-1" role="dialog" aria-labelledby="modal-updateSaldoAwal" aria-modal="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            
            <div class="modal-body">
              <form id="form-updateSaldoAwal">
                <div class="form-group">
                  <input type="hidden" name="no_akun">
                  <input type="hidden" name="sub_no_akun">
                  <label class="h5">Saldo</label>
                  <input type="number" name="saldo_awal" class="form-control">
                  <label class="h6">Tekan Enter untuk submit</label>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>