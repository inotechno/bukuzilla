

<script type="text/javascript">

	var table;

	$(document).ready(function() {
		table = $('#table-jurnal').DataTable({
			"processing": true, 
            "serverSide": true,
            "scrollX": true,
            "fixedColumns": {
            	 "leftColumns": 1,
            	 "rightColumns": 1
            },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
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
				url: '<?= base_url("TransaksiJurnal/") ?>'+nameAction+'',
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

	                $('#modal-'+nameAction).modal('hide');
				}
			});
		}

		$('#form-deleteJurnal').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'deleteJurnal');
        	reload_table();

        	return false;
		});
		
		// Click Row Data 
			$('#table-daftar-jurnal').on('click', 'tr .delete-data', function() {
				var id_jurnal = $(this).attr('data-id-jurnal');
				var no_voucher = $(this).attr('data-no-voucher');
				
				$('#no-voucher-delete').html(no_voucher);
				$('[name="id_jurnal_delete"]').val(id_jurnal);

				$('#modal-deleteJurnal').modal('show');
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