
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <select id="no_account" class="form-control">
                    <option></option>
                  </select>
                </div>

                <div class="col-md-3">
                  <input type="date" id="startDate" class="form-control">
                </div>

                <div class="col-md-3">
                  <input type="date" id="endDate" class="form-control">
                </div>

                <div class="col-md-1">
                  <button type="button" id="btnFilter" class="btn btn-warning">Filter</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" id="viewInquiry">
        <div class="col">
          <div class="card">
            <div class="card-body table-responsive">
              <h3 id="nama-akun"></h3>
              <table class="table table-striped table-flush" id="table-inquiry">
                <thead>
                    <th class="text-center">Tanggal Voucher</th>
                    <th class="text-center">No Account</th>
                    <th class="text-center">Debit</th>
                    <th class="text-center">redit</th>
                    <th class="text-center">Saldo</th>
                </thead>
                <tbody>
                    
                </tbody>

              </table>
            </div>

          </div>
        </div>
      </div>