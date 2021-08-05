
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="text-right mb-2">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-addUsers">Tambah</button>
          </div>
          <div class="card">
            <div class="table-responsive p-3">
              <table class="table table-flush" id="table-users">
                <thead>
                  <tr>
                      <th>Foto</th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Level</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody id="table-daftar-users">
                      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-addUsers" tabindex="-1" role="dialog" aria-labelledby="modal-delete-soal" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Tambah Users</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-addUsers" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control">
                </div>

                <div class="form-group">
                  <label>Foto</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" lang="en" name="foto">
                    <label class="custom-file-label" for="foto">Select Foto</label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option></option>
                    <option value="1">Administrator</option>
                    <option value="2">Staff</option>
                    <option value="3">Chief Accounting</option>
                  </select>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-white" id="btn-addUsers" form="form-addUsers">Simpan</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-updateUsers" tabindex="-1" role="dialog" aria-labelledby="modal-updateUsers" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Update Users</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-updateUsers" enctype="multipart/form-data">
                <input type="hidden" name="id_update">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username_update" class="form-control" readonly="">
                </div>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap_update" class="form-control">
                </div>

                <div class="form-group">
                  <label>Foto</label>
                  <div class="custom-file">
                    <input type="hidden" name="foto_lama">
                    <input type="file" class="custom-file-input" id="foto_update" lang="en" name="foto_update">
                    <label class="custom-file-label" for="foto_update">Select Foto</label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level_update">
                    <option></option>
                    <option value="1">Administrator</option>
                    <option value="2">Staff</option>
                    <option value="3">Chief Accounting</option>
                  </select>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-white" id="btn-updateUsers" form="form-updateUsers">Simpan</button>
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