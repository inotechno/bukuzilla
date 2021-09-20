    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-primary border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Jurnal/Transaksi</h5>
                  <span class="h2 font-weight-bold mb-0 text-white"><span class="totalJurnal"></span> / <span class="totalTransaksi"></span></span>
                  
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="<?= base_url('TransaksiJurnal') ?>" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-success border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Users</h5>
                  <span class="h2 font-weight-bold mb-0 text-white"><span class="totalUsers"></span> User</span>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="<?= base_url('Users') ?>" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-warning border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Account</h5>
                  <span class="h2 font-weight-bold mb-0 text-white"><span class="totalAccount"></span> Account</span>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="<?= base_url('Account') ?>" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>
      </div>