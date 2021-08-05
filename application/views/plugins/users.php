

<script type="text/javascript">

	var table;

	$(document).ready(function() {
		$('[name="level"]').select2({
			placeholder: "Pilih Level",
		})

		table = $('#table-users').DataTable({
			"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?= base_url('Users/getUsers')?>",
                "type": "POST"
            },
 			
 			"language": {
		        "paginate": {
		            "previous": '<i class="fas fa-angle-left"></i>',
      				"next": '<i class="fas fa-angle-right"></i>'
		        },
		        "aria": {
		            "paginate": {
		                "previous": 'Previous',
		                "next":     'Next'
		            }
		        }
		    },
             
            "columnDefs": [
	            { 
	                "targets": [ 0 ], 
	                "orderable": false, 
	            },
            ],
		});

		function reload_table() {
			table.ajax.reload();
		}

		function actionData(formData, nameAction) {
			$.ajax({
				url: '<?= base_url("Users/") ?>'+nameAction+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
		        contentType: false,
				success:function (response) {
					$.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    z_index:2000,
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
						$('#modal-'+nameAction).modal('hide');
	            		$('#form-'+nameAction)[0].reset();
					}
				}
			});
		}

		$('#form-addUsers').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'addUsers');
        	setTimeout(function() {
        		reload_table();
        	}, 1000);

        	return false;
		});

		$('#form-updateUsers').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'updateUsers');
        	setTimeout(function() {
        		reload_table();
        	}, 1000);

        	return false;
		});

		$('#form-deleteUsers').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'deleteUsers');
        	setTimeout(function() {
        		reload_table();
        	}, 1000);
        	return false;
		});

		// Click Row Data Update
			$('#table-daftar-users').on('click', 'tr .update-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_lengkap = $(this).attr('data-nama');
				var level = $(this).attr('data-level');
				var foto = $(this).attr('data-foto');

				$('[name="id_update"]').val(id);
				$('[name="username_update"]').val(username);
				$('[name="nama_lengkap_update"]').val(nama_lengkap);
				$('[name="level_update"]').val(level).trigger('change');
				$('[name="foto_lama"]').val(foto);

				$('#modal-updateUsers').modal('show');
			});
		// End Click Row Data Update
		
		// Click Row Data 
			$('#table-daftar-akun').on('click', 'tr .delete-data', function() {
				var no_akun = $(this).attr('data-no-akun');
				var sub_no_akun = $(this).attr('data-sub-no-akun');
				var nama = $(this).attr('data-nama');
				
				$('#akun-delete').html(nama);
				$('[name="no_akun_delete"]').val(no_akun);
				$('[name="sub_no_akun_delete"]').val(sub_no_akun);

				$('#modal-deleteUsers').modal('show');
			});		
		// End Click Row Data

	});			
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/maskedinput/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>