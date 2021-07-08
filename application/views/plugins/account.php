

<script type="text/javascript">

var table;

	$(document).ready(function() {
		table = $('#table-akun').DataTable({
			"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?= base_url('Account/getAccount')?>",
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

		$(document).on('submit', '#form-addAccount', function() {
			var formData = new FormData(this);
			actionData(formData, 'addAccount');
        	reload_table();

        	return false;
		});

		$(document).on('submit', '#form-updateAccount', function() {
			var formData = new FormData(this);
			actionData(formData, 'updateAccount');
        	reload_table();

        	return false;
		});

		$(document).on('submit', '#form-deleteAccount', function() {
			var formData = new FormData(this);
			actionData(formData, 'deleteAccount');
        	reload_table();
			$('#modal-deleteAccount').modal('hide');

        	return false;
		});

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

	// Click Button Delete
		$('#btn-delete').click(function() {
			var no_akun = $('#no_akun').val();
			var sub_no_akun = $('#sub_akun').val();

			$.ajax({
				url: '<?= site_url('Master_Account/delete_account') ?>',
				type: 'POST',
				dataType:'json',
				data: {no_akun:no_akun, sub_no_akun:sub_no_akun},
				success:function (response) {
					noty({
                    	text: response.text, 
                    	layout: 'topRight', 
                    	type: response.type
                    });
                	$('#delete-box').removeClass('open');
					$('#no_akun').val('');
					$('#sub_akun').val('');
					$('.nama_akun').html('');
                    setTimeout(function(){ 
                		location.reload(true);
                    	reload_table();
                    }, 1500);
				}

			});
			return false;	
		});
	// End Click Button Delete

	// Form Update Akun 
		$(document).on('submit', '#form-update-akun', function() {
		   var data = new FormData(this);
		    $.ajax({
		        url: '<?= site_url("Master_Account/update_account")?>',
		        type: 'POST',
		        dataType:'JSON',
		        data: data,
		        processData: false,
		        contentType: false,
		        beforeSend: function()
                { 
                    $("#btn-form-update-akun").attr('disabled', '');
                    $("#btn-form-update-akun").html('<span class="glyphicon glyphicon-transfer"></span>   Sending ...');
                },
                success:function(response) {
                    noty({
                    	text: response.text, 
                    	layout: 'topRight', 
                    	type: response.type
                    });
                    $('#form-update-akun')[0].reset();
                
                    setTimeout(function(){ 
                		location.reload(true);
                    	reload_table();
                    }, 1500);
                }
		    });

		    return false;
		});
	// End Form Update Akun 

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