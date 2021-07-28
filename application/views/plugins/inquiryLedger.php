

<script type="text/javascript">
	$('#viewInquiry').hide();
	var table;

	$(document).ready(function() {
		selectAccount();

		function selectAccount() {
			var accountField = $('#no_account')
			$.ajax({
				url: '<?= base_url("Account/getSelectAccount") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					var status = '';
					for (var i = 0; i < data.length; i++) {
						if (data[i].status_akun == 'T') {
							status = 'disabled';
						}

						accountField.append('<option class="font-weight-bold" '+status+' data-nama="'+data[i].nama_akun+'" data-no-akun="'+data[i].no_akun+'.'+data[i].sub_no_akun+'" value="'+data[i].id+'">'+data[i].no_akun+'.'+data[i].sub_no_akun+' | '+data[i].nama_akun+'</option>');
					}
				}
			});
		}

		$('#no_account').select2({
			placeholder: "Pilih Akun",
		})

		function filterDatatable() {

			var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var id_account = $('#no_account').val();

			$.ajax({
				url: '<?= site_url('inquiryLedger/getTransaksi') ?>',
				type: 'POST',
				dataType: 'HTML',
				data:{startDate:startDate, endDate:endDate, id_account:id_account},
	            success:function (html) {
	            	$('#table-body-inquiry').html(html);
	            }
			});
			
			return false;

			// table = $('#table-inquiry').DataTable({
			// 	"processing": true, 
	  //           "serverSide": true,
	  //           // "scrollX": true,
	  //           // "fixedColumns": {
	  //           // 	 "leftColumns": 1,
	  //           // 	 "rightColumns": 1
	  //           // },
	  //           "responsive": true,
	  //           "lengthChange": false,
	  //           "order": [],
	  //           "autoWidth" : true,
	             
	  //           "ajax": {
	  //               "url": "<?= base_url('InquiryLedger/getTransaksi')?>",
	  //               "type": "POST",
	  //               "data": function ( data ) {
		 //                data.startDate = $('#startDate').val();
		 //                data.endDate = $('#endDate').val();
		 //                data.id_account = $('#no_account').val();
		 //            }
	  //           },
	 			
	 	// 		"language": {
			//         "paginate": {
			//             "previous": '<i class="fas fa-angle-left"></i>',
	  //     				"next": '<i class="fas fa-angle-right"></i>'
			//         },
			//         "aria": {
			//             "paginate": {
			//                 "previous": 'Previous',
			//                 "next":     'Next'
			//             }
			//         }
			//     },
	             
	  //           "columnDefs": [
		 //            { 
		 //                "targets": [ 0 ], 
		 //                "orderable": false, 
		 //            },
	  //           ],
			// });
		}

		function reload_table() {
			table.ajax.reload();
		}

		$('#btnFilter').click(function() {
			var nama = $('#no_account option:selected').attr('data-nama');
			$('#viewInquiry').show('100', function() {
				$('#nama-akun').html(nama);
				filterDatatable();
				// reload_table();
			});
		});
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