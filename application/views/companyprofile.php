
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col-xl-5">
          <div class="card card-profile">
            <img src="<?= site_url('assets/assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-4">
                <div class="card-profile-image">
                  <a href="#">
                    <img id="foto" src="<?= site_url('assets/assets/img/theme/team-4.jpg') ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Email</a>
                <a href="#" class="btn btn-sm btn-default float-right">Phone</a>
              </div>
            </div>
            <div class="card-body">
              <h5>
                <span class="ni ni-building"></span> 
                <span class="ml-1">Nama Perusahaan :</span> 
                <span class="float-right nama-perusahaan"></span>
              </h5>

              <h5>
                <span class="ni ni-books"></span> 
                <span class="ml-1">Jenis Perusahaan :</span> 
                <span class="float-right jenis-perusahaan"></span>
              </h5>

              <h5>
                <span class="ni ni-circle-08"></span> 
                <span class="ml-1">Nama Direktur :</span> 
                <span class="float-right nama-direktur"></span>
              </h5>

              <h5>
                <span class="ni ni-single-02"></span> 
                <span class="ml-1">Jumlah Karyawan :</span> 
                <span class="float-right jumlah-karyawan"></span>
              </h5>

              <h5>
                <span class="ni ni-email-83"></span> 
                <span class="ml-1">Email :</span> 
                <span class="float-right email"></span>
              </h5>

              <h5>
                <span class="ni ni-notification-70"></span> 
                <span class="ml-1">Telepon :</span> 
                <span class="float-right telepon"></span>
              </h5>

              <h5>
                <span class="ni ni-settings-gear-65"></span> 
                <span class="ml-1">Status :</span> 
                <span class="float-right status"></span>
              </h5>

            </div>
          </div>
        </div>

        <div class="col-xl-7">
          <div class="card">
            <div class="card-body">
              <form id="formProfile" enctype="multipart/form-data" method="POST"> 
                <div class="row">

                  <div class="col-md">
                    <div class="form-group">
                      <label>Nama Perusahaan</label>
                      <input type="text" name="nama_perusahaan" class="form-control" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Jenis Perusahaan</label>
                      <input type="text" name="jenis_perusahaan" class="form-control" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Nama Direktur</label>
                      <input type="text" name="nama_direktur" class="form-control" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status" disabled="">
                        <option value="Swasta">Swasta</option>
                        <option value="Negeri">Negeri</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Pendirian</label>
                      <input type="date" name="tgl_pendirian" class="form-control" disabled="">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label>Jumlah Karyawan</label>
                      <input type="number" name="jumlah_karyawan" class="form-control" disabled="">
                    </div>          

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="number" name="telepon" class="form-control" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Logo</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" lang="en" name="logo" disabled="">
                        <label class="custom-file-label" for="logo">Select Logo</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" disabled=""></textarea>
                    </div>
                  </div>

                </div>
                <button type="button" class="btn btn-primary float-right" id="btn-update">Update</button>
                <button type="button" class="btn btn-danger float-right" id="btn-cancelupdateProfile" style="display: none;">Cancel</button>
                <button type="submit" class="btn btn-success float-right" id="btn-updateProfile" style="display: none;">Update</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
