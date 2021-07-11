

<script type="text/javascript">

	var table;

	$(document).ready(function() {
		table = $('#table-jurnal').DataTable({
			"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?= base_url('TransaksiJurnal/getJurnal')?>",
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
				url: '<?= base_url("Account/") ?>'+nameAction+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
		        contentType: false,
		        beforeSend: function()
                { 
                    $("#btn-"+nameAction).attr('disabled', '');
                    $("#btn-"+nameAction).html('<span class="ni ni-send"></span> Sending ...');
                },
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
						$('#btn-'+nameAction).attr('disabled', false);
						$('#btn-'+nameAction).html('Submit');
	            		$('#form-'+nameAction)[0].reset();
					}
				}
			});
		}

		// Click Row Data Update
			$('#table-daftar-akun').on('click', 'tr .update-data', function() {
				var no_akun = $(this).attr('data-no-akun');
				var sub_no_akun = $(this).attr('data-sub-no-akun');
				var nama = $(this).attr('data-nama');
				var status = $(this).attr('data-status');
				var level_akun = $(this).attr('data-level');

				$('form#form-addAccount').prop('id', 'form-updateAccount');
				$('[name="no_akun"]').val(no_akun);
				$('[name="sub_no_akun"]').val(sub_no_akun);
				$('[name="nama_akun"]').val(nama);
				$('[name="level_akun"]').val(level_akun);
				$('[name="status_akun"]').val(status);

				$('[name="no_akun"]').prop('readonly', true);
				$('[name="sub_no_akun"]').prop('readonly', true);

				$('#btn-addAccount').html('Update');
				$('#btn-addAccount').attr('form', 'form-updateAccount');
				$('#btn-addAccount').attr('id', 'btn-updateAccount');
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

				$('#modal-deleteAccount').modal('show');
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