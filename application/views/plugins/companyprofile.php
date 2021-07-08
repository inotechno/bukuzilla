<script type="text/javascript">
	$(document).ready(function() {
		get_data();
		function get_data() {
			$.ajax({
	        	url: '<?= site_url("CompanyProfile/get_data") ?>',
	        	type: 'GET',
	        	dataType: 'JSON',
	        	success:function(data) {
	        		d = new Date();
	        		var logo;
	        		if (data.logo != "") {
	        			logo = '<?= base_url("assets/assets/img/brand/logo-perusahaan.png?") ?>'+d.getTime();
	        		}else{
	        			logo = '<?= base_url("assets/assets/img/default.png") ?>';
	        		}

	        		$('#foto').attr('src', logo);
	        		$('.nama-perusahaan').html(data.nama_perusahaan);
	        		$('.jenis-perusahaan').html(data.jenis_perusahaan);
	        		$('.nama-direktur').html(data.nama_direktur);
	        		$('.email').html(data.email);
	        		$('.telepon').html(data.telepon);
	        		$('.jumlah-karyawan').html(data.jumlah_karyawan);
	        		$('.status').html(data.status);

	        		$('[name="nama_perusahaan"]').val(data.nama_perusahaan);
	        		$('[name="jenis_perusahaan"]').val(data.jenis_perusahaan);
	        		$('[name="nama_direktur"]').val(data.nama_direktur);
	        		$('[name="email"]').val(data.email);
	        		$('[name="telepon"]').val(data.telepon);
	        		$('[name="jumlah_karyawan"]').val(data.jumlah_karyawan);
	        		$('[name="status"]').val(data.status);
	        		$('[name="tgl_pendirian"]').val(data.tgl_pendirian);
	        		$('[name="alamat"]').val(data.alamat);
	        	}
			});
		}

		function updateField() {
			$('#formProfile :input').prop('disabled', false);

			$('#btn-cancelupdateProfile').fadeIn(200, function() {
				$('#btn-updateProfile').fadeIn(120);
				$('#btn-update').fadeOut(100);
			});
		}

		function closeUpdateField() {
			$('#formProfile :input').prop('disabled', true);

			$('#btn-cancelupdateProfile').fadeOut(200, function() {
				$('#btn-updateProfile').fadeOut(120);
				$('#btn-update').fadeIn(100);
			});

			$('#btn-update').prop('disabled', false);
		}

		$('#btn-update').on('click', function() {
			updateField();
		});

		$('#btn-cancelupdateProfile').click(function() {
			closeUpdateField();
		});

		$('#formProfile').submit(function() {
			var data = new FormData(this);
			$.ajax({
		        url: '<?= site_url("CompanyProfile/updateProfile")?>',
		        type: 'POST',
		        dataType:'JSON',
		        data: data,
		        processData: false,
		        contentType: false,
                success:function(response) {
                    $.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                },
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

					if (response.type == 'success') {
						closeUpdateField();
						get_data();
					}
                }
		    });

		    return false;
		});
	});
</script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>