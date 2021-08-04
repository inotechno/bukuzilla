
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card my-1">
            <div class="card-body p-2">
              <form id="form-updateJurnal">
                <div class="row">

                  <div class="form-group col-md">
                    <label class="h5">No Voucher</label>
                    <input type="hidden" name="id_jurnal">
                    <input type="hidden" id="no_voucher">
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

                  <div class="form-group col-1">
                    <label></label>
                    <button type="submit" class="btn btn-primary" id="btn-updateJurnal">Update</button>
                  </div>
                  
                </div>
              </form>

              <div class="block">
                <div class="col-md-2 float-right">
                    <label>Kredit</label>
                    <h3 id="jumlahKredit"></h3>
                </div>
                <div class="col-md-2 float-right">
                    <label>Debit</label>
                    <h3 id="jumlahDebit"></h3>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header pb-1">
              <form id="form-addDetailTransaksi">
                <div class="row">
                  <input type="hidden" name="trx_id_jurnal">
                  <div class="form-group col-md">
                    <select id="no_account" name="trx_id_account" class="form-control form-control-sm">
                      <option></option>
                    </select>
                  </div>
                  <div class="form-group col-md">
                    <input type="text" id="account_name" class="form-control form-control-sm" placeholder="Account Name" readonly="">
                  </div>
                  <div class="form-group col-md">
                    <input type="number" id="debit" name="trx_debit" class="form-control form-control-sm" placeholder="Debit">
                  </div>
                  <div class="form-group col-md">
                    <input type="number" id="credit" name="trx_kredit" class="form-control form-control-sm" placeholder="Kredit">
                  </div>
                  <div class="form-group col-md">
                    <input type="text" id="description" name="trx_description" class="form-control form-control-sm" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btn-addTransaksi" class="btn btn-sm btn-rounded"><span class="fas fa-plus"></span></button>
                  </div>
                </div>
              </form>
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

          </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deleteDetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="modal-deleteDetailTransaksi" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Danger !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Jika anda menghapus transaksi ini maka jurnal tidak akan balance dan mengakibatkan error !</h4>
                <form class="form" id="form-deleteDetailTransaksi" method="POST">
                  <input type="hidden" name="id_detail_transaksi_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-deleteDetailTransaksi" form="form-deleteDetailTransaksi">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>