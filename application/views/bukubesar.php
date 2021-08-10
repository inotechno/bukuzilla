
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form action="<?= site_url('Laporan/getBukuBesar') ?>" method="POST">
                <div class="row">
                  
                  <div class="col-md-2">
                    <input type="text" id="dari" name="dari" class="form-control" placeholder="Dari">
                  </div>

                  <div class="col-md-2">
                    <input type="text" id="sampai" name="sampai" class="form-control" placeholder="Sampai">
                  </div>

                  <div class="col-md-6">
                    <input type="text" id="periode" name="periode" class="form-control" placeholder="Periode">
                  </div>

                  <div class="col-md-2">
                    <button type="submit" id="btnDownload" class="btn btn-warning">Download</button>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
