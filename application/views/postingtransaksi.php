
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          
          <div class="card">
            <div class="card-body">
				<h3>JUMLAH TRANSAKSI <span id="jumlahData"></span></h3>
				<p><small>Tunggu Proses Posting hingga selesai, jangan beralih ke halaman lain, 
					proses ini membutuhkan waktu yang memakan waktu.</small></p>
				
				<div id="progress">
					<h6 class="text-right"><span id="dari">1</span> / <span id="sampai">2080</span></h6>
					<div class="progress">
						<div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
					</div>
				</div>
					
				<button class="btn btn-md btn-outline-info">Posting</button>
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
