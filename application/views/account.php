
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form class="form" id="form-addAccount">
                <div class="row">
                  <div class="form-group col-md">
                    <label class="h5">Nomor Akun</label class="h5">
                    <input type="text" name="no_akun" class="mask_account form-control form-control-sm" required>
                    <p class="h6 mt-2">1000-4000 Digunakan Untuk Laporan Neraca, <br>4001-8000 Digunakan Untuk Laporan Rugi Laba</p>
                  </div>

                  <div class="form-group col-md">
                    <label class="h5">Sub Nomor Akun</label class="h5">
                    <input type="text" name="sub_no_akun" class="mask_account form-control form-control-sm">
                    <p class="h6 mt-2">Kosongkan Jika Akun Master</p>
                  </div>

                  <div class="form-group col-md">
                    <label class="h5">Nama Akun</label class="h5">
                    <input type="text" name="nama_akun" class="form-control form-control-sm" required>
                  </div>

                  <div class="form-group col-md">
                    <label class="h5">Level</label class="h5">
                    <select class="form-control form-control-sm" name="level_akun" required>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>

                  <div class="form-group col-md">
                    <label class="h5">Status</label class="h5">
                    <select class="form-control form-control-sm" name="status_akun" required>
                      <option value="Y">Aktif</option>
                      <option value="T">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
               
                <button type="submit" class="btn btn-success btn-sm float-right" id="btn-addAccount">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

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
                      <th>Created At</th>
                      <th>Created By</th>
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

      <div class="modal fade show" id="modal-deleteAccount" tabindex="-1" role="dialog" aria-labelledby="modal-delete-soal" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus akun ini <span id="akun-delete"></span></h4>
                <form class="form" id="form-deleteAccount" method="POST">
                  <input type="hidden" name="no_akun_delete">
                  <input type="hidden" name="sub_no_akun_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-deleteAccount" form="form-deleteAccount">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>