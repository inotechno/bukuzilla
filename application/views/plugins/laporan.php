

<script type="text/javascript">
	var table;

	$(document).ready(function() {
		
		$('[name="periode"]').datepicker( {
		    format: "mm/yyyy",
		    startView: "months", 
		    minViewMode: "months"
		});
		// function filterDatatable() {

		// 	var startDate = $('#startDate').val();
  //           var endDate = $('#endDate').val();

		// 	$.ajax({
		// 		url: '<?= site_url('Laporan/getRugiLaba') ?>',
		// 		type: 'POST',
		// 		dataType: 'HTML',
		// 		data:{startDate:startDate, endDate:endDate},
	 //            success:function (html) {
	 //            	$('#table-body-laporan').html(html);
	 //            }
		// 	});
			
		// 	return false;
		// }

		// $('#btnDownload').click(function() {
		// 	filterDatatable();
		// });
	});			
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/maskedinput/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>