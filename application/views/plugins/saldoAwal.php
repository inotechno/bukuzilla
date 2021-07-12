

<script type="text/javascript">

var table;

	$(document).ready(function() {
		table = $('#table-akun').DataTable({
			"processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?= base_url('Account/getSaldoAccount')?>",
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
						$('#modal-updateSaldoAwal').modal('hide');
	            		$('#form-'+nameAction)[0].reset();
					}
				}
			});
		}

		$(document).on('submit', '#form-updateSaldoAwal', function() {
			var formData = new FormData(this);
			actionData(formData, 'updateSaldoAwal');
        	reload_table();

        	return false;
		});

		// Click Row Data Update
			$('#table-daftar-akun').on('click', 'tr .update-data', function() {
				var no_akun = $(this).attr('data-no-akun');
				var sub_no_akun = $(this).attr('data-sub-no-akun');
				var saldo_awal = $(this).attr('data-saldo-awal');

				$('#modal-updateSaldoAwal').modal('show');
				
				$('[name="saldo_awal"]').val(saldo_awal);
				$('[name="no_akun"]').val(no_akun);
				$('[name="sub_no_akun"]').val(sub_no_akun);
			});
		// End Click Row Data Update
		
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