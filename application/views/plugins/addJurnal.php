

<script type="text/javascript">

	$(document).ready(function() {
		
		function selectAccount() {
			var accountField = $('#no_account')
			$.ajax({
				url: '<?= base_url("Account/getSelectAccount") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					for (var i = 0; i < data.length; i++) {
						accountField.append('<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>');
					}
				}
			});
			
		}

	});			
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/maskedinput/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>