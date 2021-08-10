
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form action="<?= site_url('Laporan/getRugiLaba') ?>" method="POST">
                <div class="row">
                  
                  <div class="col-md-5">
                    <input type="date" id="startDate" name="startDate" class="form-control">
                  </div>

                  <div class="col-md-5">
                    <input type="date" id="endDate" name="endDate" class="form-control">
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
