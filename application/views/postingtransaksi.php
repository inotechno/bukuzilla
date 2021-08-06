
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
					<h6 class="text-right"><span id="dari"></span> / <span id="sampai"></span></h6>
					<div class="progress">
						<div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
					</div>
				</div>	
				<button class="btn btn-md btn-outline-info" id="btnPosting">Posting</button>
				<div class="selesai">
					<h2 class="text-success"><span class="totalPost"></span> Transaksi Berhasil Di Posting</h2>
				</div>
			</div>
          </div>
        </div>
      </div>
