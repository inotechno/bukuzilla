
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

      <div class="modal fade show" id="modal-deleteJurnal" tabindex="-1" role="dialog" aria-labelledby="modal-deleteJurnal" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Warning !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Jika anda menghapus jurnal <span id="no-voucher-delete"></span> maka semua transaksi yang terkait akan terhapus !</h4>
                <form class="form" id="form-deleteJurnal" method="POST">
                  <input type="hidden" name="id_jurnal_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-deleteJurnal" form="form-deleteJurnal">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>